<fieldset>
  <legend>會員註冊</legend>
  *請設定您要註冊的帳號及密碼（最長 12 個字元） <br>
  <form action="api.php?do=reg" method="post">
    Step1: 登入帳號 <input type="text" name="acc"><br>
    Step2: 登入密碼 <input type="password" name="pwd"><br>
    Step3: 再次確認密碼 <input type="password" name="pwd1"><br>
    Step4: 信箱（忘記密碼時使用） <input type="text" name="mail"><br>
    <input type="submit" value="註冊"><input type="reset" value="清除">
  </form>
</fieldset>