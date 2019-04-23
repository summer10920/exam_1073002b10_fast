<h3 class="ct">預告片清單</h3>
<form action="api.php?do=rrmdy" method="post" class="ct">
<select name="eft">
<?php
$re=select("t5_effect",1);
$ro=$re[0];
?>
<option value="1" <?=($ro['once']==1)?"selected":""?>>淡入</option>
<option value="2" <?=($ro['once']==2)?"selected":""?>>縮放</option>
<option value="3" <?=($ro['once']==3)?"selected":""?>>移出</option>
</select>
        <hr>
<table>
    <tr>
        <td>預告片海報</td>
        <td>預告片片名</td>
        <td>播放順序</td>
        <td>操作</td>
    </tr>
<?php
$re=select("t5_img","1 order by odr");
foreach ($re as $ro) {
?>
    <tr>
        <td><img width=100 src="upload/<?=$ro['img']?>" alt=""></td>
        <td><?=$ro['text']?></td>
        <td><input type="text" name="odr[<?=$ro['id']?>]" value="<?=$ro['odr']?>"></td>
        <td>
        <input type="hidden" name="dpy[<?=$ro['id']?>]" value=0>
        <input type="checkbox" name="dpy[<?=$ro['id']?>]" value="1" <?=($ro['dpy'])?"checked":""?>>顯示
        <input type="checkbox" name="del[]" value="<?=$ro['id']?>">刪除
        </td>
    </tr>
<?php
}
?>
</table>
<div class="ct"><input type="submit" value="編輯"></div>
</form>
<hr>
<h3 class="ct">新增預告片</h3>
<form action="api.php?do=rradd" method="post" enctype="multipart/form-data" class="ct">
預告片海報<input type="file" name="img" id=""> 預告片片名<input type="text" name="text" id=""><br><br>
<input type="submit" value="新增">
</form>