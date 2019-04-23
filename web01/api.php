<?php
include "sql.php";
switch ($_GET['do']) {
  case 'check':
    $re = select("t10_admin", "acc='" . $_POST['acc'] . "' and pwd='" . $_POST['pwd'] . "'");
    if ($re == null) echo "<script>alert('帳號或密碼輸入錯誤');" . jlo('login.php') . "</script>";
    else {
      $_SESSION['admin'] = 123;
      plo("admin.php");
    }
    break;
  case 'logout':
    unset($_SESSION['admin']);
    plo("admin.php");
    break;
  case 'titleadd':
    $_POST['img'] = addfile($_FILES['img']);
    insert($_POST, "t3_title");
    plo("admin.php");
    break;
  case 'titlemdy':
    $_POST['dpy'][$_POST['radio']] = 1;
    update($_POST, "t3_title");
    delete($_POST, "t3_title");
    plo("admin.php");
    break;
  case 'titlechg':
    $_POST['img'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "t3_title");
    plo("admin.php");
    break;
  case 'adadd':
    insert($_POST, "t4_maqe");
    plo("admin.php?do=aad");
    break;
  case 'admdy':
    update($_POST, "t4_maqe");
    delete($_POST, "t4_maqe");
    plo("admin.php?do=aad");
    break;
  case 'mvimadd':
    $_POST['file'] = addfile($_FILES['img']);
    insert($_POST, "t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimmdy':
    update($_POST, "t5_mvim");
    delete($_POST, "t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'mvimchg':
    $_POST['file'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "t5_mvim");
    plo("admin.php?do=amvim");
    break;
  case 'imgadd':
    $_POST['file'] = addfile($_FILES['img']);
    insert($_POST, "t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'imgmdy':
    update($_POST, "t6_img");
    delete($_POST, "t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'imgchg':
    $_POST['file'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "t6_img");
    plo("admin.php?do=aimage");
    break;
  case 'totalmdy':
    update($_POST, "t7_total");
    plo("admin.php?do=atotal");
    break;
  case 'footermdy':
    update($_POST, "t8_footer");
    plo("admin.php?do=abottom");
    break;
  case 'newsadd':
    insert($_POST, "t9_news");
    plo("admin.php?do=anews");
    break;
  case 'newsmdy':
    update($_POST, "t9_news");
    delete($_POST, "t9_news");
    plo("admin.php?do=anews");
    break;
  case 'adminadd':
    insert($_POST, "t10_admin");
    plo("admin.php?do=aadmin");
    break;
  case 'adminmdy':
    update($_POST, "t10_admin");
    delete($_POST, "t10_admin");
    plo("admin.php?do=aadmin");
    break;
  case 'menuadd':
    insert($_POST, "t12_menu");
    plo("admin.php?do=amenu");
    break;
  case 'menumdy':
    update($_POST, "t12_menu");
    delete($_POST, "t12_menu");
    plo("admin.php?do=amenu");
    break;
  case 'menuchg':
    foreach ($_POST['new']['title'] as $key => $ro) $new[$ro] = $_POST['new']['link'][$key];
    foreach ($new as $key => $val) {//for new data
      $post['title'] = $key;
      $post['link'] = $val;
      $post['parent'] = $_GET['id'];
      insert($post, "t12_menu");
    }
    unset($_POST['new']);
    update($_POST, "t12_menu");
    delete($_POST, "t12_menu");
    plo("admin.php?do=amenu");
    break;
}
