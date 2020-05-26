<?php
include "lib.php";
switch ($_GET['do']) {
  case 'login':
    if ($_POST['acc'] == "admin" && $_POST['pwd'] == "1234") {
      $_SESSION['admin'] = true;
      plo("admin.php");
    } else echo "<script>alert('輸入錯誤');window.history.back()</script>";
    break;
  case 'rradd':
    $_POST['img'] = addfile($_FILES['img']);
    insert($_POST, "q3t5_img");
    plo("admin.php?do=rr");
    break;
  case 'rrmdy':
    $gg['once'][1] = $_POST['eft'];
    update($gg, "q3t5_effect");
    update($_POST, "q3t5_img");
    delete($_POST, "q3t5_img");
    plo("admin.php?do=rr");
    break;
  case 'vvmdy':
    update($_POST, "q3t7_movie");
    plo("admin.php?do=vv");
    break;
  case 'vvdel':
    $_POST['del'][] = $_GET['id'];
    delete($_POST, "q3t7_movie");
    plo("admin.php?do=vv");
    break;
  case 'vvadd':
    $_POST['img'] = addfile($_FILES['img']);
    $_POST['video'] = addfile($_FILES['video']);
    $_POST['date'] = $_POST['yy'] . "-" . $_POST['mm'] . "-" . $_POST['dd'];
    unset($_POST['yy'], $_POST['mm'], $_POST['dd']);
    insert($_POST, "q3t7_movie");
    plo("admin.php?do=vv");
    break;
  case 'vvchg':
    $_POST['img'][$_GET['id']] = addfile($_FILES['img']);
    $_POST['video'][$_GET['id']] = addfile($_FILES['video']);
    $_POST['date'][$_GET['id']] = $_POST['yy'] . "-" . $_POST['mm'] . "-" . $_POST['dd'];
    unset($_POST['yy'], $_POST['mm'], $_POST['dd']);
    update($_POST, "q3t7_movie");
    plo("admin.php?do=vv");
    break;
  case 'gd':
    $re = select("q3t7_movie", "title='" . $_POST['title'] . "'");
    $ro = $re[0];
    $num = (strtotime($ro['date']) - strtotime($minday)) / 3600 / 24; //該資料與最舊有效日相差幾天，可能值 0~2
    for ($i = 0; $i <= $num; $i++)
      echo '<option value="' . date("Y-m-d", strtotime("+" . $i . "days")) . '">' . date("Y-m-d", strtotime("+" . $i . "days")) . '</option>';
    break;
  case 'gt':
    $re = select("q3t8_book", "movie='" . $_POST['title'] . "' and date='" . $_POST['date'] . "'");
    $ary = array(0, 0, 0, 0, 0);
    foreach ($re as $ro) $ary[$ro['time']] += count(unserialize($ro['seat'])); //收集各時段已售出之量
    $now = (date("H") >= 14 && $today == $_POST['date']) ? floor(date("H") / 2 - 6) : 0; //如果今天且下午
    //只有當天的可選時段會變化，可能是從 0 開始跑或從現在時間（轉成時段）開始跑
    //if 現在是 pm3 -> 15/2-6=1（無條件捨去） -> se_time[1]=1600~1800
    for ($i = $now; $i < 5; $i++) echo '<option value="' . $i . '">' . $seat[$i] . ' 剩餘座位 ' . (20 - $ary[$i]) . '</option>';
    break;
  case 'order':
    $_POST['seat'] = serialize($_POST['ss']);
    $_POST['buydate'] = date("Y-m-d");
    unset($_POST['ss']);
    $id = insert($_POST, "q3t8_book");
    plo("order.php?do=step3&id=" . $id);
    break;
  case 'orderdel':
    $_POST['del'][] = $_GET['id'];
    delete($_POST, "q3t8_book");
    plo("admin.php?do=orderlist");
    break;
  case 'orderfast':
    switch ($_POST["sw"]) {
      case 1:
        $post['delwh'] = "date='" . $_POST['date'] . "'";
        break;
      case 2:
        $post['delwh'] = "movie='" . $_POST['movie'] . "'";
        break;
    }
    delete($post, "q3t8_book");
    plo("admin.php?do=orderlist");
    break;
}
