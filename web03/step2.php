<form action="api.php?do=order" method="post">
<?php
$re=select("t8_book","movie='".$_POST['mm']."' and date='".$_POST['dd']."' and time=".$_POST['tt']);
$set=array();
foreach($re as $row) $set=array_merge($set,unserialize($row['seat']));//將所有該時段的多筆座位陣列都倒入到一個新陣列

for($i=1;$i<21;$i++){
    if (in_array($i,$set)) echo '<img src="img/03D03.png" style="padding-right:30px">';
    else echo '
      <img src="img/03D02.png" alt="">
      <input class="seat" type="checkbox" name="ss[]" value="'.$i.'">
    ';
    if($i%5==0) echo '<br>';
}
$re=select("t7_movie","title='".$_POST['mm']."'");
$ro=$re[0];
?>
<hr>
<input type="hidden" name="movie" value="<?=$_POST['mm']?>">
<input type="hidden" name="date" value="<?=$_POST['dd']?>">
<input type="hidden" name="time" value="<?=$_POST['tt']?>">
您選擇的電影是：<?=$ro['title']?><br>
您選擇的時刻是：<?=$_POST['dd']?> <?=$seat[$_POST['tt']]?><br>
您勾選了<span id=nn>0</span>張票，最多可購買4張票<br>
<input type="button" value="上一步" onclick="window.close()"> <input type="submit" value="確定">
<script>
num=0;
$(".seat").click(function(){
    if(this.checked)
        (num<4)?num++:this.checked=false;
    else num--;
    $("#nn").text(num);
});
</script>
</form>