# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 這題被塞了兩個單元，分別是前台的會員註冊登入與會員服務\(購物\)。

操作流程與設計方針為：

1. 讓註冊或登入與購物之兩者程式獨立。
2. 不管有無登入按下"我要購買"就把購買資訊存在SESSION，接著檢查到未登入就帶去註冊或登入。
3. 只要不登出情況下，查看購物車就是查看session cart。

因此

- 先完成前台的會員登入與註冊，再來完成按下購物可以將資訊塞入購物車。
- 設計技巧採用新訪客的流程登入，模擬新使用者的操作，會碰到登入版型、新註冊、登入帳號、查看購物車

## A. 規劃購物車

之前第四題做到按下我要購買會送往api處理importcart。這裡分兩動作，第一先記下來買了甚麼，第二是確認登入了沒。\(否則往登入頁面\)。為了記錄商品ID，寫在SESSION的key上。

### 增添api.php
```php
case 'want':
  $_SESSION['buy'][$_GET['id']] = $_POST['num'];
  if (empty($_SESSION['user'])) plo("index.php?do=login");
  else plo("index.php?do=buycart");
  break;
```

## B. 登入版型
1. 版型差不多只需記得導向的位置不同。
2. 一樣透過onsumit去觸發處理驗證。
3. 會員註冊導向到reg處理。

### 新增login.php\(參考adlogin.php\)
```php
<h3>第一次登入</h3>
<a href="?do=reg"><img src="img/0413.jpg" alt=""></a>
<h3>會員登入</h3>
<form action="api.php?do=login" method="post" onsubmit="return check()">
  帳號: <input type="text" name="acc" id=""><br>
  密碼: <input type="text" name="pwd" id=""><br>
  驗證碼<?= $a1 ?>+<?= $a2 ?>= <input type="text" name="ans" id="">
  <input type="submit" value="登入">
</form>
<script>
  function check() {
    if ($("input[name=ans]").val() != <?= $ans ?>) {
      alert("對不起，您輸入的驗證碼有務請您重新輸入");
      return false;
    }
  }
</script>
```

## C. 會員註冊
1. 這裡需要考量新帳號的同名驗證，所以靠JQ來處理api傳遞。
2. 比較周全的除了帳號驗證，表單送出也需檢查，因為ajax為簡易模式會並行執行，所以兩者要用flag去分前後任務，一個是檢查，一個是要使用者去檢查。

### 新增reg.php
```php
<h3 class="ct">會員註冊</h3>
<form action="api.php?do=reg" method="post" onsubmit="return checkflag()">
  姓名: <input type="text" name="name" id=""><br>
  帳號: <input type="text" name="acc" id=""><input type="button" value="檢測帳號" onclick="check()"><br>
  密碼: <input type="text" name="pwd" id=""><br>
  電話: <input type="text" name="tel" id=""><br>
  地址: <input type="text" name="addr" id=""><br>
  電子信箱: <input type="text" name="mail" id=""><br>
  <input type="submit" value="確認">
</form>
<script>
  flag=1;
  function check() {
    if ($("input[name=acc]").val() == 'admin') alert("不可使用admin");
    else{
      id = $("input[name=acc]").val();
      $.post("api.php?do=checkuser", {id}, function(re) {
        alert(re);
        if(re=="可使用此帳號") flag=0;
        else flag=1;
      });
    }
  }
  function checkflag(){
    if(flag) {
      alert("請先驗證帳號");
      return false;
    }
  }
</script>
```

### 增建api.php
api這裡要處理帳號重複的驗證，以及註冊帳號的處理並導向到登入畫面，讓使用者再登入一次\(順便讓考官確認可正常登入新帳號\)

```php
  case 'checkuser':
    $re = select("q4t9_user", "acc='" . $_POST['id'] . "'");
    if ($re != null) echo "帳號重複";
    else echo "可使用此帳號";
    break;
  case 'reg':
    $_POST['date'] = date("Y-m-d");
    insert($_POST, "q4t9_user");
    plo("index.php?do=login");
    break;
```

## D. 登入帳號

步驟2已經有登入介面，試著使用帳號登入，接著api來作帳密登入，登入成功就咬住名字跟帳號

### 增建api.php
```php
  case 'login':
    $re = select("q4t9_user", "acc='" . $_POST['acc'] . "' and pwd='" . $_POST['pwd'] . "'");
    if ($re != null) {
      $_SESSION['user'] = $_POST['acc'];
      $_SESSION['id'] = $re[0]['id'];
      plo("index.php");
    } else echo "<script>alert('輸入錯誤');window.history.back()</script>";
    break;
```

