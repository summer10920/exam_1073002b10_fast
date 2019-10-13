# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 第七題已經設計出可新增會員，這裡只需做列表與修改刪除。

## A. 清單檢視版型
取得相近的HTML table版型做設計

# 新增mem.php\(參考order.php\)
```php
<h3>會員管理</h3>
<table>
  <tr>
    <td>姓名</td>
    <td>會員帳號</td>
    <td>註冊日期</td>
    <td>操作</td>
  </tr>
  <?php
  $re = select("q4t9_user", 1);
  foreach ($re as $ro) {
    ?>
    <tr bgcolor=#ffc>
      <td><?= $ro['id'] ?></a></td>
      <td><?= $ro['acc'] ?></td>
      <td><?= $ro['date'] ?></td>
      <td>
        <input type="button" value="修改" onclick="<?= jlo('?redo=memmdy&id=' . $ro['id']) ?>">
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=memdel&id=' . $ro['id']) ?>">
      </td>
    </tr>
  <?php
}
?>
</table>
```

## B. 修改功能
參考HTML Table版型規劃。題目只要求可指定修改四個資料，這裡考試速度不帶預設值，修改需夾帶ID在各name內。

### 新增memmdy.php\(參考item.php\)
```php
<h3 class="ct">編輯會員</h3>
<form action="api.php?do=memmdy" method="post" onsubmit="return check()">
  姓名: <input type="text" name="name[<?= $_GET['id'] ?>]" id=""><br>
  電話: <input type="text" name="tel[<?= $_GET['id'] ?>]" id=""><br>
  地址: <input type="text" name="addr[<?= $_GET['id'] ?>]" id=""><br>
  電子信箱: <input type="text" name="mail[<?= $_GET['id'] ?>]" id=""><br>
  <input type="submit" value="確認">
</form>
```

### 增添api.php
```php
case 'mdyuser':
  update($_POST,"q4t9_user");
  plo('admin.php?do=admin&redo=mem');
  break;
```

這裡後台會看不到修改後的差異，驗收的時候請考官去看前台的新訂單動作下的資料。

## C. 刪除功能
廢話不多說

### 增添api.php
```php
  case 'memdel':
    $post['del'][] = $_GET['id'];
    delete($post, "q4t9_user");
    plo("admin.php?redo=mem");
    break;
```