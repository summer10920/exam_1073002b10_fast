<fieldset>
  <legend>新增問卷</legend>
  <form action="api.php?do=queadd" method="post">
    <div id=que>
      問卷名稱：<input type="text" name="fa" id=""><br>
      選項：<input type="text" name="son[]" id=""><br>
    </div>
    <input type="button" value="更多" onclick=add()><input type="submit" value="新增"><input type="reset" value="清除">
  </form>
</fieldset>
<script>
  function add() {
    txt = '選項：<input type="text" name="son[]" id=""><br>';
    $("#que").append(txt);
  }
</script>