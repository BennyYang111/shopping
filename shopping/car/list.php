<?php
  if(!isset($_SESSION['buyer_ID'])) {
    echo '還未登入喔!<br>';
    echo '等待畫面跳轉...';
    header("Refresh:1; url=../login/index.php");
  } elseif($_SESSION['form_quantity'] == 0) {
    echo '購物車中無商品!<br>';
    echo '等待畫面跳轉...';
    header("Refresh:1; url=../item/index.php");
  } else {
    require_once "../method/connect.php";
  
    $ID = $_SESSION['ID'];
    $buyer_ID = $_SESSION['buyer_ID'];
    $sql = "SELECT * FROM purchase_record WHERE buyer_ID='$buyer_ID' AND ID >= '$ID'";
    $result = $connect->query($sql);

    //列出購買紀錄
    if($result->num_rows > 0) {
      echo '<table border="1"><tr>';
      echo '<td>ID</td>' . '<td>買家ID</td>' . '<td>賣家姓名</td>' . '<td>物品ID</td>' . '<td>買家姓名</td>';
      echo '<td>賣家姓名</td>' . '<td>物品名稱</td>' . '<td>數量</td>' . '<td>價錢</td></tr>';
      while($row = mysqli_fetch_array($result)){
        echo '<tr><td>'  . $row['ID']  . '</td><td>' . $row['buyer_ID'] . '</td><td>' . $row['seller_ID'] . '</td><td>' . 
        $row['item_ID'] . '</td><td>' . $row['buyer_name'] . '</td><td>' . $row['seller_name'] 
        . '</td><td>' . $row['item_name'] . '</td><td>' . $row['quantity'] . '</td><td>' 
        . $row['price'] . '</td>';
      }
    } else {
      echo '無購買紀錄!<br>';
      echo '等待畫面跳轉...';
      header("Refresh:1; url=../item/index.php");
    }
    echo '</tr></table>';
  }

?>