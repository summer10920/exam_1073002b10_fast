<table>
<?php
$who="";
if(!empty($_GET['fa'])) $who.=" and fa=".$_GET['fa'];
if(!empty($_GET['son'])) $who.=" and son=".$_GET['son'];
$re=select("q4t5_product","dpy=1".$who);
foreach ($re as $ro) {
?>
    <tr>
        <td rowspan=4><a href="?do=info&id=<?=$ro['id']?>"><img src="upload/<?=$ro['img']?>" width="200"></a></td>
        <td><?=$ro['title']?></td>
    </tr>
    <tr>
        <td>價錢:<?=$ro['price']?> <a href="?do=info&id=<?=$ro['id']?>"><img src="img/0402.jpg" alt=""></a></td>
    </tr>
    <tr>
        <td>規格:<?=$ro['spec']?></td>
    </tr>
    <tr>
        <td>簡介:<?=$ro['text']?></td>
    </tr>
<?php
}
?>
</table>