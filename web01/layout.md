# 調整版面到1024\*768

這題動作如果來不及做可以放棄，元素材差異性下有可能不會被考官所注意到。

---

# 修改login.php、index.php、news.php、admin.php

找到主區域的div修改為

```php
<div id="main" style="overflow: scroll;margin: 10px auto;padding: 0;border: 0;">
```

把多餘個寬度處理掉，找到footer把width拿掉改為

```
<div style="left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
```

透過Chrome遊覽器檢查可以得到1024\*768且上下左右10px並垂直至中的動作要求。

