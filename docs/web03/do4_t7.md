# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 版型可從第五題開始複製調整，步驟應先設計版型，新增，修改刪除，單獨修改。因版型來自複製修改，能力夠可以連同版型一起設計修好修改刪除功能初階段，之後可新增時再做驗證測試。

這裡會上傳影片動作，記得影片要先透過adobe轉檔，同時檔案最好不要超過2M否則PHP的預設環境下最大只支援2MB。

## A. 顯示+修改+排序+刪除的版型

跟第五題不同的是欄位較多，版型不用太配合，只要該顯示資訊該有功能使用即可。

1. 新增電影的連接按鈕放到上面，帶到do=vvadd之頁面
2. 單修改的連結按鈕到api.php?do=vvchg之處理
3. 單一刪除的連結則是vvdel，利用GET抓ID
4. 批次修改排序的連結則是vvmdy
5. 因update會拆成一筆筆，所以每一個欄位都需要利用格數當作id索引。
6. 排序效果跟第五題一樣，透過數字來控制就好。
7. 影片分級的圖片記得命名為1.2.3.4\(跟資料庫內的命名相同\)

### 建立vv.php\(參考rr.php\)
```php
<h3 class="ct">電影清單</h3>
<input type="button" value="新增電影" onclick="<?= jlo("?do=vvadd") ?>">
<hr>
<form action="api.php?do=vvmdy" method="post" class="ct">
  <table width=100%>
    <?php
    $re = select("t7_movie", "1 order by odr");
    foreach ($re as $ro) {
      ?>
      <tr>
        <td rowspan=3><img width=100 src="upload/<?= $ro['img'] ?>" alt=""></td>
        <td rowspan=3><img src="img/<?= $ro['cls'] ?>.png" alt=""></td>
        <td>片名：<?= $ro['title'] ?>　　　片長：<?= $ro['length'] ?> 　　　上映日期: <?= $ro['date'] ?></td>
      </tr>
      <tr>
        <td>
          排序:<input type="text" name="odr[<?= $ro['id'] ?>]" value="<?= $ro['odr'] ?>">
          <input type="button" value="編輯電影" onclick="<?= jlo("?do=vvchg&id=" . $ro['id']) ?>">
          <input type="button" value="刪除電影" onclick="<?= jlo("api.php?do=vvdel&id=" . $ro['id']) ?>">
        </td>
      </tr>
      <tr>
        <td>劇情介紹：<?= $ro['text'] ?></td>
      </tr>
      <tr>
        <td colspan=3>
          <hr>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div class="ct"><input type="submit" value="編輯排序"></div>
</form>
```
## B. 修改排序與單一刪除處理
修改排序直接丟函式就好，反而刪除部分要利用GET產生一個陣列處理刪除部分

### 增建api.php
```php
case 'vvmdy':
  update($_POST, "q3t7_movie");
  plo("admin.php?do=vv");
  break;
case 'vvdel':
  $_POST['del'][] = $_GET['id'];
  delete($_POST, "q3t7_movie");
  plo("admin.php?do=vv");
  break;
```

## C. 新增單筆功能
欄位較多，求快可以直接br處理而不用table。日期依題目要求分三欄。之後提交api再另行合併。

### 建立vvadd.php
```php
<form action="api.php?do=vvadd" method="post" enctype="multipart/form-data">
  影片資料
  <hr>
  片名: <input type="text" name="title" id=""><br><br>
  分級:
  <select name="cls" id="">
    <option value="1">普遍級</option>
    <option value="2">保護級</option>
    <option value="3">輔導級</option>
    <option value="4">限制級</option>
  </select><br><br>
  片長: <input type="text" name="length" id=""><br><br>
  上映日期:
  <select name="yy" id="">
    <option value="">西元年</option>
    <?php for ($i = 2019; $i < 2020; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="mm" id="">
    <option value="">月份</option>
    <?php for ($i = 1; $i < 13; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="dd" id="">
    <option value="">日期</option>
    <?php for ($i = 1; $i < 32; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select><br><br>
  發行商: <input type="text" name="corp" id=""><br><br>
  導演: <input type="text" name="corp" id=""><br><br>
  預告影片: <input type="file" name="video" id=""><br><br>
  電影海報: <input type="file" name="img" id=""><br><br>
  劇情簡介
  <hr>
  <textarea name="text" id="" cols="30" rows="10"></textarea><br><br>
  <input type="submit" value="新增">
</form>
```

### 增建api.php
日期需要合併成一個POST欄位方便且合併完後要清除掉，insert才能與SQL對應作業。檔案都需要拆開，一次只能丟一筆到addfile\(\)並取得黨名。所以有的檔案都會被放置到upload且已被更名。

```php
case 'vvadd':
  $_POST['img'] = addfile($_FILES['img']);
  $_POST['video'] = addfile($_FILES['video']);
  $_POST['date'] = $_POST['yy'] . "-" . $_POST['mm'] . "-" . $_POST['dd'];
  unset($_POST['yy'], $_POST['mm'], $_POST['dd']);
  insert($_POST, "q3t7_movie");
  plo("admin.php?do=vv");
  break;
```

## D. 單筆修改
兩者欄位與版型相同，求快就不用帶預設值。

### 新增vvchg.php\(參考vvadd.php\)
```php
<h3 class="ct">修改電影資料</h3>
<form action="api.php?do=vvchg&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
  影片資料
  <hr>
  片名: <input type="text" name="title[<?= $_GET['id'] ?>]" id=""><br><br>
  分級:
  <select name="cls[<?= $_GET['id'] ?>]" id="">
    <option value="1">普遍級</option>
    <option value="2">保護級</option>
    <option value="3">輔導級</option>
    <option value="4">限制級</option>
  </select><br><br>
  片長: <input type="text" name="length[<?= $_GET['id'] ?>]" id=""><br><br>
  上映日期:
  <select name="yy" id="">
    <option value="">年</option>
    <?php for ($i = 2019; $i < 2020; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="mm" id="">
    <option value="">年</option>
    <?php for ($i = 1; $i < 13; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select>
  <select name="dd" id="">
    <option value="">年</option>
    <?php for ($i = 1; $i < 32; $i++) echo '<option value="' . $i . '">' . $i . '</option>'; ?>
  </select><br><br>
  發行商: <input type="text" name="corp[<?= $_GET['id'] ?>]" id=""><br><br>
  導演: <input type="text" name="corp[<?= $_GET['id'] ?>]" id=""><br><br>
  預告影片: <input type="file" name="video" id=""><br><br>
  電影海報: <input type="file" name="img" id=""><br><br>
  劇情簡介
  <hr>
  <textarea name="text[<?= $_GET['id'] ?>]" id="" cols="30" rows="10"></textarea><br><br>
  <input type="submit" value="修改">
</form>
```

### 增添api.php
不考慮是否有抓到檔案，都直接做更新，沒有輸入或檔案就是會變空的內容。

```php
case 'vvchg':
  $_POST['img'][$_GET['id']] = addfile($_FILES['img']);
  $_POST['video'][$_GET['id']] = addfile($_FILES['video']);
  $_POST['date'][$_GET['id']] = $_POST['yy'] . "-" . $_POST['mm'] . "-" . $_POST['dd'];
  unset($_POST['yy'], $_POST['mm'], $_POST['dd']);
  update($_POST, "q3t7_movie");
  plo("admin.php?do=vv");
  break;
```