# No.11 最新文章 (25%)
這題設計要點比較多，分為幾個重點如下
- 分頁功能（limit 一次 5 筆），包含分頁導覽。
- 左邊為標題區，右邊為內容區。內容區可能是縮文或是全文（利用 $_GET['id'] 判斷處理）。
- 登入者提供讚功能

![q2t11](https://i.imgur.com/JhtNHEE.png)

## 列表 5 筆 + 分頁導覽 + 縮文 or 全文

**列表五筆的重點代碼**
```php
$_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
$nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
$begin = ($nw - 1) * 5;
$re = select("q2t7_blog", "dpy=1 limit " . $begin . ",5");
foreach ($re as $ro) {
?>
  <tr>
    <td><?= $ro['title'] ?></td>
    <td><?= $ro['text'] ?></td>
  </tr>
<?php
}
```

**分頁導覽的重點代碼**
```php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=news&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=news&page=' . $value . '">' . $key . '</a>';
}
```

**縮文 or 全文的重點代碼。**
1. 如果 GET['id'] 存在且同等於本行的 ID，那就是全文
2. 否則，顯示縮文並自帶超連結夾帶 id，記得保留 page 值

```php
<?= ($_GET['id'] == $ro['id']) ? $ro['text'] : '<a href="?do=news&page=' . $nw . '&id=' . $ro['id'] . '">' . mb_substr($ro['text'], 0, 10) . '...</a>' ?>
```

合併起來為以下完整碼
### 建立 news.php
```php news.php
目前位置：首頁>最新消息區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 limit " . $begin . ",5");
  foreach ($re as $ro) {
  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td>
        <?= ($_GET['id'] == $ro['id']) ?
          $ro['text'] :
          '<a href="?do=news&page=' . $nw . '&id=' . $ro['id'] . '">' . mb_substr($ro['text'], 0, 10) . '...</a>' ?>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
<?php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=news&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=news&page=' . $value . '">' . $key . '</a>';
}
?>
```

## 讚功能
素材內以提供函式 good(id,type,user) 能協助你向後端傳送訊息以及切換畫面的文字顯示。路徑在 home_files/js.js ，先確認以下資訊做基本觀念，之後我們會再調整此函式：

```javascript js.js
function good(id,type,user)
{
	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
	{
		if(type=="1")
		{
			$("#vie"+id).text($("#vie"+id).text()*1+1)
			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
		}
		else
		{
			$("#vie"+id).text($("#vie"+id).text()*1-1)
			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
		}
	})
}
```

### 登入者的顯示
先設計一個變數為 $gdbtn 判斷使用者已登入才有內容，並檢查是否 [user name] 與 [blog id] 有紀錄

1. 有，設計收回讚的 HTML
2. 沒有，設計讚的 HTML
3. 使用 `` 是為了克服 JavaScript 的文字串結構。

### 增添 news.php
```php
$gdbtn="";
if (!empty($_SESSION['user'])) {
  $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
  $gdbtn = ($gd != null) ?
    '<a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdsub`)">收回讚</a>' :
    '<a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdadd`)">讚</a>';
}
```

這段代碼放在 SQL select 之後的迴圈並取得 `$ro['id']`，讚擺放在新的第三組 td 內，整合起來變成：

```html news.php
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <!-- ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓-->
    <td width=10%></td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 limit " . $begin . ",5");
  foreach ($re as $ro) {

    /* ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓ */
    $gdbtn="";
    if (!empty($_SESSION['user'])) {
      $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
      $gdbtn = ($gd != null) ?
        '<a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdsub`)">收回讚</a>' :
        '<a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdadd`)">讚</a>';
    }

  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td>
        <?= ($_GET['id'] == $ro['id']) ?
          $ro['text'] :
          '<a href="?do=news&page=' . $nw . '&id=' . $ro['id'] . '">' . mb_substr($ro['text'], 0, 10) . '...</a>' ?>
      </td>
      <!-- ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓-->
      <td><?= $gdbtn ?></td>
    </tr>
  <?php
  }
  ?>
</table>
```

## 讚的資料處理
素材使用 ajax 方式傳送，所以我們需要調整：
- 更改為目標為 `api.php?do=${type}`，讓 api 分開處理不要寫在同一個避免還要做判斷
- 原 type 的 1 與 2 調整為 addgd 與 subgd 避免混淆
- user 這個傳遞變數可省略，因為直接用 `$_session['user']` 就能讀到
- 這裡我們只用到 `$.post` 以及 `$("#good" + id)`，用不到 `$("#vie" + id)` 但之後題目才會用到勿刪

提交的 API 行為分兩個動作：
- 對文章的 num 修改數字，num+1 跟 num-1 函式庫那裏會自動+1-1。
- 對資料表 `q2t11_good` 做新增 (insert) 或刪除 (delete) 當作對應的讚紀錄。
- 刪除時因為不知道讚紀錄的 ID ，所以另使用 delat 以條件（用戶 ID 跟文章 ID) 做刪除而不是靠紀錄 ID。
- 另外也要記得對該文章的統計做更新 (update)

### 修改 js.js
```javascript js.js
function good(id, type) {
	$.post(`api.php?do=${type}`, { "id": id }, function () {
		if (type == "gdadd") {
			$("#vie" + id).text($("#vie" + id).text() * 1 + 1)
			$("#good" + id).text("收回讚").attr("onclick", "good('" + id + "','gdsub')")
		}
		else {
			$("#vie" + id).text($("#vie" + id).text() * 1 - 1)
			$("#good" + id).text("讚").attr("onclick", "good('" + id + "','gdadd')")
		}
	})
}
```

### 增添 api.php
```php api.php
case 'gdadd':
    $post['user'] = $_SESSION['user'];
    $post['blog'] = $_POST['id'];
    insert($post, "q2t11_good");

    $num['num+1'] = $_POST['id'];
    update($num, "q2t7_blog");
    break;
  case 'gdsub':
    $post['delwh'] = "user='" . $_SESSION['user'] . "' and blog=" . $_POST['id'];
    delete($post, "q2t11_good");

    $num['num-1'] = $_POST['id'];
    update($num, "q2t7_blog");
    break;
