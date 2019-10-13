# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 利用date\(\)做該年分。至於定位要求因為說明+示意圖反而太詭異，會導致css有點小複雜，如果沒空可以不用管css。基本上以文字描敘為主

---
## A. 設計頁尾版權
如果你要修正CSS，靠兩個DIV處理第一行至中，第二行為float:right

### 修改index.php
找到

```php
<div id="bottom">
本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2014健康促進網社群平台 All Right Reserved 
<br>服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45">
</div>
```

主要是&lt;?date\("Y"\)?&gt;這部分，改成

```php
<div id="bottom">
    <div class="ct">本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © <?=date("Y")?>健康促進網社群平台 All Right Reserved     </div>
    <div style="float:right">服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45"></div>
</div>
```