## E. 登出按鈕
雖然題目沒要求此功能但程式碼不多，做此功能能幫助你快速驗證相關功能。找到選單連接加入運算子

### 修改index.php
```php
<a href="?do=login">會員登入</a> |
```

更改為

```php
<?=(empty($_SESSION['user']))?'<a href="?do=login">會員登入</a> |':'<a href="api.php?do=logout">會員登出</a> |'?>
```

### 增添api.php

```php
  case 'logout':
    unset($_SESSION['user']);
    plo("index.php");
    break;
```

如此一來你能正常登入登出並請試著功能正常性。

## F. 查看購物車
buycart只是單純地將SESSION輸出，並撈取該商品資訊。只需清楚SESSION的陣列結構即可。另外刪除該項時，委託api去unset該資訊\(藉由ID\)。真正建立訂單導向另一頁order.php。另外避免操作不當，空購物車時就不提供結帳按鈕。

示意圖上要求呈現數量，但示意圖為可修改\[數量\]。斟酌此項。提交POST並記錄ID與NUM。再另一畫面重新打回SESSION的NUM

### 新增buycart.php
```php
<?php
$who = (empty($_SESSION['user'])) ? "訪客(請先登入)" : $_SESSION['user'];
?>
<h3 class="ct"><?= $who ?>的購物車</h3>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
  </tr>
  <?php
  $total = 0;
  if (!empty($_SESSION['buy'])) foreach ($_SESSION['buy'] as $id => $num) {
    $re = select("q4t5_product", "id=" . $id);
    $x = $re[0];
    ?>
    <tr bgcolor=#ffc>
      <td><?= $id ?></td>
      <td><?= $x['title'] ?></td>
      <td><?= $num ?></td>
      <td><?= $x['num'] ?></td>
      <td><?= $x['price'] ?></td>
      <td><?= $x['price'] * $num ?></td>
      <td><input type="button" value="刪除"></td>
    </tr>
  <?php
    $total += $x['price'] * $num;
  }
  ?>
</table>
<a href="index.php"><img src="img/0411.jpg" alt=""></a>
<a href="?do=pay"><img src="img/0412.jpg" alt=""></a>
```

### 新增pay.php\(參考buycart.php\)
一開始先重新整理前頁所取得的num數量並打回去session。然後才開始整理訂單資訊並規劃成表單準備輸出，同時去計算總價，以及使用者資訊\(需可以更改於訂單上\)。版型可以從buycart.php那裏取得。

```php
<h3 class="ct">確認資料</h3>
<?php
$re = select("q4t9_user", "id=" . $_SESSION['id']);
$x = $re[0];
?>
姓名: <?= $x['name'] ?><br>
帳號: <?= $x['acc'] ?><br>
電話: <?= $x['tel'] ?><br>
地址: <?= $x['addr'] ?><br>
電子信箱: <?= $x['mail'] ?>
<hr>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $total = 0;
  if (!empty($_SESSION['buy'])) foreach ($_SESSION['buy'] as $id => $num) {
    $re = select("q4t5_product", "id=" . $id);
    $x = $re[0];
    ?>
    <tr bgcolor=#ffc>
      <td><?= $id ?></td>
      <td><?= $x['title'] ?></td>
      <td><?= $num ?></td>
      <td><?= $x['num'] ?></td>
      <td><?= $x['price'] ?></td>
      <td><?= $x['price'] * $num ?></td>
    </tr>
  <?php
    $total += $x['price'] * $num;
  }
  ?>
</table>
<hr>
<input type="button" value="確定送出" onclick="<?= jlo('api.php?do=pay&total=' . $total) ?>">
<input type="button" value="返回修改訂單" onclick="window.history.back()">
```

### 增添api.php
SESSION直接打包成字串並清除購物車\(SESSION\)，acc跟date以及將用戶資訊也要塞入$\_POST內一併上傳，方便後台上的直接讀取。另外題目要求有提示alert，所以轉址要用JS不能用PHP否則還沒跑JS就被PHP轉走。

```php
case 'pay':
  $re = select("q4t9_user", "id=" . $_SESSION['id']);
  $x = $re[0];
  $_POST['user'] = $x['acc'];
  $_POST['name'] = $x['name'];
  $_POST['tel'] = $x['tel'];
  $_POST['addr'] = $x['addr'];
  $_POST['mail'] = $x['mail'];
  $_POST['total'] = $_GET['total'];
  $_POST['date'] = date("Y-m-d");
  $_POST['buy'] = serialize($_SESSION['buy']);
  unset($_SESSION['buy']);
  insert($_POST, "q4t8_order");
  echo "<script>alert('訂購成功感謝您的參與');" . jlo("index.php") . "</script>";
  break;
```



