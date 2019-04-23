# 調整版面到1024\*768

這題動作如果來不及做可以放棄，元素材差異性下有可能不會被考官所注意到。

---

# 修改login.php、index.php、news.php、admin.php

找到主區域的div修改為

```php
<div id="all" style="overflow: scroll;margin: 10px auto;padding: 0;border: 0;width: 1024px;height: 768px;">
```

把多餘個寬度處理掉，找到上面的標題圖片將寬度鎖定到100%

```
<img style="width:100%" src="img/02B01.jpg" alt="健康促進網 - 回首頁" title="健康促進網 - 回首頁">
```

透過Chrome遊覽器檢查可以得到1024\*768且上下左右10px並垂直至中的動作要求。