```

>測試時如果跑 ajax 一直是 back.php 時，試著 <kbd>Ctrl+F5</kbd> 刷新。

---

# No.12 人氣文章 (25%)
版型跟第 11 題差不多，主要設計有以下幾點：

1. 一樣有分頁功能（limit 一次 5 筆），包含分頁導覽。
2. 左邊為標題區，右邊為縮文區。全文使用浮動視窗顯示（偷第一題的 JS 來用）
3. 顯示讚統計
4. 登入者提供讚功能



這題稍微複雜些，主要是需要 select 後跑 foreach 的位置在版型內部。以及 foreach 內需要混和不少題目動作。難度還可以且代碼也不算多，就比較需要理解每一小段的用途。像是 limit 的列表、讚功能與登入者、分頁、分頁導覽。以及一些細節上的顯示調整。

## 列表 5 筆 + 分頁導覽 + 讚功能
除了縮文與全文的表現方式會特別解釋，其他這裡不再細部解析三段代碼，直接調整到適合的版型。

另外調整一下現有的資料：

1. 調整 select 的 order by num desc
2. 先顯示全文，我們之後再來處理這點
3. 多了 $ro['num'] 顯示統計值且使用 span#vie 包覆，將會跟素材 js.js 連動
4. 記得放入讚圖片 02B03.jpg

### 新增 pop.php（參考 news.php)
```html pop.php
目前位置：首頁>人氣文章區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <td width=20%>人氣</td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 order by num desc");
  foreach ($re as $ro) {
    $gdbtn = "";
    if (!empty($_SESSION['user'])) {
      $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
      $gdbtn = ($gd != null) ?
        '- <a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdsub`)">收回讚</a>' :
        '- <a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdadd`)">讚</a>';
    }

  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td><?= $ro['text'] ?></td>
      <td><span id="vie<?= $ro['id'] ?>"><?= $ro['num'] ?></span> 個人說 <img style="height:1em" src="img/02B03.jpg"><?= $gdbtn ?></td>
    </tr>
  <?php
  }
  ?>
</table>
<?php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=pop&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=pop&page=' . $value . '">' . $key . '</a>';
}
?>
```

以上你已經完成 80%要求

## 浮動視窗
去拿第一題的 JS 代碼，就放在 01P02.htm（首頁）的最新消息那裏包含 JS，整理一下段落後放置到你本頁的最後，並先分析需要的 code 在哪裡

```html
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 0px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
  $(".sswww").hover(
    function() {
      $("#alt").html("" + $(this).children(".all").html() + "").css({
        "top": $(this).offset().top - 250
      })
      $("#alt").show()
    }
  )
  $(".sswww").mouseout(
    function() {
      $("#alt").hide()
    }
  )
</script>
```

這段解釋大致重點為：
滑到觸發對象時 (class=sswww)，div#alt 會顯示出來，並同時抓取觸發對象的內部 class=all 之內容。所以我們改一下 HTMLL 跟 JS：

在每個迴圈裡面的文字部分：

```html
<td>
  <div class="sswww"><?= mb_substr($ro['text'], 0, 10)?>...
    <span class="all" style="display:none"><?= $ro['text'] ?></span>
  </div>
</td>
```

### 調整 pop.php
總結整步驟完整代碼為
```html pop.php
目前位置：首頁>人氣文章區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <td width=20%>人氣</td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 order by num desc");
  foreach ($re as $ro) {
    $gdbtn = "";
    if (!empty($_SESSION['user'])) {
      $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
      $gdbtn = ($gd != null) ?
        '- <a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdsub`)">收回讚</a>' :
        '- <a id="good' . $ro['id'] . '" onclick="good(' . $ro['id'] . ',`gdadd`)">讚</a>';
    }

  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td>
        <div class="sswww"><?= mb_substr($ro['text'], 0, 10) ?>...
          <span class="all" style="display:none"><?= $ro['text'] ?></span>
        </div>
      </td>
      <td><span id="vie<?= $ro['id'] ?>"><?= $ro['num'] ?></span> 個人說 <img style="height:1em" src="img/02B03.jpg"><?= $gdbtn ?></td>
    </tr>
  <?php
  }
  ?>
</table>
<?php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=pop&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=pop&page=' . $value . '">' . $key . '</a>';
}
?>

<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 0px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
  $(".sswww").hover(
    function() {
      $("#alt").html("" + $(this).children(".all").html() + "").css({
        "top": $(this).offset().top - 250
      })
      $("#alt").show()
    }
  )
  $(".sswww").mouseout(
    function() {
      $("#alt").hide()
    }
  )
</script>
```