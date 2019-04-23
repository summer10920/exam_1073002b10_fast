<form action="api.php?do=thmdy&id=<?=$_GET['id']?>" method="post">
名稱: <input type="text" name="text[<?=$_GET['id']?>]" id=""><br>
<input type="submit" value="修改">
</form>