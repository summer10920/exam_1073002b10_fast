<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <div style="display:flex;justify-content:center;height:300px">
        <ul class="lists" style="transform:scale(1); transition:transform 0.5s;">
          <img id=simg src="img/03A07.jpg" style="height:90%;width:auto">
          <div id=stxt class=ct>1234</div>
        </ul>
      </div>
      <ul class="controls" style="height:100px">

        <img src="img/left.jpg" style="padding:40px 0" onclick="pp(1)">
        <?php
        $re = select("q3t5_img", "dpy=1 order by odr");
        $num = count($re);
        foreach ($re as $key => $ro)
          echo '<img class="im" id="ssaa' . $key . '" onclick="ani(' . $key . ')" style="height:100%" src="img/' . $ro['img'] . '" alt="' . $ro['text'] . '">';
        ?>
        <img src="img/right.jpg" style="padding:40px 0" onclick="pp(2)">

      </ul>
      <script>
        //for control start
        var nowpage = 0,
          num = <?= $num ?>;

        function pp(x) {
          var s, t;
          if (x == 1 && nowpage - 1 >= 0) nowpage--;
          if (x == 2 && (nowpage + 1) <= num - 4) nowpage++;
          $(".im").hide();
          for (s = 0; s <= 3; s++) {
            t = s * 1 + nowpage * 1;
            $("#ssaa" + t).show()
          }
        }
        pp(); //先跑一遍hide與show，x值沒有意義

        //onclick to change list content
        function ani(id) {
          img = $("#ssaa" + id).attr("src");
          txt = $("#ssaa" + id).attr("alt");
          <?php //t5
          $re = select("q3t5_effect", 1);
          $eft = $re[0]['once'];
          // $eft = 1;
          ?>
          switch (<?= $eft ?>) {
            case 1:
              $(".lists").fadeToggle(() => {
                $("#simg").attr("src", img);
                $("#stxt").text(txt);
                $(".lists").fadeToggle();
              });
              break;
            case 2:
              // animate 不支援使用 transform: "scale(0)"，改為增添 style 並持有轉場動畫並配合時間回歸
              $(".lists").css('transform', 'scale(0)');
              setTimeout(() => {
                $("#simg").attr("src", img);
                $("#stxt").text(txt);
                $(".lists").css('transform', 'scale(1)');
              }, 500);
              break;
            case 3:
              $(".lists").animate({
                left: "-400px"
              }, () => {
                $(".lists").css("left", "400px");
                $("#simg").attr("src", img);
                $("#stxt").text(txt);
                $(".lists").animate({
                  left: "0"
                });
              });
              break;
          }
          run = id;
        }

        // auto run change list
        function auto() { //run=0~5,num=6
          run = (run == (num - 1)) ? 0 : run + 1;
          ani(run);
        }
        setInterval(auto, 3000);
        ani(0);
      </script>
    </div>
  </div>
</div>

<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:100%;">
    <table width="100%" style="font-size:0.8rem">
      <tr>
        <?php
        $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
        $ba = ($nw - 1) * 4;
        $re = select("q3t7_movie", "'" . $minday . "'<=date and date<='" . $today . "' order by odr limit " . $ba . ",4");
        foreach ($re as $ro) {
        ?>
          <td width=210 style="float:left;padding:20px 0">
            <img src="img/<?= $ro['img'] ?>" style="float:left;width:50px;padding:10px">
            <?= $ro['title'] ?><br>
            分級：<img src="img/<?= $ro['cls'] ?>.png" style="height:1em"><br>
            上映日期：<?= $ro['date'] ?><br>
            <div style="clear:both;text-align:center">
              <input type="button" value="劇情簡介" onclick="<?= jlo("?do=info&id=" . $ro['id']) ?>">
              <input type="button" value="線上訂票" onclick="<?= jlo("order.php?do=step1&id=" . $ro['id']) ?>">
            </div>
          </td>
        <?php
        }
        ?>
      </tr>
    </table>
    <div class="ct">
      <?php
      $pg = navpage("q3t7_movie", "'" . $minday . "'<=date and date<='" . $today . "' order by odr", 4, $nw);
      foreach ($pg as $key => $value) echo '<a href="?page=' . $value . '">' . $key . '</a>';
      ?>
    </div>
  </div>
</div>