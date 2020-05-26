<?php
  //確認有按下'註冊'按鈕
  if(isset($_POST['MyHead'])) {
    require_once "../method/connect.php";
    
    $ID = $_POST["account"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $bcode = $_POST["bcode"];
    $baccount = $_POST["baccount"];
    $password = $_POST["password"];

    //新增賣家
    $sql = "INSERT INTO seller(seller_ID, seller_name, seller_address, bank_code, bank_account, password)
      VALUES ('$ID', '$name', '$address', '$bcode', '$baccount', '$password')";
    $result = $connect->query($sql);
    
    if ($result) {
      echo '賣家新增成功!';
    } else {
      echo "錯誤: " . $sql . "<br>" . $connect->error;
    }
    header("Refresh:1; url=../index.php");

  }
  
?>
