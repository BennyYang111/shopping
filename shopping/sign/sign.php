<?php
  require_once "../method/connect.php";

  $ID = $_POST["account"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $pwcheck = $_POST["pwcheck"];

  //註冊
  $sql = "INSERT INTO buyer(buyer_ID, buyer_name, buyer_address, password)
    VALUES ('$ID', '$name', '$address', '$password')";
    
  if($pwcheck != $password) {
    echo '<font size="10">密碼確認失敗!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index.php");
  } elseif($ID != '' && $name != '' && $address != '' && $password != '' && $pwcheck != '') {
    echo '<font size="10">恭喜' . $ID . '註冊成功!</font><br>';
    $result = $connect->query($sql);
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../login/index.php");
  } else {
    echo '<font size="10">註冊失敗!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index.php");
  }

?>
