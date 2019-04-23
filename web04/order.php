<h3>訂單管理</h3>
<table>
  <tr>
    <td>訂單編號</td>
    <td>金額</td>
    <td>會員帳號</td>
    <td>姓名</td>
    <td>下單時間</td>
  </tr>
  <?php
  $re = select("t8_order", 1);
  foreach ($re as $ro) {
    $seq = date("Ymd000000", strtotime($ro['date'])) + $ro['id'];
    ?>
    <tr bgcolor=#ffc>
      <td><a href="?redo=item&id=<?= $ro['id'] ?>"><?= $seq ?></a></td>
      <td><?= $ro['total'] ?></td>
      <td><?= $ro['user'] ?></td>
      <td><?= $ro['name'] ?></td>
      <td><?= $ro['date'] ?></td>
      <td>
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=odrdel&id=' . $ro['id']) ?>">
      </td>
    </tr>
  <?php
}
?>
</table>