<?php
  require_once "../method/connect.php";
    
  $ID = $_POST["account"];
  $password = $_POST["password"];

  //找到buyer裡面符合buyer_ID='$ID'條件的項
  $sql = "SELECT * FROM buyer WHERE buyer_ID='$ID'";
  $result = $connect->query($sql);
    
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row['password'] == $password) {
      session_start();
      $_SESSION['buyer_ID'] = $ID;
      $_SESSION['form_quantity'] = 0;
      echo '<font size="10">' . $ID . '登入成功!</font>';
      echo '<br><font size="10">等待畫面跳轉...</font>';
      header("Refresh:1; url=../index.php");
    } else {
      echo '<font size="10">帳號或密碼錯誤!</font>';
      echo '<br><font size="10">等待畫面跳轉...</font>';
      header("Refresh:1; url=index.php");
    }
  } else {
    echo '<font size="10">無此帳號!</font>';
    echo '<br><font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index.php");
  }
  
?>
