<h3 class="ct">會員註冊</h3>
<form action="api.php?do=reg" method="post" onsubmit="return checkflag()">
  姓名：<input type="text" name="name" id=""><br>
  帳號：<input type="text" name="acc" id=""><input type="button" value="檢測帳號" onclick="check()"><br>
  密碼：<input type="text" name="pwd" id=""><br>
  電話：<input type="text" name="tel" id=""><br>
  地址：<input type="text" name="addr" id=""><br>
  電子信箱：<input type="text" name="mail" id=""><br>
  <input type="submit" value="確認">
</form>
<script>
  flag = 1;
  function check() {
    if ($("input[name=acc]").val() == 'admin') alert("不可使用 admin");
    else {
      id = $("input[name=acc]").val();
      $.post("api.php?do=checkuser", {id}, function(re) {
        alert(re);
        if (re == "可使用此帳號") flag = 0;
        else flag = 1;
      });
    }
  }

  function checkflag() {
    if (flag) {
      alert("請先驗證帳號");
      return false;
    }
  }
</script>