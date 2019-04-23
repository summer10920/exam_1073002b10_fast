<p class="t cent botli">最新消息管理</p>
        <form method="post" action="api.php?do=newsmdy">
    <table width="100%">
    	<tr class="yel">
        	<td width="45%">內容</td><td width="7%">顯示</td><td width="7%">刪除</td>
                </tr>

<?php
$nw=(empty($_GET['page'])?1:$_GET['page']);
$bg=($nw-1)*5;
$re=select("t9_news","1 limit ".$bg.",5");
foreach ($re as $ro) {
?>
<tr>
    <td><textarea name="text[<?=$ro['id']?>]"><?=$ro['text']?></textarea></td>
    <td>
        <input type="hidden" name="dpy[<?=$ro['id']?>]" value=0>
        <input type="checkbox" name="dpy[<?=$ro['id']?>]" value=1 <?=($ro['dpy'])?"checked":""?>>
    </td>
    <td><input type="checkbox" name="del[]" value="<?=$ro['id']?>"></td>
</tr>
<?php
}
?>
    </table>
    <?php
$re=page("t9_news",1,5,$nw);
foreach ($re as $key => $value) {
    if($key==$nw) echo '<a class="bl" style="font-size:60px;" href="?do=anews&page='.$value.'">'.$key.'</a>';
    else echo '<a class="bl" style="font-size:30px;" href="?do=anews&page='.$value.'">'.$key.'</a>';
}
?>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px">
      <input type="button" onclick="op('#cover','#cvr','view.php?do=newsadd')" value="新增最新消息">
      
      </td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

    </form>