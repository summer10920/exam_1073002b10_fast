<?php
$re = select("t7_movie", "id=" . $_GET['id']);
$ro = $re[0];
?>
<div style="background:#FFF; width:100%; color:#333; text-align:left">
    <video src="upload/<?= $ro['video'] ?>" width="300px" height="250px" controls="" style="float:right;"></video>
    <font style="font-size:24px"> <img src="upload/<?= $ro['img'] ?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?= $ro['title'] ?>
            <input type="button" value="線上訂票" onclick="<?= jlo("order.php?do=step1&id=" . $ro['id']) ?>">
        </p>
        <p style="margin:3px">影片分級 ： <img src="img/<?= $ro['cls'] ?>.png" style="display:inline-block;"></p>
        <p style="margin:3px">影片片長 ： <?= $ro['length'] ?></p>
        <p style="margin:3px">上映日期 <?= $ro['date'] ?></p>
        <p style="margin:3px">發行商 ： <?= $ro['corp'] ?></p>
        <p style="margin:3px">導演 ： <?= $ro['maker'] ?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br><?= $ro['text'] ?>
        </p>
    </font>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td align="center"><input type="button" value="院線片清單" onclick="<?= jlo("index.php") ?>"></td>
            </tr>
        </tbody>
    </table>
</div>