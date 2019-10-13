<h3 class="ct">訂單清單</h3><hr>
<form action="api.php?do=orderfast" method="post" onsubmit="return confirm('幹你確定嗎?')">
    <input type="radio" name="sw" value="1" required>依日期 <input type="text" name="date" id=""> 
    <input type="radio" name="sw" value="2">電影名稱 
    <select name="movie">
    <?php
    $re=select("t7_movie",1);
    foreach($re as $ro) echo '<option value="'.$ro['title'].'">'.$ro['title'].'</option>';
    ?>
    </select>
    <input type="submit" value="快速刪除">
</form>
<hr>

<table width="100%">
    <tr>
        <td>訂單編號</td>
        <td>電影名稱</td>
        <td>觀看日期</td>
        <td>場次時間</td>
        <td>訂購數量</td>
        <td>訂購位置</td>
        <td>操作</td>
    </tr>
<?php
$re=select("t8_book","1 order by id desc");
foreach ($re as $ro) {
    $seq=date("Ymd0000",strtotime($ro['buydate']))+$ro['id'];
    $ss=unserialize($ro['seat']);
?>
    <tr>
        <td><?=$seq?></td>
        <td><?=$ro['movie']?></td>
        <td><?=$ro['date']?></td>
        <td><?=$seat[$ro['time']]?></td>
        <td><?=count($ss)?></td>
        <td><?php foreach ($ss as $value) echo $value.'號<br>';?></td>
        <td><input type="button" value="刪除" onclick="<?=jlo("api.php?do=orderdel&id=".$ro['id'])?>"></td>
    </tr>
<?php
}
?>
</table>