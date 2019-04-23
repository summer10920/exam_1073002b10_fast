<p class="t cent botli">校園映像資料管理</p>
<form method="post" action="api.php?do=imgmdy">
    <table width="100%">
        <tr class="yel">
            <td width="45%">校園映像資料圖片</td>
            <td width="7%">顯示</td>
            <td width="7%">刪除</td>
            <td></td>
        </tr>
<?php
$nw = (empty($_GET['page']) ? 1 : $_GET['page']);
$bg = ($nw - 1) * 3;
$re = select("t6_img", "1 limit " . $bg . ",3");
foreach ($re as $ro) {
?>
        <tr>
            <td><embed src="upload/<?= $ro['file'] ?>" height="68" width=100></td>
            <td>
                <input type="hidden" name="dpy[<?= $ro['id'] ?>]" value=0>
                <input type="checkbox" name="dpy[<?= $ro['id'] ?>]" value=1 <?= ($ro['dpy']) ? "checked" : "" ?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?= $ro['id'] ?>">
            </td>
            <td>
                <input type="button" onclick="op('#cover','#cvr','view.php?do=imgchg&id=<?= $ro['id'] ?>')" value="更新圖片">
            </td>
        </tr>
<?php
}
?>
    </table>
<?php
$re = page("t6_img", 1, 3, $nw);
foreach ($re as $key => $value) {
    if ($key == $nw) echo '<a class="bl" style="font-size:60px;" href="?do=aimage&page=' . $value . '">' . $key . '</a>';
    else echo '<a class="bl" style="font-size:30px;" href="?do=aimage&page=' . $value . '">' . $key . '</a>';
}
?>
    <table style="margin-top:40px; width:70%;">
        <tbody>
            <tr>
                <td width="200px">
                    <input type="button" onclick="op('#cover','#cvr','view.php?do=imgadd')" value="新增校園映像圖片">
                </td>
                <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
            </tr>
        </tbody>
    </table>
</form>