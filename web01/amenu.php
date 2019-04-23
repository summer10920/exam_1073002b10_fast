<p class="t cent botli">選單管理</p>
        <form method="post" action="api.php?do=menumdy">
    <table width="100%">
    	<tr class="yel">
        	<td width="45%">網站標題</td><td width="23%">選單連結網址</td><td>次選單數</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                </tr>

<?php
$re=select("t12_menu","parent=0");
foreach ($re as $ro) {
    $num=count(select("t12_menu","parent=".$ro['id']));
?>
<tr>
    <td><input type="text" name="title[<?=$ro['id']?>]" value="<?=$ro['title']?>"></td>
    <td><input type="text" name="text[<?=$ro['id']?>]" value="<?=$ro['link']?>"></td>
    <td><?=$num?></td>
    <td>
    <input type="hidden" name="dpy[<?=$ro['id']?>]" value=0>
    <input type="checkbox" name="dpy[<?=$ro['id']?>]" value=1 <?=($ro['dpy'])?"checked":""?>>
    </td>
    <td>
    <input type="checkbox" name="del[]" value="<?=$ro['id']?>">
    </td>
    <td>
    <input type="button" onclick="op('#cover','#cvr','view.php?do=menuchg&id=<?=$ro['id']?>')" value="編輯次選單">
    </td>
</tr>
<?php
}
?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px">
      <input type="button" onclick="op('#cover','#cvr','view.php?do=menuadd')" value="新增主選單">
      
      </td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

    </form>