<?php
  //登出
  session_start();
  unset($_SESSION['buyer_ID']);
  $_SESSION['form_quantity'] = 0;
  header("location:../system.php");
?>