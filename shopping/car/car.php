<form>
  <font size="10">
    <a class="" href="../index.php" role="button">按此回到主頁</a>
  </font>
  </form>

<?php
  require_once "../method/connect.php";

  $pay = $_POST['pay'];
  
  session_start();
  if(!isset($_SESSION['buyer_ID'])) {
    echo '<font size="10">還未登入喔!</font><br>';
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=../index.php");
  } elseif(isset($_SESSION['buyer_ID']) && $_SESSION['form_quantity'] == 0) {
    echo '<font size="10">無商品可供下單!<br>';
    echo '等待畫面跳轉...</font>';
    header("Refresh:1; url=../index.php");
  } elseif($_POST['pay'] == '' || ($pay == 'card' && $_POST['number'] == '') || $_POST['address'] == '') {
    if($_POST['number'] == '') {
      echo '<font size="10">付款方式或地址或信用卡號不可為空白!</font><br>';
    } else {
      echo '<font size="10">付款方式或地址不可為空白!</font><br>';
    }
    echo '<font size="10">等待畫面跳轉...</font>';
    header("Refresh:1; url=index.php");
  } else {

    //找到purchase_record裡面符合ID=(SELECT MAX(ID) FROM purchase_record)條件的項
    $psql = "SELECT * FROM purchase_record WHERE ID=(SELECT MAX(ID) FROM purchase_record)";
    $presult = $connect->query($psql);
    if ($presult->num_rows > 0) {
      $prow = $presult->fetch_assoc();
    }
    $ID = $prow['ID'];
    for ($i = 0 ;$i < $_SESSION['form_quantity'] ;$i++ ) {

      //找到purchase_record裡面符合ID='$ID'條件的項
      do {
        $sql = "SELECT * FROM purchase_record WHERE ID='$ID'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
        } else {
          $ID = $ID - 1;
        }
      }while($result->num_rows <= 0);

      $form_ID = $ID + 1000000;
      $buyer_ID = $row['buyer_ID'];
      $seller_ID = $row['seller_ID'];
      $item_ID = $row['item_ID'];
      $buyer_name = $row['buyer_name'];
      $seller_name = $row['seller_name'];
      $item_name = $row['item_name'];
      $quantity = $row['quantity'];
      $price = $row['price'];

      //找到seller裡面符合seller_ID='$seller_ID'條件的項
      $ssql = "SELECT * FROM seller WHERE seller_ID='$seller_ID'";
      $sresult = $connect->query($ssql);
      if ($sresult->num_rows > 0) {
        $srow = $sresult->fetch_assoc();
      }

      //紀錄訂單中的賣家有誰
      if($pay == 'atm') {
        if(!isset($_SESSION['seller_1'])) {
          $_SESSION['seller_1'] = $seller_name;
          echo '<font size="10">第一位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
            ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        } elseif(isset($_SESSION['seller_1']) && $_SESSION['seller_1'] != $seller_name && !isset($_SESSION['seller_2'])) {
          $_SESSION['seller_2'] = $seller_name;
          echo '<font size="10">第二位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
            ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        } elseif(isset($_SESSION['seller_1']) && $_SESSION['seller_1'] != $seller_name && isset($_SESSION['seller_2']) && $_SESSION['seller_2'] != $seller_name && !isset($_SESSION['seller_3'])) {
          $_SESSION['seller_3'] = $seller_name;
          echo '<font size="10">第三位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
          ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        } elseif(isset($_SESSION['seller_1']) && $_SESSION['seller_1'] != $seller_name && isset($_SESSION['seller_2']) && $_SESSION['seller_2'] != $seller_name && isset($_SESSION['seller_3']) && $_SESSION['seller_3'] != $seller_name && !isset($_SESSION['seller_4'])) {
          $_SESSION['seller_4'] = $seller_name;
          echo '<font size="10">第四位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
          ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        } elseif(isset($_SESSION['seller_1']) && $_SESSION['seller_1'] != $seller_name && isset($_SESSION['seller_2']) && $_SESSION['seller_2'] != $seller_name && isset($_SESSION['seller_3']) && $_SESSION['seller_3'] != $seller_name && isset($_SESSION['seller_4']) && $_SESSION['seller_4'] != $seller_name && !isset($_SESSION['seller_5'])) {
          $_SESSION['seller_5'] = $seller_name;
          echo '<font size="10">第五位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
          ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        } elseif(isset($_SESSION['seller_1']) && $_SESSION['seller_1'] != $seller_name && isset($_SESSION['seller_2']) && $_SESSION['seller_2'] != $seller_name && isset($_SESSION['seller_3']) && $_SESSION['seller_3'] != $seller_name && isset($_SESSION['seller_4']) && $_SESSION['seller_4'] != $seller_name && isset($_SESSION['seller_5']) && $_SESSION['seller_5'] != $seller_name && !isset($_SESSION['seller_6'])) {
          $_SESSION['seller_6'] = $seller_name;
          echo '<font size="10">第六位賣家姓名: ' . $seller_name . '<br>請轉帳到' . $srow['bank_account'] . 
          ' 銀行代號: ' . $srow['bank_code'] . '</font><br>';
        }
      }
      
      if($pay == 'atm') {
        $card_number = 'XXXXX';
      } elseif($pay == 'card') {
        $card_number = $_POST['number'];
      } elseif($pay == 'cash') {
        $card_number = 'XXXXX';
      }

      $address = $_POST['address'];
      
      //下訂單
      $insertSql = "INSERT INTO form(form_ID, buyer_ID, seller_ID, item_ID, buyer_name, 
        seller_name, item_name, quantity, price, pay, card_number, address) 
        VALUES ('$form_ID', '$buyer_ID', '$seller_ID', '$item_ID', '$buyer_name', 
        '$seller_name', '$item_name', '$quantity', '$price', '$pay', '$card_number', '$address')";
      $insertresult = $connect->query($insertSql);
      if($i == $_SESSION['form_quantity'] - 1) {
        if($insertresult) {
          echo '<font size="10">成功下單!</font><br>';
          $_SESSION['form_quantity'] = 0;
          unset($_SESSION['ID']);
          if($pay == 'atm') {
            unset($_SESSION['seller_1']);
            unset($_SESSION['seller_2']);
            unset($_SESSION['seller_3']);
            unset($_SESSION['seller_4']);
            unset($_SESSION['seller_5']);
            unset($_SESSION['seller_6']);
          }
        } else {
          echo '<font size="10">下單失敗!</font><br>';
        }
      }
      $ID = $ID - 1;
    }
  }

?>