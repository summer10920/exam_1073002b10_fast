# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 這裡只有兩個版型要規劃，分別是列表與細節。透過第七提建立幾筆訂單。

## A. 訂單列表
之前都已經先將必要資訊都已建立起來，只需取得sql table order。刪除則由API來處理。注意delete function之格式。至於細節則導向到do=admin&redo=orderdetial並夾帶ID

### 建立order.php\(參考buycart.php\)
```php
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
  $re = select("q4t7_order", 1);
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
```

## B. 訂票細節
1. 這裡要抓取order與product商品\(藉由GET ID\)

### 建立item.php\(參考order.php\)
```php
<?php
$re = select("q4t8_order", "id=" . $_GET['id']);
$ro = $re[0];
$seq = date("Ymd000000", strtotime($ro['date'])) + $ro['id'];
?>
<h3>訂單編號<?= $seq ?>的詳細資料</h3>
姓名: <?= $ro['name'] ?><br>
帳號: <?= $ro['user'] ?><br>
電話: <?= $ro['tel'] ?><br>
地址: <?= $ro['addr'] ?><br>
電子信箱: <?= $ro['mail'] ?>
<hr>
<table>
  <tr>
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $ary = unserialize($ro['buy']);
  foreach ($ary as $key => $value) {
    $re = select("q4t5_product", "id=" . $key);
    $x = $re[0];
    ?>
    <tr bgcolor=#ffc>
      <td><?= $x['title'] ?></td>
      <td><?= $key ?></td>
      <td><?= $value ?></td>
      <td><?= $x['price'] ?></td>
      <td><?= $x['price'] * $value ?></td>
    </tr>
  <?php
  }
  ?>
  <tr>
    <td>總價：<?= $ro['total'] ?></td>
  </tr>
</table>
<hr>
<input type="button" value="返回" onclick="window.history.back()">
```

## C. 訂單刪除
題目要求可以刪除訂單，由api來處理

### 增添api.pgp
```php
case 'odrdel':
  $post['del'][] = $_GET['id'];
  delete($post, "q4t8_order");
  plo("admin.php?redo=order");
  break;
```