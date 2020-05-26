<?php
  session_start();
  if(!isset($_SESSION['buyer_ID'])) {
    echo '請先登入喔~~<br>';
    echo '等待畫面跳轉~~';
    header("Refresh:2; url=../login/index.php");
  } else {
    //連線
    require_once "../method/connect.php";
    
    //找出purchase_record裡面ID的對大值
    $psql = "SELECT * FROM purchase_record WHERE ID=(SELECT MAX(ID) FROM purchase_record)";
    $presult = $connect->query($psql);
    if ($presult->num_rows > 0) {
      $prow = $presult->fetch_assoc();
    }
    
    $ID = $prow['ID'] + 1;

    $buyer_ID = $_SESSION['buyer_ID'];
    //找到buyer裡面符合buyer_ID='$buyer_ID'條件的項
    $bsql = "SELECT * FROM buyer WHERE buyer_ID='$buyer_ID'";
    $bresult = $connect->query($bsql);
    if($bresult->num_rows > 0) {
      $brow = $bresult->fetch_assoc();
    } else {
      echo '無此買家!';
    }
    //找到seller裡面符合seller_name='Jack'條件的項
    $ssql = "SELECT * FROM seller WHERE seller_name='Jack'";
    $sresult = $connect->query($ssql);
    if($sresult->num_rows > 0){
      $srow = $sresult->fetch_assoc();
    } else {
      echo '無此賣家!';
    }

    $seller_ID = $srow['seller_ID'];
    $item_ID = '004';
    $buyer_name = $brow['buyer_name'];
    $seller_name = $srow['seller_name'];

    //找到stock裡面符合item_name='computer4'條件的項
    $itemsql = "SELECT * FROM stock WHERE item_name='computer4'";
    $itemresult = $connect->query($itemsql);
    if($itemresult->num_rows > 0){
      $itemrow = $itemresult->fetch_assoc();
    } else {
      echo '無此物品!';
    }
    
    $item_name = $itemrow['item_name'];
    $quantity = $_POST['quantity'];
    
    //算出總金額將值給price
    if($quantity != 0) {
      $price = $itemrow['price'] * $quantity;
    }

    //放入購物車
    $recordSql = "INSERT INTO purchase_record(ID, buyer_ID, seller_ID, item_ID, buyer_name, 
    seller_name, item_name, quantity, price) VALUES ('$ID', '$buyer_ID', '$seller_ID', '$item_ID', 
    '$buyer_name', '$seller_name', '$item_name', '$quantity', '$price')";
    if($quantity > 0) {
      $recordresult = $connect->query($recordSql);
      
      if($recordresult && $quantity > 0) {
        echo '已將商品放入購物車!<br>';
        //用session紀錄訂購數量
        $_SESSION['form_quantity'] = $_SESSION['form_quantity'] + 1;
      } else {
        echo '商品放入購物車失敗!<br>';
      }
    } else {
      echo '商品放入購物車失敗!<br>';
    }
    echo '等待畫面跳轉~~';
    header("Refresh:2; url=item.php");
  }

?>