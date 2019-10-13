# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 偷取admin的選單作為前台選單。

## A. 先規劃前台選單
- 偷取admin的選單作為前台選單。並透過SQL去產生對應的選單標題與連結。
- 先找fa再找son。同時先把son隱藏起來\(顏色可改一下\)。
- 之後再透過JQ去控制是否顯示。同時全部商品同為首頁，所以不帶參數。

### 修改index.php
```php
<div style="min-height:400px;">
            </div>
```

改為

```php
<div style="min-height:400px;">
  <?php
  $num = count(select("q4t5_product", 1));
  echo '<a href="index.php">全部商品(' . $num . ')</a>';
  $re = select("q4t4_class", "parent=0");
  foreach ($re as $ro) {
    $num = count(select("q4t5_product", "fa=" . $ro['id']));
    echo '<a onmouseover="show(' . $ro['id'] . ')" href="?do=main&fa=' . $ro['id'] . '">' . $ro['text'] . '(' . $num . ')</a>';

    $re2 = select("q4t4_class", "parent=" . $ro['id']);
    foreach ($re2 as $ro2) {
      $num = count(select("q4t5_product", "son=" . $ro2['id']));
      echo '<a class="son fa' . $ro['id'] . '" href="?do=main&fa=' . $ro['id'] . '&son=' . $ro2['id'] . '" style="background: #fce2c4">' . $ro2['text'] . '(' . $num . ')</a>';
    }
  }
  ?>
</div>
```

注意這裡會先安排一些class方便之後控制，並在每個father上面規劃onmouseover=show\(id\);

## B. 子選單滑入顯示
第四題版型沒有提供JQ，故去偷第三題的JQ來用，除了複製該路徑檔案，在head標籤內插入以下行

```javascript
<script src="scripts/jquery-1.9.1.min.js"></script>
```

進行動作為

```javascript
<script>
  $(".son").hide();

  function show(id) {
    $(".son").hide();
    $(".fa" + id).show();
  }
</script>
```

## C. 選單對應的內容
1. 父選單與子選單所撈取的範圍會不同。透過取得的GET來進行不同的撈取動作。
2. 利用$who來做不同的塞選條件，譬如如果是全部商品$who會是空的，如果是指定fa或son會對應適合的塞選條件
3. "縮圖"需能連接到產品細節，網址do=info& 帶ID參數
4. "我要購買"題目沒要求連接到哪，故也一併連接到do=info省得麻煩。

### 新增main.php
設計為

```php
<table>
  <?php
  $who = "";
  if (!empty($_GET['fa'])) $who .= " and fa=" . $_GET['fa'];
  if (!empty($_GET['son'])) $who .= " and son=" . $_GET['son'];
  $re = select("q4t5_product", "dpy=1" . $who);
  foreach ($re as $ro) {
    ?>
    <tr>
      <td rowspan=4><a href="?do=info&id=<?= $ro['id'] ?>"><img src="upload/<?= $ro['img'] ?>" width="200"></a></td>
      <td><?= $ro['title'] ?></td>
    </tr>
    <tr>
      <td>價錢:<?= $ro['price'] ?> <a href="?do=info&id=<?= $ro['id'] ?>"><img src="img/0402.jpg" alt=""></a></td>
    </tr>
    <tr>
      <td>規格:<?= $ro['spec'] ?></td>
    </tr>
    <tr>
      <td>簡介:<?= $ro['text'] ?></td>
    </tr>
  <?php
  }
  ?>
</table>
```

## D. 產品細節
1. 從ID去取得出該商品的大分類與中分類。提供版面上的分類顯示$title
2. 規劃form收集ID、數量。利用image做成submit功能\(alt=submit\)
3. 利用from送到api.php去先判別是否已登入再加入購物車的SESSION

### 新增info.php
```php
<?php
$re = select("q4t5_product", "id=" . $_GET['id']);
$x = $re[0];
$title = "";
$re = select("q4q4t4_class", "id=" . $x['fa']);
$title = $re[0]['text'];
$re = select("q4t4_class", "id=" . $x['son']);
$title .= ">" . $re[0]['text'];

?>
<form action="api.php?do=want&id=<?= $_GET['id'] ?>" method="post">
  <h3 class="ct"><?= $x['title'] ?></h3>
  <table>
    <tr>
      <td rowspan=5><img width=400 src="upload/<?= $x['img'] ?>" alt=""></td>
      <td><?= $title ?></td>
    </tr>
    <tr>
      <td>編號: <?= $x['id'] ?></td>
    </tr>
    <tr>
      <td>價錢: <?= $x['price'] ?></td>
    </tr>
    <tr>
      <td>詳細說明: <br><?= $x['text'] ?></td>
    </tr>
    <tr>
      <td>庫存量: <?= $x['num'] ?></td>
    </tr>
    <tr>
      <td colspan=2>購買數量<input type="text" name="num" id="">
        <input type="image" src="img/0402.jpg" alt="submit">
        <input type="button" value="返回" onclick="window.history.back()">
      </td>
    </tr>
  </table>
</form>
```

步驟到此，api.php的寫法留至第七題解。接下來準備處理後台商品管理，但你需要先設計第十題的管理登入。

