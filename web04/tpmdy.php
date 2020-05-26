<h3 class="ct">修改商品</h3>
<form action="api.php?do=tpmdy&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
  所屬大類：
  <select id=fa name="fa[<?= $_GET['id'] ?>]" id="" onchange="getson()">
    <option value="">請選擇</option>
    <?php
    $re = select("q4t4_class", "parent=0");
    foreach ($re as $ro) echo '<option value="' . $ro['id'] . '">' . $ro['title'] . '</option>';
    ?>
  </select><br>
  所屬中類：
  <select id=son name="son[<?= $_GET['id'] ?>]" id="">
  </select><br>
  商品編號：<?= select("q4t5_product", "id=" . $_GET['id'])[0]['seq'] ?><br>
  商品名稱：<input type="text" name="title[<?= $_GET['id'] ?>]" id=""><br>
  商品價格：<input type="text" name="price[<?= $_GET['id'] ?>]" id=""><br>
  規格：<input type="text" name="spec[<?= $_GET['id'] ?>]" id=""><br>
  庫存量：<input type="text" name="num[<?= $_GET['id'] ?>]" id=""><br>
  商品圖片：<input type="file" name="img" id=""><br>
  商品介紹：<textarea name="text[<?= $_GET['id'] ?>]" id="" cols="30" rows="10"></textarea>
  <input type="submit" value="修改">
</form>
<script>
  function getson() {
    id = $("#fa").val();
    $.post("api.php?do=getson", {
      id
    }, function(re) {
      $("#son").html(re);
    });
  }
</script>