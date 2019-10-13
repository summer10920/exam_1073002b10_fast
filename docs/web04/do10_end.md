# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 這題動作如果來不及做可以放棄，元素材差異性下有可能不會被考官所注意到。

### 修改index.php、admin.php

找到主區域的div修改為

```php
<div id="main" style="width: 1024px;height: 768px;overflow: scroll;padding: 0;margin: 10px auto;border: 0;">
```

後台的頁首圖片有跑掉，跟著修改兩張圖片為69%跟30%
### 修改admin.php

```php
<a href="?">
  <img src="./Manage Page_files/0416.jpg" style="width:69%">
</a>
<img src="./Manage Page_files/0417.jpg" style="width:30%">
```

透過Chrome遊覽器檢查可以得到1024\*768且上下左右10px並垂直至中的動作要求。