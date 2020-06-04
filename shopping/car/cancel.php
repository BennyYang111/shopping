<?php
  require_once "../method/connect.php";
  
  if(isset($_SESSION['buyer_ID'])) {
    echo '<font size="10">還未登入喔!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../login/index.php");
  } elseif($_POST['ID'] == '') {
    echo '<font size="10">選擇訂單編號不可為空白!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index_cancel.php");
  } else {
    session_start();
    $ID = $_POST['ID'];
    $buyer_ID = $_SESSION['buyer_ID'];
    $searsql = "SELECT * FROM purchase_record WHERE buyer_ID='$buyer_ID'";
    $searresult = $connect->query($searsql);
    $array = array();

    if($searresult->num_rows > 0) {
      while($searrow = mysqli_fetch_array($searresult)){
        array_push($array, $searrow['ID']);
      }
    }

    if(!in_array($ID, $array)) {
      echo '<font size="10">您無此ID可取消!</font><br>';
      echo '<font size="10">等待畫面跳轉...</font>';
      header("Refresh:2; url=index_cancel.php");
    } else {
      $sql = "SELECT * FROM purchase_record WHERE ID='$ID'";
      $result = $connect->query($sql);
      if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      } else {
        echo '<font size="10">無此ID!</font><br>';
        $result = false;
      }

      //刪除購物紀錄
      $del_recordsql = "DELETE FROM purchase_record WHERE ID='$ID'";
      if($result) {
        $del_recordresult = $connect->query($del_recordsql);
      }
      /*if($del_recordresult) {
        echo '<font size="10">成功刪除購物紀錄!</font><br>';
      } else {
        echo '<font size="10">刪除購物紀錄失敗!</font><br>';
      }*/

      $quantity = $row['quantity'];
      $item_ID = $row['item_ID'];

      //更新庫存
      $del_stocksql = "UPDATE stock SET quantity=quantity+'$quantity' WHERE item_ID='$item_ID'";
      if($result) {
        $del_stockresult = $connect->query($del_stocksql);
      }
      /*if($del_stockresult) {
        echo '<font size="10">已更新庫存數量!</font><br>';
      } else {
        echo '<font size="10">更新庫存失敗!</font><br>';
      }*/
      $_SESSION['form_quantity'] = $_SESSION['form_quantity'] - 1;
      echo '<font size="10">等待畫面跳轉...</font>';
      header("Refresh:2; url=index_cancel.php");
    }
  }
  

?>