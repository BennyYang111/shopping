<?php
  require_once "../method/connect.php";
  
  if(isset($_SESSION['buyer_ID'])) {
    echo '請先登入喔~~<br>';
    echo '等待畫面跳轉~~';
    header("Refresh:1; url=../index.php");
  } elseif($_POST['ID'] == '') {
    echo '選擇訂單編號不可為空白!<br>';
    echo '等待畫面跳轉~~';
    header("Refresh:1; url=index.php");
  } else {
    $form_ID = $_POST['ID'];
    
    $sql = "SELECT * FROM form WHERE form_ID='$form_ID'";
    $result = $connect->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      echo '無此訂單編號!<br>';
      $result = false;
    }

    //刪除訂單
    $del_formsql = "DELETE FROM form WHERE form_ID='$form_ID'";
    $del_formresult = $connect->query($del_formsql);
    if($result && $del_formresult) {
      echo '成功取消訂單!<br>';
    } else {
      echo '取消訂單失敗!<br>';
    }

    $ID = $row['form_ID'] - 1000000;
    $quantity = $row['quantity'];
    $item_ID = $row['item_ID'];

    //更新庫存
    $del_stocksql = "UPDATE stock SET quantity=quantity+'$quantity' WHERE item_ID='$item_ID'";
    if($result && $del_formresult) {
      $del_stockresult = $connect->query($del_stocksql);
    }
    if($del_stockresult) {
      echo '已更新庫存數量!<br>';
    } else {
      echo '更新庫存失敗!<br>';
    }

    //刪除購物紀錄
    $del_recordsql = "DELETE FROM purchase_record WHERE ID='$ID'";
    if($result && $del_formresult && $del_stockresult) {
      $del_recordresult = $connect->query($del_recordsql);
    }
    if($del_recordresult) {
      echo '成功刪除購物紀錄!<br>';
    } else {
      echo '刪除購物紀錄失敗!<br>';
    }
    echo '等待畫面跳轉~~';
    header("Refresh:2; url=index.php");
  }
  

?>