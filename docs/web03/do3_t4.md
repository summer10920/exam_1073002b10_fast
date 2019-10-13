# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 做好第五題時已經擁有一些資料。便可以開始設計前台。需要一些css animate以及第一題的按鈕互動。

## A. 按鈕列設計
第五題完成後才處理第四題關於前台的slider素材，可以去偷取第一題的img箭頭以及JS來改寫。箭頭利用windows檔案總管右鍵快速旋轉並用小畫家儲存為left.jpg跟right.jpg。將圖片放到img內待用。

取得的`web01 JS`為
```javascript
<script>
var nowpage=0,num=0;
function pp(x)
{
var s,t;
if(x==1&&nowpage-1>=0)
{nowpage--;}
if(x==2&&(nowpage+1)*3<=num*1+3)
{nowpage++;}
$(".im").hide()
for(s=0;s<=2;s++)
{
t=s*1+nowpage*1;
$("#ssaa"+t).show()
}
}
pp(1)
</script>
```

已知的關鍵是
1. .im 會自隱藏，\#ssaa會自顯示
2. nowpage是初始狀態，num是總圖數
3. pp\(1\)跟pp\(2\)分別是方向鍵
4. if\(x==2&&\(nowpage+1\)\*3&lt;=num\*1+3\)算式有誤，要調整。

### 修改main.php
多利用chrome慢慢調整style，開始設計版型位於
```
<ul class="controls">
</ul>
```

設計為\(條件有顯示與排序大小\)

```php
<ul class="controls" style="height:100px">
  <img src="img/left.jpg" style="padding:40px 0" onclick="pp(1)">
  <?php
  $re = select("q3t5_img", "dpy=1 order by odr");
  $num = count($re);
  $i = 0;
  foreach ($re as $ro) {
    echo '<img class="im" id="ssaa' . $i . '" onclick="ani(' . $i . ')" style="height:100%" src="upload/' . $ro['img'] . '" alt="' . $ro['text'] . '">';
    $i++;
  }
  ?>
  <img onclick="pp(2)" src="img/right.jpg" style="padding:40px 0">
</ul>
```

1. 這裡需要偷塞個文字標題到alt內，方便之後JQ時抓取為標題區。
2. 同時讓img的onclick=ani帶參數，做之後點選時的JS動作

此時加入JS，讓點選左右鍵可以正常反應

```javascript
<script>
var nowpage=0,num=<?=$num?>;
function pp(x){
  var s,t;
  if(x==1&&nowpage-1>=0){
    nowpage--;}
  if(x==2&&(nowpage+1)<=num-4){
    nowpage++;}
  $(".im").hide()
  for(s=0;s<=3;s++){
    t=s*1+nowpage*1;
    $("#ssaa"+t).show()
  }
}
pp(1)
</script>
```

num總數可透過前面PHP算過的$num來用，

## B. 海報展示區
繼續設計海報主題區域。試著任意一張圖片需包含標題區，作為版型的調整試作。多利用chrome慢慢調整style，開始設計版型位於

### 修改main.php
```php
<ul class="lists">
</ul>
```

更改為

```php
<ul class="lists" style="height:300px;position: absolute;left: 80px;">
  <img id=simg src="img/03A07.jpg" style="height:90%;width:auto">
  <div id=stxt class=ct>1234</div>
</ul>
```

## C. 點選播放

點選過後的處理動作為

1. 取得新替換的文字與圖片
2. 根據特效設定決定不同的效果轉場，先轉出，替換，再轉入
3. 取得目前替換的ID為何，之後讓自動播放可以知道下一張該換誰

### 修改main.php
```javascript
          function ani(id) {
            img = $("#ssaa" + id).attr("src");
            txt = $("#ssaa" + id).attr("alt");
            //t5
            <?php
            $re = select("q3t5_effect", 1);
            $eft = $re[0]['once'];
            ?>
            switch (<?= $eft ?>) {
              case 1:
                $(".lists").fadeToggle(function() {
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").fadeToggle();
                });
                break;
              case 2:
                $(".lists").slideToggle(function() {
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").slideToggle();
                });
                break;
              case 3:
                $(".lists").animate({
                  left: "-400px"
                }, function() {
                  $(".lists").css("left", "400px");
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").animate({
                    left: "80px"
                  });
                });
                break;
            }
            run = id;
          }
```

## D. 自動播放

當點選效果都能正常動畫時，設計一個自動會去執行ani\(參數\)，最後一張的ID最大是多少記得回到第一張輪播

### 修改main.php
```javascript
function auto() { //run=0~5,num=6
  run = (run == (num - 1)) ? 0 : run + 1;
  ani(run);
}
setInterval(auto, 5000);
ani(0);
```

ani\(0\)是讓畫面載入時先跑第一張


---

以下為`main.php`完整代碼
```php
<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <ul class="lists" style="height:300px;position: absolute;left: 80px;">
        <img id=simg src="img/03A07.jpg" style="height:90%;width:auto">
        <div id=stxt class=ct>1234</div>
      </ul>
      <ul class="controls" style="height:100px">
        <img src="img/left.jpg" style="padding:40px 0" onclick="pp(1)">
        <?php
        $re = select("q3t5_img", "dpy=1 order by odr");
        $num = count($re);
        $i = 0;
        foreach ($re as $ro) {
          echo '<img class="im" id="ssaa' . $i . '" onclick="ani(' . $i . ')" style="height:100%" src="upload/' . $ro['img'] . '" alt="' . $ro['text'] . '">';
          $i++;
        }
        ?>
        <img onclick="pp(2)" src="img/right.jpg" style="padding:40px 0">
        <script>
          var nowpage = 0,
            num = <?= $num ?>;

          function pp(x) {
            var s, t;
            if (x == 1 && nowpage - 1 >= 0) {
              nowpage--;
            }
            if (x == 2 && (nowpage + 1) <= num - 4) {
              nowpage++;
            }
            $(".im").hide()
            for (s = 0; s <= 3; s++) {
              t = s * 1 + nowpage * 1;
              $("#ssaa" + t).show()
            }
          }
          pp(1)

          function ani(id) {
            img = $("#ssaa" + id).attr("src");
            txt = $("#ssaa" + id).attr("alt");
            //t5
            <?php
            $re = select("q3t5_effect", 1);
            $eft = $re[0]['once'];
            ?>
            switch (<?= $eft ?>) {
              case 1:
                $(".lists").fadeToggle(function() {
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").fadeToggle();
                });
                break;
              case 2:
                $(".lists").slideToggle(function() {
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").slideToggle();
                });
                break;
              case 3:
                $(".lists").animate({
                  left: "-400px"
                }, function() {
                  $(".lists").css("left", "400px");
                  $("#simg").attr("src", img);
                  $("#stxt").text(txt);
                  $(".lists").animate({
                    left: "80px"
                  });
                });
                break;
            }
            run = id;
          }

          function auto() { //run=0~5,num=6
            run = (run == (num - 1)) ? 0 : run + 1;
            ani(run);
          }
          setInterval(auto, 5000);
          ani(0);
        </script>
      </ul>
    </div>
  </div>
</div>
```