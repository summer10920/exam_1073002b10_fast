# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 就只是&lt;marquee&gt;，依題目手動輸入字串在正確位置，在會員登入的左邊

## A. 加入跑馬燈

### 修改index.php
找到
```php
<span style="width:18%; display:inline-block;">
<a href="?do=login">會員登入</a></span>
```
加入HTML
```php
<span style="width:80%; display:inline-block;">
    <marquee behavior="" direction="">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>
</span>
<span style="width:18%; display:inline-block;"><a href="?do=login">會員登入</a></span>
```



