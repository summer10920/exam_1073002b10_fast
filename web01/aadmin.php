<p class="t cent botli">管理者帳號管理</p>
        <form method="post" action="api.php?do=adminmdy">
    <table width="100%">
    	<tr class="yel">
        	<td width="45%">帳號</td><td width="30%">密碼</td><td width="7%">刪除</td>
        </tr>
<?php
$re=select("t10_admin","id!=1");
foreach ($re as $ro) {
?>
        <tr>
            <td><input type="text" name="acc[<?=$ro['id']?>]" value="<?=$ro['acc']?>"></td>
            <td><input type="password" name="pwd[<?=$ro['id']?>]" value="<?=$ro['pwd']?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$ro['id']?>"></td>
        </tr>
<?php
}
?>
    </table>
    <table style="margin-top:40px; width:70%;"><tbody><tr>
        <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','view.php?do=adminadd')" value="新增管理者帳號">
        </td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
    </tr></tbody></table>    
    </form>