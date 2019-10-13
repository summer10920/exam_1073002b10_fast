# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 分為做跑馬燈以及最新消息文章顯示。後者的說明較不齊全完整，要求沒有指定從資料庫處理，所以直接都由HTML處理掉。

## A. 跑馬燈效果
這裡比較簡單，就是撈取然後顯示為marquee，找到該靜態文字

### 修改index.php
```html
    </div>
    情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~       
</div>
```

取代為

```html
        </div>
<marquee behavior="" direction="">年終特賣會開跑了 &nbsp; 情人節特惠活動</marquee>
</div>
```

## B. 文章顯示
示意圖多一步驟是可以點選查看內文。這是題目動作沒有的。

### 新增news.php
```html
<h3 class="ct">最新消息</h3>

<table bgcolor=#fff width=100%>
  <tr bgcolor=#ff5>
    <td>標題</td>
  </tr>
  <tr bgcolor=#ffc>
    <td>年終特賣會開跑了</td>
  </tr>
  <tr bgcolor=#ffc>
    <td>情人節特惠活動</td>
  </tr>
</table>
```

題目沒有設計後台的最新消息管理功能，所以記得後台的選單路徑要改為\#作為無反應。