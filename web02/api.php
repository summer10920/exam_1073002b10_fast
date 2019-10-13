<?php
include "sql.php";
switch ($_GET['do']) {
  case 'login':
    if ($_POST['acc'] == 'admin' && $_POST['pwd'] == '1234') $_SESSION['admin'] = 'admin';

    $re = select("q2t6_user", "acc='" . $_POST['acc'] . "'");
    if ($re == null) echo "<script>alert('查無帳號');" . jlo("index.php?do=login") . "</script>";

    $re = select("q2t6_user", "acc='" . $_POST['acc'] . "' and pwd='" . $_POST['pwd'] . "'");
    if ($re == null) echo "<script>alert('查無密碼');" . jlo("index.php?do=login") . "</script>";
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
    if ($_POST['acc'] == null || $_POST['pwd'] == null || $_POST['pwd1'] == null || $_POST['mail'] == null)
      echo "<script>alert('不可空白');window.history.back()</script>";
    else{
      $re = select("q2t6_user", "acc='" . $_POST['acc'] . "'");
      if ($re != null) echo "<script>alert('帳號重複');window.history.back()</script>";
      else {
        unset($_POST['pwd1']);
        insert($_POST, "q2t6_user");
        echo "<script>alert('註冊完成，歡迎加入');" . jlo("index.php") . "</script>";
      }
    }
    break;
  case 'addgd':
    $post['user'] = $_SESSION['user'];
    $post['blog'] = $_GET['id'];
    insert($post, "q2t11_good");
    $num['num+1'] = $_GET['id'];
    update($num, "q2t7_blog");
    echo "<script>window.history.back()</script>";
    break;
  case 'subgd':
    $post['delat'] = "user='" . $_SESSION['user'] . "' and blog=" . $_GET['id'];
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
    plo("index.php?do=adpo");
    break;
  case 'newsmdy':
    update($_POST, "q2t7_blog");
    delete($_POST, "q2t7_blog");
    plo("index.php?do=adpop");
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
