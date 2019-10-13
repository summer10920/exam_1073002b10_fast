# 網頁設計乙級術科題庫分析
(108年度技術士技能檢定-考試速寫版 ver2)

---
## 素材整理
!>考前90分鐘很重要呢，先整理檔案(四題都整理，2分鐘內完成他)。

## 考場要求的伺服器規劃

1. 建立D:下資料夾`\Web01\`、`\Web02\`、`\Web03\`、`\Web04\`
2. 如果你抽到某題目，留下抽到的題目資料夾並改成webXX\(XX為座位\)，其餘可以擱置丟棄。
3. 記得指定 XAMPP之站台路徑(root)為此目錄。
---
## web01素材版型整理

1. 建立資料夾 `D:\web01\img` 並將所有圖檔放入，包含`image/swf/gif`，方便使用。
2. 複製所有版型檔案至站台位置，包含**4組資料夾**與**4個HTM檔**。
   - Administrator Login\_files
   - home\_files
   - Management page\_files
   - news\_files\
   - 01P01.htm~01P04.htm
3. 將**01P01.htm~01P04.htm** 依序題目說明修改檔名
   **login.php**、**index.php**、**admin.php**、**news.php**
4. 四組資料夾內都是同內容檔案\(JS、JQ、CSS、ICON\)，差於只有1個資料夾有ICON(提供CSS使用，將影響MENU視覺)。修正從 **Management page\_files **資料夾對 **ICON **資料夾**複製**到另外三組資料夾內。便不用考量該CSS是否真正會用到。
5. 會放入資料庫的檔案，複製一份到upload資料夾，代表此檔案上傳
6. 下圖為初始與完成時所有檔案對照

![](https://i.imgur.com/q62vbsM.png)
![](https://i.imgur.com/UEiJdoh.png)

---
## web02素材版型整理
1. 複製所有版型資料夾至站台位置，更名為Web02資料夾。修改02P01.htm為index.php
2. 將素材之圖片類型複製到root/img內。將圖片之文字檔複製到root/data內。記得找圖去img找字去data
3. 這題沒有上傳檔案需求，所以建立upload資料夾可以省略
4. 圖為初始與完成時所有檔案對照

  ![](https://i.imgur.com/IW9bHMk.png)
  ![](https://i.imgur.com/Ky2kjyE.png)

---
## web03素材版型整理
1. 複製所有版型資料夾至站台位置，更名為Web03資料夾。
2. 修改檔名
   - 03P01.htm->index.php
   - 03P02.htm->order.php
   - 03P01.htm->admin.php
3. 將素材之圖片與影片都移動到root/img內，將文字檔複製到root/data內。
4. 影片先利用Adobe Media Encoder進行轉檔成mp4，解析度的檔案越小越好低於5MB可以省去PHP的暫存限制。
5. 手動有指定的資料都會改到upload資料夾去。
6. 圖為初始與完成時所有檔案對照

  ![](https://i.imgur.com/Ehzr7rI.png)
  ![](https://i.imgur.com/uclBCeS.png)

---
## web04素材版型整理

1. 複製所有版型資料夾至站台位置，更名為Web04資料夾
2. 修改檔名
   - 04P01.htm->index.php
   - 04P02.htm->admin.php
3. 將素材之圖片類型複製到root/img內，文字檔複製到root/data內
4. 記得找圖去img，找字去data
5. 上傳的資料都會到upload資料夾去，所以資料庫會用到的img記得都複製或移動到此處
6. 圖為初始與完成時所有檔案對照

![](https://i.imgur.com/5O9VdD4.png)
![](https://i.imgur.com/fYlQPel.png)