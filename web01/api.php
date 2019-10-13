<?php
require_once("sql.php");
switch ($_GET['do']) {
  case 'check':
    $re = select("q1t10_admin", "acc='" . $_POST['acc'] . "' and pwd='" . $_POST['pwd'] . "'");
    if ($re) {
      $_SESSION['admin'] = $_POST['acc'];
      plo("admin.php");
    } else {
      echo "<script>alert('帳號或密碼錯誤');" . jlo("login.php") . "</script>";
    }
    break;
  case 'logout':
    unset($_SESSION['admin']);
    plo("admin.php");
    break;
  case 'titleadd':
    $_POST['img'] = addfile($_FILES['img']);
    insert($_POST, "q1t3_title");
    plo("admin.php");
    break;
  case 'titlemdy':
    $_POST['dpy'][$_POST['radio']] = 1;
    update($_POST, "q1t3_title");
    delete($_POST, "q1t3_title");
    plo("admin.php");
    break;
  case 'titlechg':
    $_POST['img'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "q1t3_title");
    plo("admin.php");
    break;
  case 'maqeadd':
    insert($_POST, "q1t4_maqe");
    plo("admin.php?do=aad");
    break;
  case 'maqemdy':
    update($_POST, "q1t4_maqe");
    delete($_POST, "q1t4_maqe");
    plo("admin.php?do=aad");
    break;
  case 'mvimadd':
    $_POST['text'] = addfile($_FILES['img']);
    insert($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimmdy':
    update($_POST, "q1t5_mvim");
    delete($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimchg':
    $_POST['text'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimadd':
    $_POST['text'] = addfile($_FILES['img']);
    insert($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimmdy':
    update($_POST, "q1t5_mvim");
    delete($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimchg':
    $_POST['text'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'imageadd':
    $_POST['text'] = addfile($_FILES['img']);
    insert($_POST, "q1t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'imagechg':
    $_POST['text'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "q1t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'imagemdy':
    update($_POST, "q1t6_img");
    delete($_POST, "q1t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'totalmdy':
    update($_POST, "q1t7_total");
    plo("admin.php?do=atotal");
    break;
  case 'bottommdy':
    update($_POST, "q1t8_footer");
    plo("admin.php?do=abottom");
    break;
  case 'newsadd':
    insert($_POST, "q1t9_news");
    plo("admin.php?do=anews");
    break;
  case 'newsmdy':
    update($_POST, "q1t9_news");
    delete($_POST, "q1t9_news");
    plo("admin.php?do=anews");
    break;
  case 'adminadd':
    unset($_POST['check']);
    insert($_POST, "q1t10_admin");
    plo("admin.php?do=aadmin");
    break;
  case 'adminmdy':
    update($_POST, "q1t10_admin");
    delete($_POST, "q1t10_admin");
    plo("admin.php?do=aadmin");
    break;
  case 'menuadd':
    insert($_POST, "q1t12_menu");
    plo("admin.php?do=amenu");
    break;
  case 'menumdy':
    update($_POST, "q1t12_menu");
    delete($_POST, "q1t12_menu");
    plo("admin.php?do=amenu");
    break;
  case 'menuchg':
    foreach ($_POST['new']['text'] as $key => $val) {
      $post['text'] = $val;
      $post['link'] = $_POST['new']['link'][$key];
      $post['parent'] = $_GET['id'];
      insert($post, "q1t12_menu");
    }
    unset($_POST['new']);
    update($_POST, "q1t12_menu");
    delete($_POST, "q1t12_menu");
    plo("admin.php?do=amenu");
    break;
}
