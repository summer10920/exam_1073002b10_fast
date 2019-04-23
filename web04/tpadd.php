<h3 class="ct">新增商品</h3>
<form action="api.php?do=tpadd" method="post" enctype="multipart/form-data">
  所屬大類:
  <select name="fa" id="" onchange="getson()">
    <option value="">請選擇</option>
    <?php
    $re = select("t4_class", "parent=0");
    foreach ($re as $ro) echo '<option value="' . $ro['id'] . '">' . $ro['text'] . '</option>';
    ?>
  </select><br>
  所屬中類:
  <select name="son" id="">
  </select><br>
  商品編號: 系統自動生成<br>
  商品名稱: <input type="text" name="title" id=""><br>
  商品價格: <input type="text" name="price" id=""><br>
  規格: <input type="text" name="spec" id=""><br>
  庫存量: <input type="text" name="num" id=""><br>
  商品圖片: <input type="file" name="img" id=""><br>
  商品介紹: <textarea name="text" id="" cols="30" rows="10"></textarea>
  <input type="submit" value="新增">
</form>
<script>
  function getson() {
    id = $("select[name=fa]").val();
    $.post("api.php?do=getson", {
      id
    }, function(re) {
      $("select[name=son]").html(re);
    });
  }
</script>