# 網頁設計乙級術科題庫分析
(108年度技術士技能檢定-考試速寫版 ver2)

---

## 說明
!> 本篇做題採用PDO的資料庫連結方式，透過建立一次Function就能快速直覺使用。

## 建立sql.php
1. 建立sql.php，將所有function寫在此檔，方便之後於網頁做inclue使用
2. 背熟並記得利用90分鐘先做好此檔案。
3. 前半段主要是提供insert、update、delete、select等應用。盡可能完成前段內容。這能公用到四個題目
4. 之後當你正式開始作答題目，可以將公用的變數放置在sql.php後半段，直接全部通用。

```php
<?php
session_start(); //open session
//SQL連結PDO物件
$db=new PDO("mysql:host=127.0.0.1;dbname=db00;charset=utf8","root","",null); 
date_default_timezone_set('Asia/Taipei'); //更改時區

//select SQL
function select($tb,$wh){  //給我資料表名稱跟條件，我能回傳select結果
  global $db;
  return $db->query("SELECT * FROM ".$tb." WHERE ".$wh)->fetchAll();
}

//insert SQL
function insert($ary,$tb){ //給我資料跟資料表名稱，我自動的新增一筆資料
  global $db;
  $field="id";
  $data="null";
  foreach ($ary as $key => $value) {
    $field.=",".$key;
    $data .=",'".$value."'";
  }
  $db->query("INSERT INTO ".$tb."(".$field.") VALUES (".$data.")");
  return $db->lastInsertId(); //取得剛剛新增的索引
}

//update SQL
function update($ary,$tb){
  global $db;
  foreach ($ary as $do => $data){
    switch ($do) {
      case 'num+1': //如果資料索引是num+1，對某id做num+1
        $db->query("UPDATE ".$tb." SET num=num+1 WHERE id=".$data);
        break;
      case 'num-1': //如果資料索引是num-1，對某id做num-1
        $db->query("UPDATE ".$tb." SET num=num-1 WHERE id=".$data);
        break;
      default: //多筆多欄一組組更新，陣列索引=id，暴力的一次只更新一欄
        foreach ($data as $key => $value)
          $db->query("UPDATE ".$tb." SET ".$do."='".$value."' WHERE id=".$key);
        break;
    }
  }
}

//delete SQL 
function delete($ary,$tb){
  global $db;
  foreach ($ary as $do => $data) {
    switch ($do) {
      case 'del': //多筆刪除，前端 $_POST['del'][5]=這個POST陣列裡面有del這個維度陣列
        foreach ($data as $value)
          $db->query("DELETE FROM ".$tb." WHERE id=".$value);
        break;
      case 'delwh':
        $db->query("DELETE FROM ".$tb." WHERE ".$data);
        break;
    }
  }
}

//php轉址
function plo($link){
  return header("location:".$link);
}

//JS轉址
function jlo($link){
  return "location.href='".$link."'";
}

//add file單筆，不要整個$_FILES丟過來
function addfile($file){
  $newname=time()."_".$file['name'];
  copy($file['tmp_name'],"upload/".$newname);
  return $newname;
}

//分頁導覽
function navpage($tb,$wh,$range,$nowpage){
  $total=count(select($tb,$wh));
  $many=ceil($total / $range);
  $pg['<']=($nowpage==1)?$nowpage:$nowpage-1;
  for ($i=1;$i<=$many;$i++) $pg[$i]=$i;
  $pg['>']=($nowpage==$many)?$many:$nowpage+1;
  return $pg;
}
?>
```

## 各函式說明


### SESSION、PDO、時區
```php
session_start();    //open session
//SQL連結PDO物件
$db=new PDO("mysql:host=127.0.0.1;dbname=db00;charset=utf8","root","",null);
date_default_timezone_set('Asia/Taipei');   //更改時區
```

這三個是基本會用到的基礎宣告。包含SESSION、PDO、時區。之後只要PHP有include本檔案時，都能引用此三項東西。

PDO是一種可以連線任何品牌的SQL連線方式。\(mysql,mssql,oracle等等都可以\)。PHP5.4有列入為內建物件導向，使用前需要new物件並存放到變數$db，之後舉凡任何sql的insert,update,select,delete都能透過PDO的函式執行。

宣告前先提供連線資訊 \[資料類型:host=位置;dbname=資料庫名;charset=編碼,帳號,密碼,其他條件\]  
本解析會用到的PDO function為query\(\)-&gt;fetchAll\(\)，代表執行與回存所有結果

### select * from \$ where \$

```php
//select SQL
function select($tb,$wh){
  //給我資料表名稱$tb跟條件$wh，我能回傳select結果
  global $db;
  return $db->query("SELECT * FROM ".$tb." WHERE ".$wh)->fetchAll();
}
```
做SQL的select動作，需要取得資料表名稱\$tb跟條件\$wh，執行SQL結果並以陣列回傳所有結果。

### insert into (\$) values(\$)

