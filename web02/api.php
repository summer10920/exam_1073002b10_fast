<?php
include "lib.php";
switch ($_GET['do']) {
  case 'login':
    if ($_POST['acc'] == 'admin' && $_POST['pwd'] == '1234') $_SESSION['admin'] = 'admin';

    $re = select("q2t6_user", "acc='" . $_POST['acc'] . "'");
    if ($re == null) echo "<script>alert('查無帳號');" . jlo("index.php?do=login") . "</script>";
    $re = select("q2t6_user", "acc='" . $_POST['acc'] . "' and pwd='" . $_POST['pwd'] . "'");
    if ($re == null) echo "<script>alert('密碼錯誤');" . jlo("index.php?do=login") . "</script>";
    else {
      $_SESSION['user'] = $_POST['acc'];
      plo("index.php");
    }
    break;
  case 'logout':
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    plo("index.php");
    break;
  case 'reg':
    $msg = "";
    if ($_POST['acc'] == null || $_POST['pwd'] == null || $_POST['pwd1'] == null || $_POST['mail'] == null)
      $msg .= "alert('不可空白');";
    if ($_POST['pwd'] != $_POST['pwd1'])
      $msg .= "alert('密碼錯誤');";
    $re = select("q2t6_user", "acc='" . $_POST['acc'] . "'");
    if ($re != null)
      $msg .= "alert('帳號重複');";

    if ($msg) echo "<script>" . $msg . "window.history.back()</script>";
    else {
      unset($_POST['pwd1']);
      insert($_POST, "q2t6_user");
      echo "<script>alert('註冊完成，歡迎加入');" . jlo("index.php") . "</script>";
    }
    break;
  case 'gdadd':
    $post['user'] = $_SESSION['user'];
    $post['blog'] = $_GET['id'];
    insert($post, "q2t11_good");

    $num['num+1'] = $_GET['id'];
    update($num, "q2t7_blog");
    echo "<script>window.history.back()</script>";
    break;
  case 'gdsub':
    $post['delwh'] = "user='" . $_SESSION['user'] . "' and blog=" . $_GET['id'];
    delete($post, "q2t11_good");

    $num['num-1'] = $_GET['id'];
    update($num, "q2t7_blog");
    echo "<script>window.history.back()</script>";
    break;
  case 'vote':
    update($_POST, "q2t13_vote");
    plo("index.php?do=que");
    break;
  case 'memdel':
    delete($_POST, "q2t6_user");
    plo("index.php?do=apo");
    break;
  case 'newsmdy':
    update($_POST, "q2t7_blog");
    delete($_POST, "q2t7_blog");
    plo("index.php?do=apop");
    break;
  case 'queadd':
    $post['text'] = $_POST['fa'];
    $faid = insert($post, "q2t13_vote");
    foreach ($_POST['son'] as $ro) {
      $son['text'] = $ro;
      $son['parent'] = $faid;
      insert($son, "q2t13_vote");
    }
    plo("index.php");
    break;
}
