# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 這題只需要HTML編輯動作，以及規劃登入紀錄瀏覽次數的SQL設計要求。

## A. 標題圖片
調整網站的標題圖片，替代文字可能是title或是alt。建議都做。

### 修改index.php
找到\#title2部分

```php
<div id="title2">
</div>
```

修改為

```php
<div id="title2">
<img src="img/02B01.jpg" alt="健康促進網 - 回首頁" title="健康促進網 - 回首頁">
</div>
```

## B. 今天日期、今日瀏覽人次、累計瀏覽人次
先開始規劃如何取得這三個變數，提供前端使用。

1. 今天日期：用date\(\)去做出題目要求的格式
2. 今日瀏覽人次：把每天的日期記錄起來，不存在就新增。有新訪客就加1。
3. 累計瀏覽人次：跑個迴圈把資料表內所有數字加起來

### 增添sql.php
```php
//t3
$re=select("q2t3_visit","date='".date("Y-m-d")."'");//檢查今日是否存在
if($re==null){
    $post['num']=0;
    $post['date']=date("Y-m-d");
    $id=insert($post,"q2t3_visit");
    $t3visit=0;//初始拜訪0
}
else {
    $id=$re[0]['id'];
    $t3visit=$re[0]['num'];
}
if(empty($_SESSION['visit'])){//檢查是否新訪客
    $_SESSION['visit']=123;
    $_POST['num+1']=$id;
    update($_POST,"q2t3_visit");
    $t3visit++;
}
$re=select("q2t3_visit",1);
$t3all=0;
foreach ($re as $ro) $t3all+=$ro['num'];//統計總數
```

### 修改index.php

回到前台開始顯現\(記得include 這個sql.php\)

```php
<?php //塞入HTML開頭
    include "sql.php";
?>
```

修改

```php
 00 月 00 號 Tuesday | 今日瀏覽: 1 | 累積瀏覽: 36
```

為

```php
<?=date("m月d號 l")?> | 今日瀏覽: <?=$t3visit?> | 累積瀏覽: <?=$t3all?>
```

## C. 右邊的回首頁按鈕
要在右邊加入&lt;a href="index.php" style="float:right"&gt;回首頁&lt;/a&gt;，跟上面同樣位置，如下

### 修改index.php
```php
<div id="title">
    <?=date("m月d號 l")?> | 今日瀏覽: <?=$t3visit?> | 累積瀏覽: <?=$t3all?>
    <a href="index.php" style="float:right">回首頁</a>
</div>
```



