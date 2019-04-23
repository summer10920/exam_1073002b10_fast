<?php
$re=select("t8_book","id=".$_GET['id']);
$ro=$re[0];
$seq=date("Ymd0000",strtotime($ro['buydate']))+$ro['id'];
$ss=unserialize($ro['seat']);
?>

訂單資訊：<?=$seq?><hr>
您選擇的電影是：<?=$ro['movie']?><br>
您選擇的時刻是：<?=$ro['date']?> <?=$seat[$ro['time']]?><br>
您勾選的座位是：<br>
<?php
foreach ($ss as $value) echo $value.'號<br>';
?>
