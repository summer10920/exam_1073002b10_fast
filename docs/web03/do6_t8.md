# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 題目要求有三個步驟：選取電影場次、選取座位、結果顯示。因此你會需要設計URL轉址參數。

1. 電影場次的下拉選單透過ajax api進行查詢回傳。同時去搜索table.seat座位\(陣列以字串儲存，取出時轉回陣列並計算列數\)
2. 選取座位有條件選擇，透過JQ去控制超過四筆不顯示。以及資料select時，有資料不提供checkbox
3. 結果顯示的流水號使用日期+索引組合即可，題目要求沒有很明確流水號的方式。

table.book\_t8的欄位只需要索引，電影ID,訂購日,場次，座位陣列\(string\)即可。訂購數可透過座位陣列算得\)

## A. 先設計好URL轉址參數
之前已被抽取過主內容給info.php，這裡直接改主內容區部分，找到

### 修改order.php
```php
  <div id="mm">
  <div class="tab rb" style="width:87%;overflow-y:scroll;height:470px">
  </div>
  </div>
```

改成

```php
<div id="mm">
  <div class="tab rb" style="width:87%;">
    <?php include $main . ".php"; ?>
  </div>
</div>
```

並在頁首塞入參數

```php
<?php
include "sql.php";
$main=(empty($_GET['do']))?"step1":$_GET['do'];
?>
```

## B. 訂票選單
1. 依據題目初始有\[已知movie id\]跟\[沒有選擇\]兩種來源。接著每次點選需對應相對的其次欄位內容。
2. 這裡需要JQ搭配AJAX來完成下拉選單的內值。根據前一項select標籤的變化去做ajax出後一項的內容。
3. select標籤的影響為 電影=&gt;影響有效日期\(在api.php處理\)，日期=&gt;影響是否今日有效時段\(在JS內提供一個參數是否為今日，在php內做顯示從幾筆開始輸出\)
4. 同時注意只能撈取顯示有效期限的電影。提交到step2.php

### 建立step1.php
```php
<form action="?do=step2" method="post" target="_black">
  電影: <select name="mm" id="sm" onchange="gd()">
    <?php
    $re = select("q3t7_movie", "'" . $minday . "'<=date and date<='" . $today . "'");
    foreach ($re as $ro) echo '<option value="' . $ro['title'] . '" ' . ((!empty($_GET['id']) && $_GET['id'] == $ro['id']) ? "selected" : "") . '>' . $ro['title'] . '</option>';
    ?>
  </select>
  日期: <select name="dd" id="sd" onchange="gt()">
  </select>
  場次: <select name="tt" id="st">
  </select><br><br>
  <input type="submit" value="確定"> <input type="reset" value="重置">
</form>
```

JS部分，透過AJAX提交到api.php處理回傳

1. 當選擇電影有變化時，自動呼叫gd\(\)去算出有效日期的選項。
2. 若一開始就有帶MOVE ID參數，也會自動去跑getdate\(\)
3. 當選擇日期時，呼叫getime\(\)算出時間場次。
4. 執行getimeg時，當日期等於今天時，today成立，否則為不。
5. 最後都由api.php進行SQL分析與輸出處理。

此時JS規劃為

```javascript
<script>
if($("#sm").length>0) gd();
function gd(){
    title=$("#sm").val();
    $.post("api.php?do=gd",{title},function(re){
        $("#sd").html(re);
        gt();
    });
}
function gt(){
    title=$("#sm").val();
    date=$("#sd").val();
    $.post("api.php?do=gt",{title,date},function(re){
        $("#st").html(re);
    });
}
</script>
```

### 增添api.php
AJAX提交動作的處理

```php
case 'gd':
  $re = select("q3t7_movie", "title='" . $_POST['title'] . "'");
  $ro = $re[0];
  $num = (strtotime($ro['date']) - strtotime($minday)) / 3600 / 24; //該資料與最舊有效日相差幾天，可能值0~2
  for ($i = 0; $i <= $num; $i++)
    echo '<option value="' . date("Y-m-d", strtotime("+" . $i . "days")) . '">' . date("Y-m-d", strtotime("+" . $i . "days")) . '</option>';
  break;
case 'gt':
  $re = select("q3t8_book", "movie='" . $_POST['title'] . "' and date='" . $_POST['date'] . "'");
  $ary = array(0, 0, 0, 0, 0);
  foreach ($re as $ro) $ary[$ro['time']] += count(unserialize($ro['seat'])); //收集各時段已售出之量
  $now = (date("H") >= 14 && $today == $_POST['date']) ? floor(date("H") / 2 - 6) : 0; //如果今天且下午
  //只有當天的可選時段會變化，可能是從0開始跑或從現在時間(轉成時段)開始跑
  //if 現在是pm3 -> 15/2-6=1(無條件捨去) -> se_time[1]=1600~1800
  for ($i = $now; $i < 5; $i++) echo '<option value="' . $i . '">' . $seat[$i] . ' 剩餘座位 ' . (20 - $ary[$i]) . '</option>';
  break;
```

