# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 這題動作如果來不及做可以放棄，元素材差異性下有可能不會被考官所注意到。

### 修改index.php、admin.php、order.php

找到主區域的div

```html
<div id="main">
```

修改為

```php
<div id="main" style="overflow: scroll;width: 1024px;height: 768px;margin: 10px auto;border: 0;">
```

院線片清單版型有被擠壓到，對main.php的這部分調整一下到100%

```html
<div class="rb tab" style="width:100%;">
```

透過Chrome遊覽器檢查可以得到1024\*768且上下左右10px並垂直至中的動作要求。

