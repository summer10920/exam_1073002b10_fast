<h3 class="ct">修改電影資料</h3>
<form action="api.php?do=vvchg&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
  影片資料
  <hr>
  片名：<input type="text" name="title[<?= $_GET['id'] ?>]" id=""><br><br>
  分級：
  <select name="cls[<?= $_GET['id'] ?>]" id="">
    <option value="1">普遍級</option>
    <option value="2">保護級</option>
    <option value="3">輔導級</option>
    <option value="4">限制級</option>
  </select><br><br>
  片長：<input type="text" name="length[<?= $_GET['id'] ?>]" id=""><br><br>
  上映日期：
  <select name="yy" id="">
    <option value="">年</option>
    <?php for ($i = date("Y"); $i < date("Y") + 2; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="mm" id="">
    <option value="">年</option>
    <?php for ($i = 1; $i < 13; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="dd" id="">
    <option value="">年</option>
    <?php for ($i = 1; $i < 32; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select><br><br>
  發行商：<input type="text" name="corp[<?= $_GET['id'] ?>]" id=""><br><br>
  導演：<input type="text" name="corp[<?= $_GET['id'] ?>]" id=""><br><br>
  預告影片：<input type="file" name="video" id=""><br><br>
  電影海報：<input type="file" name="img" id=""><br><br>
  劇情簡介
  <hr>
  <textarea name="text[<?= $_GET['id'] ?>]" id="" cols="30" rows="10"></textarea><br><br>
  <input type="submit" value="修改">
</form>