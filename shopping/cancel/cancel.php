<?php
  require_once "../method/connect.php";
  
  if(isset($_SESSION['buyer_ID'])) {
    echo '<font size="10">還未登入喔!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../index.php");
  } elseif($_POST['ID'] == '') {
    echo '<font size="10">選擇訂單編號不可為空白!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index.php");
  } else {
    $form_ID = $_POST['ID'];
    
    $sql = "SELECT * FROM form WHERE form_ID='$form_ID'";
    $result = $connect->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      echo '<font size="10">無此訂單編號!</font><br>';
      $result = false;
    }

    //刪除訂單
    $del_formsql = "DELETE FROM form WHERE form_ID='$form_ID'";
    $del_formresult = $connect->query($del_formsql);
    if($result && $del_formresult) {
      echo '<font size="10">成功取消訂單!</font><br>';
    } else {
      echo '<font size="10">取消訂單失敗!</font><br>';
    }

    $ID = $row['form_ID'] - 1000000;
    $quantity = $row['quantity'];
    $item_ID = $row['item_ID'];

    //更新庫存
    $del_stocksql = "UPDATE stock SET quantity=quantity+'$quantity' WHERE item_ID='$item_ID'";
    if($result && $del_formresult) {
      $del_stockresult = $connect->query($del_stocksql);
    }
    /*if($del_stockresult) {
      echo '<font size="10">已更新庫存數量!</font><br>';
    } else {
      echo '<font size="10">更新庫存失敗!</font><br>';
    }*/

    //刪除購物紀錄
    $del_recordsql = "DELETE FROM purchase_record WHERE ID='$ID'";
    if($result && $del_formresult && $del_stockresult) {
      $del_recordresult = $connect->query($del_recordsql);
    }
    /*if($del_recordresult) {
      echo '<font size="10">成功刪除購物紀錄!</font><br>';
    } else {
      echo '<font size="10">刪除購物紀錄失敗!</font><br>';
    }*/
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:2; url=index.php");
  }
  

?>