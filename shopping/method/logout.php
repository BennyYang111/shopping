<?php
  require_once "../method/connect.php";

  session_start();
  $flag = $_SESSION['form_quantity'];
  $ID = $_SESSION['ID'] + $flag - 1;
  while($flag != 0) {
    $flag = $flag - 1;
    if($_SESSION['form_quantity'] != 0) {
      $searsql = "SELECT * FROM purchase_record WHERE ID='$ID'";
      $searresult = $connect->query($searsql);
      $searrow = mysqli_fetch_array($searresult);
      $quantity = $searrow['quantity'];

      $item_name = $searrow['item_name'];

      //刪除購物紀錄
      $del_recordsql = "DELETE FROM purchase_record WHERE ID='$ID'";
      $del_recordresult = $connect->query($del_recordsql);
      if($del_recordresult) {
        //echo '<font size="10">成功刪除購物紀錄!</font><br>';
      } else {
        //echo '<font size="10">刪除購物紀錄失敗!</font><br>';
      }
      
      $delSql = "UPDATE stock SET quantity=quantity+'$quantity' WHERE item_name='$item_name'";
      if($del_recordresult) {
        $delresult = $connect->query($delSql);
      }
      if($del_recordresult && $delresult) {
        //echo '<font size="10">已更新庫存數量!</font><br>';
      } else {
        //echo '<font size="10">更新庫存失敗!</font><br>';
      }
      $ID = $ID - 1;
    }
  }
  unset($_SESSION['buyer_ID']);
  unset($_SESSION['item']);
  $_SESSION['form_quantity'] = 0;
  header("location:../index.php");
  
?>