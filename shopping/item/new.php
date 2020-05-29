<?php
  require_once "../method/connect.php";

  $IDsql = "SELECT * FROM stock WHERE item_ID=(SELECT MAX(item_ID) FROM stock)";
  $IDresult = $connect->query($IDsql);
  $IDrow = $IDresult->fetch_assoc();
  $ID = $IDrow['item_ID'] + 1;
  
  $seller_name = $_POST['name'];
  
  $sellsql = "SELECT * FROM seller WHERE seller_name='$seller_name'";
  $sellresult = $connect->query($sellsql);
  $sellrow = $sellresult->fetch_assoc();
  $seller_ID = $sellrow['seller_ID'];

  $item_name = $_POST['item'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];

  //新增商品
  $sql = "INSERT INTO stock(item_ID, seller_ID, seller_name, item_name, quantity, price)
    VALUES ('$ID', '$seller_ID', '$seller_name', '$item_name', '$quantity', '$price')";
  $result = $connect->query($sql);
    
  if ($result) {
    echo '物品新增成功!';
  } else {
    echo "錯誤: " . $sql . "<br>" . $connect->error;
  }
  header("Refresh:1; url=new_index.php");
  
?>
