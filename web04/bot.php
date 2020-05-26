<h3 class="ct">編輯頁尾版權區</h3>
<form action="api.php?do=bot" method="post">
  <input id="vall" type="text" name="text[1]" value="<?= select("q4t11_footer", 1)[0]['text'] ?>">
  <input type="submit" value="修改">
  <input type="button" value="重置" onclick="$('#vall').val('')">
</form>