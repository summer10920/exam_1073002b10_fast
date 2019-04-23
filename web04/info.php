<?php
$re=select("t5_product","id=".$_GET['id']);
$x=$re[0];
$title="";
$re=select("t4_class","id=".$x['fa']);
$title=$re[0]['text'];
$re=select("t4_class","id=".$x['son']);
$title.=">".$re[0]['text'];

?>
<form action="api.php?do=want&id=<?=$_GET['id']?>" method="post">
<h3 class="ct"><?=$x['title']?></h3>
<table>
    <tr>
        <td rowspan=5><img width=400 src="upload/<?=$x['img']?>" alt=""></td>
        <td><?=$title?></td>
    </tr>
    <tr><td>編號: <?=$x['id']?></td></tr>
    <tr><td>價錢: <?=$x['price']?></td></tr>
    <tr><td>詳細說明: <br><?=$x['text']?></td></tr>
    <tr><td>庫存量: <?=$x['num']?></td></tr>
    <tr>
        <td colspan=2>購買數量<input type="text" name="num" id="">
        <input type="image" src="img/0402.jpg" alt="submit">
        <input type="button" value="返回" onclick="window.history.back()">
        </td>
    </tr>
</table>
</form>