```php
//insert SQL
function insert($ary,$tb){
  //給我資料跟資料表名稱，我自動的新增一筆資料
  global $db;
  $field="id";
  $data="null";
  foreach ($ary as $key => $value) {
    $field.= ",".$key;
    $data.=",'".$value."'";
  }
  $db->query("INSERT INTO ".$tb."(".$field.") VALUES (".$data.")");
  return $db->lastInsertId(); //取得剛剛新增的主鍵
}
```
做SQL的insert動作，SQL新增語法=INSERT INTO table \(name1,name2,name3...\)VALUES\(val1,val2,val3...\)。因此你需要整理成以上字串，再透過query\(\)去執行結果。最後再去查詢剛剛新增的ID是甚麼


### update \$ set ... where ...
```php
//update SQL
function update($ary, $tb){
  global $db;
  foreach ($ary as $do => $data) {
    switch ($do) {
      case 'num+1': //如果資料索引是num+1，對某id做num+1
        $db->query("UPDATE ".$tb." SET num=num+1 WHERE id=".$data);
        break;
      case 'num-1': //如果資料索引是num-1，對某id做num-1
        $db->query("UPDATE ".$tb." SET num=num-1 WHERE id=".$data);
        break;
      default: //多筆多欄一組組更新，陣列索引=id，暴力的一次只更新一欄
        foreach ($data as $key => $value)
          $db->query("UPDATE ".$tb." SET ".$do."='".$value."' WHERE id=".$key);
        break;
    }
  }
}
```

作SQL的update動作，需要取得陣列跟資料表名稱。丟進來的陣列使用foreach拆開分析。修改請求大多都是多筆各單值批次。只有在做特殊修改時會是單筆\(num+1 or -1\)。

修改方式有3種不同做法，分類出是`num+1`,`num-1`，`普通的資料修改`，差別用一維(\$name,\$data)或二維陣列(\$na,\$dt=(\$key,\$value))

第一層為動作指定name跟data。根據甚麼名稱做不同的update描述。

- num+1：
  代表要對某數字做+1，此時data\($dt\)代表式條件的id值
- num-1：
  代表要對某數字做-1，此時data\($dt\)代表式條件的id值
- default：
  也就是要做多筆批次更新。所以需知道條件之id(\$key)與內容(\$value)，\$dt裡面會包了這兩組內容因此拆開取得，此時\$na代表欄位名。另外注意像是radio或select做修改，丟過來的\$ary陣列必須塞好新值是0或1。這樣函式就比較暴力的全部資料以一次一個欄位的做更新。

### delete from \$ where \$
```php
//delete SQL 
function delete($ary, $tb){
  global $db;
  foreach ($ary as $do => $data) {
    switch ($do) {
      case 'del': //多筆刪除，前端 $_POST['del'][5] = 這個POST陣列裡面有del這個維度陣列
        foreach ($data as $value)
          $db->query("DELETE FROM ".$tb." WHERE id=".$value);
        break;
      case 'delat':
        $db->query("DELETE FROM ".$tb." WHERE ".$data);
        break;
    }
  }
}
```
作SQL的delete動作，需要取得陣列跟資料表名稱。丟進來的陣列有不同效果。刪除動作在4組題目內有兩種可能。分別是批次刪除跟特別條件刪除。

- del：代表是批次刪除，將data分析出所有的value。做多筆一個個刪除。
- delat：代表是有條件的刪除，此時$dt代表條件。


### 轉址功能

```php
function plo($link){
  return header("location:".$link);
}

function jlo($link){
  return "location.href='".$link."'";
}
```
做為轉址用，有可能在PHP下執行或JS下執行，所以做兩個不同函式。

### file upload

```php
function addfile($file){
  //add file單筆，不要整個$_FILES丟過來
  $newname=time()."_".$file['name'];
  copy($file['tmp_name'], "upload/".$newname);
  return $newname;
}
```

檔案上傳所用，先取得file陣列各內容數據，並命名為日期+原黨名。複製到指定路徑upload資料夾內。並回傳新名字

### pagenav

```php
function navpage($tb, $wh, $range, $nowpage){
  $total=count(select($tb, $wh));
  $many=ceil($total / $range);
  $pg['<']=($nowpage == 1) ? $nowpage : $nowpage - 1;
  for ($i=1; $i <= $many; $i++) $pg[$i]=$i;
  $pg['>']=($nowpage == $many) ? $many : $nowpage + 1;
  return $pg;
}
```
提供資料表、條件、一次幾筆、目前頁數。接著動作為

* 先計算出有多少`$total`筆資料需要多少個導覽按鈕`$many`。
* 用一個陣列`$pg`透過`$key`與`$value`存入顯示文跟頁數字。同時判斷當下`$nowpage`是第幾頁使[<][>]有不同的`$value`變化
* 最後回傳整個陣列，讓前端以此array逐一列印出來。同時用link的URL來做網址。例如

譬如算出為5頁，目前是第3頁。\$pg的
$key部分 ==<==,1,2,3,4,5,==&gt;==
$value就是 **2**,1,2,3,4,5,**4**

前端這裡的輸出方式為
```php
//將陣列做成HTML顯示
foreach($result as $key=>$value)
    echo '<a href="?gage='.$value.'">'.$key.'</a> ';
```
這樣你會得到一連串的超連結