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
  $result = $connect->query($sql);
    
  if($result) {
    echo '恭喜' . $ID . '註冊成功!';
  } else {
    echo "錯誤: " . $sql . "<br>" . $connect->error;
  }
  header("Refresh:1; url=../index.php");

?>
