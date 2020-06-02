<?php
  require_once "../method/connect.php";

  $ID = $_POST["account"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $pwcheck = $_POST["pwcheck"];

  $searsql = "SELECT * FROM buyer WHERE buyer_ID='$ID'";
  $searresult = $connect->query($searsql);
  $searrow = $searresult->fetch_assoc();

  //註冊
  $sql = "INSERT INTO buyer(buyer_ID, buyer_name, buyer_address, password)
    VALUES ('$ID', '$name', '$address', '$password')";

  if($ID == '' || $name == '' || $address == '' || $password == '' || $pwcheck == '') {
    echo '<font size="10">填入欄位不可為空!</font><br>';
  } elseif(stristr($ID, $searrow['buyer_ID'])) {
    echo '<font size="10">此帳號已有人使用!</font><br>';
  } elseif($pwcheck != $password) {
    echo '<font size="10">密碼確認失敗!</font><br>';
  } elseif(strlen($password) < 8) {
    echo '<font size="10">密碼長度至少需要8位!</font><br>';
  }
  
  if(!(preg_match("/[0-9]{1,}/",$password))) {
    echo '<font size="10">密碼需包含數字!</font><br>';
  }
  if(!(preg_match("/[a-z]{1,}/",$password)) || !(preg_match("/[A-Z]{1,}/",$password))) {
    echo '<font size="10">密碼需包含英文字母!</font><br>';
  } else {
    $result = $connect->query($sql);
  }
  
  if($ID != '' && $name != '' && $address != '' && $password != '' && $pwcheck != '' && $pwcheck == $password && $ID != $searrow['buyer_ID'] && $result) {
    echo '<font size="10">恭喜' . $ID . '註冊成功!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../login/index.php");
  } else {
    echo '<font size="10">註冊失敗!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:2; url=index.php");
  }
?>
