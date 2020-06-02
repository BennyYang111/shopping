<?php
  session_start();
  if(!isset($_SESSION['buyer_ID'])) {
    echo '<font size="10">還未登入喔!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../login/index.php");
  } else {
    //連線
    require_once "../method/connect.php";
    
    $item = $_SESSION['item'];
    $quantity = $_POST['quantity'];
    $stocksql = "SELECT * FROM stock WHERE item_name='$item'";
    $stockresult = $connect->query($stocksql);
    $stockrow = $stockresult->fetch_assoc();
    
    if($quantity > $stockrow['quantity']){
      echo '<font size="10">您的訂購數量已超出庫存!</font><br>';
      $false = 1;
    }

    //找出purchase_record裡面ID的對大值
    $psql = "SELECT * FROM purchase_record WHERE ID=(SELECT MAX(ID) FROM purchase_record)";
    $presult = $connect->query($psql);
    $prow = $presult->fetch_assoc();
    
    $ID = $prow['ID'] + 1;

    $buyer_ID = $_SESSION['buyer_ID'];
    //找到buyer裡面符合buyer_ID='$buyer_ID'條件的項
    $bsql = "SELECT * FROM buyer WHERE buyer_ID='$buyer_ID'";
    $bresult = $connect->query($bsql);
    if($bresult->num_rows > 0) {
      $brow = $bresult->fetch_assoc();
    } else {
      echo '<font size="10">無此買家!</font>';
    }

    $seller = $_SESSION['seller'];
    //找到seller裡面符合seller_name='$seller'條件的項
    $ssql = "SELECT * FROM seller WHERE seller_name='$seller'";
    $sresult = $connect->query($ssql);
    if($sresult->num_rows > 0){
      $srow = $sresult->fetch_assoc();
    } else {
      echo '<font size="10">無此賣家!</font>';
    }

    $seller_ID = $srow['seller_ID'];
    $item_ID = $stockrow['item_ID'];
    $buyer_name = $brow['buyer_name'];
    $seller_name = $srow['seller_name'];

    //找到stock裡面符合item_name='$item'條件的項
    $itemsql = "SELECT * FROM stock WHERE item_name='$item'";
    $itemresult = $connect->query($itemsql);
    if($itemresult->num_rows > 0){
      $itemrow = $itemresult->fetch_assoc();
    } else {
      echo '<font size="10">無此物品!</font>';
    }
    
    $item_name = $itemrow['item_name'];
    
    //算出總金額將值給price
    if($quantity != 0) {
      $price = $itemrow['price'] * $quantity;
    }

    //放入購物車
    $recordSql = "INSERT INTO purchase_record(ID, buyer_ID, seller_ID, item_ID, buyer_name, 
    seller_name, item_name, quantity, price) VALUES ('$ID', '$buyer_ID', '$seller_ID', '$item_ID', 
    '$buyer_name', '$seller_name', '$item_name', '$quantity', '$price')";
    if($quantity > 0 && ($quantity <= $stockrow['quantity'])) {
      $recordresult = $connect->query($recordSql);
      
      if(($quantity <= $stockrow['quantity']) && $recordresult && $quantity > 0) {
        echo '<font size="10">已將商品放入購物車!</font><br>';
        $false = 0;
        if(isset($_SESSION['ID'])){
          if($ID <= $_SESSION['ID']){
            $_SESSION['ID'] = $ID;
          }
        } else {
          $_SESSION['ID'] = $ID;
        }
        
        header("Refresh:1; url=index.php");
        //用session紀錄訂購數量
        $_SESSION['form_quantity'] = $_SESSION['form_quantity'] + 1;
      } else {
        echo '<font size="10">商品放入購物車失敗!</font><br>';
        $false = 1;
      }
    } else {
      echo '<font size="10">商品放入購物車失敗!</font><br>';
      $false = 1;
    }

    //更新庫存
    $delSql = "UPDATE stock SET quantity=quantity-'$quantity' WHERE item_ID='$item_ID'";
    if($recordresult) {
      $delresult = $connect->query($delSql);
    }
    if($i == $_SESSION['form_quantity'] - 1){
      if($recordresult && $delresult) {
        //echo '<font size="10">已更新庫存數量!</font><br>';
        
      } else {
        //echo '<font size="10">更新庫存失敗!</font><br>';
      }
    }

    echo '<font size="10">等待畫面跳轉...</font>';
    if($false == 1){
      if($_SESSION['item'] == '【777電腦系列】 筆記型電腦 迷霧黑'){
        header("Refresh:1; url=3C/nb1.php");
      } elseif($_SESSION['item'] == '【777電腦系列】 筆記型電腦 冰河藍'){
        header("Refresh:1; url=3C/nb2.php");
      } elseif($_SESSION['item'] == '【777電腦系列】 筆記型電腦 灰'){
        header("Refresh:1; url=3C/nb3.php");
      } elseif($_SESSION['item'] == '【777電腦系列】 筆記型電腦 銀'){
        header("Refresh:1; url=3C/nb4.php");
      } elseif($_SESSION['item'] == '【777電腦系列】 筆記型電腦 白金'){
        header("Refresh:1; url=3C/nb5.php");
      } elseif($_SESSION['item'] == '【777電腦系列】 筆記型電腦 銀灰'){
        header("Refresh:1; url=3C/nb6.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 帆布鞋 converse 奶茶色'){
        header("Refresh:1; url=shoes/shoes1.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 高筒帆布鞋 TW 藍'){
        header("Refresh:1; url=shoes/shoes2.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 Nike Air Force 1'){
        header("Refresh:1; url=shoes/shoes3.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 adidas 杜拉姆女生慢跑鞋 黑粉'){
        header("Refresh:1; url=shoes/shoes4.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 VANS OLD SKOOL PRO基本款'){
        header("Refresh:1; url=shoes/shoes5.php");
      } elseif($_SESSION['item'] == '【777鞋子系列】 PUMA 休閒鞋 Turin II'){
        header("Refresh:1; url=shoes/shoes6.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt TW'){
        header("Refresh:1; url=clothes/cloth1.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt VANS'){
        header("Refresh:1; url=clothes/cloth2.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt adidas'){
        header("Refresh:1; url=clothes/cloth3.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt 肌肉衣'){
        header("Refresh:1; url=clothes/cloth4.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt NBA'){
        header("Refresh:1; url=clothes/cloth5.php");
      } elseif($_SESSION['item'] == '【777衣服系列】 T-shirt champion'){
        header("Refresh:1; url=clothes/cloth6.php");
      }
    }
    unset($_SESSION['seller']);
  }

?>