### 增添sql.php
這裡加一段座位的代碼到公用PHP表內，後面會重複用到

```php
//t7
$seat[0]="14:00~16:00";
$seat[1]="16:00~18:00";
$seat[2]="18:00~20:00";
$seat[3]="20:00~22:00";
$seat[4]="22:00~24:00";
```

## C. 選位功能
1. 取得step1.php得來的資料進行版面規劃，並還要再包一次到input:hidden。才能在step3.php真正做總資料處理。
2. 算位置時利用迴圈去跑，同時每五筆斷行。同時負責seat的資料為字串化陣列，需轉回陣列格式\(unserialize\)
3. 訂單多筆有多筆不一樣的陣列。需要一個新陣列每次加入合併這些foreachf取的單陣列。
4. JS部分要記錄點選checkbox數量並阻止超過選擇數
5. 最後送出到api.php，進行order作業

### 建立step2.php
```php
<form action="api.php?do=order" method="post">
  <?php
  $re = select("q3t8_book", "movie='" . $_POST['mm'] . "' and date='" . $_POST['dd'] . "' and time=" . $_POST['tt']);
  $set = array();
  foreach ($re as $row) $set = array_merge($set, unserialize($row['seat'])); //將所有該時段的多筆座位陣列都倒入到一個新陣列

  for ($i = 1; $i < 21; $i++) {
    if (in_array($i, $set)) echo '<img src="img/03D03.png" style="padding-right:30px">';
    else echo '
    <img src="img/03D02.png" alt="">
    <input class="seat" type="checkbox" name="ss[]" value="' . $i . '">
  ';
    if ($i % 5 == 0) echo '<br>';
  }
  $re = select("q3t7_movie", "title='" . $_POST['mm'] . "'");
  $ro = $re[0];
  ?>
  <hr>
  <input type="hidden" name="movie" value="<?= $_POST['mm'] ?>">
  <input type="hidden" name="date" value="<?= $_POST['dd'] ?>">
  <input type="hidden" name="time" value="<?= $_POST['tt'] ?>">
  您選擇的電影是：<?= $ro['title'] ?><br>
  您選擇的時刻是：<?= $_POST['dd'] ?> <?= $seat[$_POST['tt']] ?><br>
  您勾選了<span id=nn>0</span>張票，最多可購買4張票<br>
  <input type="button" value="上一步" onclick="window.close()"> <input type="submit" value="確定">
</form>
```

JS部分，從0開始數，每一次被check打勾時，如果還沒超過4就繼續數，否則把打勾取消。反之被取消打勾就記數少一

```javascript
<script>
num=0;
$(".seat").click(function(){
    if(this.checked)
        (num<4)?num++:this.checked=false;
    else num--;
    $("#nn").text(num);
});
</script>
```

### 增添api.php
進行資料上傳，並先將seat陣列給字串化。這樣一筆訂單就是一筆DATA，方便訂單管理。

```php
case 'order':
  $_POST['seat'] = serialize($_POST['ss']);
  $_POST['buydate'] = date("Y-m-d");
  unset($_POST['ss']);
  $id = insert($_POST, "q3t8_book");
  plo("order.php?do=step3&id=" . $id);
  break;
```

## D. 檢視訂票結果
很簡單的做撈取動作，訂單編號部分利用日期與ID合併即可，不需要特地在設計該SQL欄位。

### 建立step3.php
```php
<?php
$re = select("q3t8_book", "id=" . $_GET['id']);
$ro = $re[0];
$seq = date("Ymd0000", strtotime($ro['buydate'])) + $ro['id'];
$ss = unserialize($ro['seat']);
?>

訂單資訊：<?= $seq ?>
<hr>
您選擇的電影是：<?= $ro['movie'] ?><br>
您選擇的時刻是：<?= $ro['date'] ?> <?= $seat[$ro['time']] ?><br>
您勾選的座位是：<br>
<?php
foreach ($ss as $value) echo $value . '號<br>';
?>
```



