<?php
  if(!isset($_SESSION['buyer_ID'])) {
    echo '還未登入喔!<br><br>';
  } else {
    require_once "../method/connect.php";
  
    $buyer_ID = $_SESSION['buyer_ID'];
    $sql = "SELECT * FROM form WHERE buyer_ID='$buyer_ID'";
    $result = $connect->query($sql);

    //列出購買紀錄
    if($result->num_rows > 0) {
      echo '<table border="1"><tr>';
      echo '<td>買家ID</td>' . '<td>賣家ID</td>' . '<td>物品ID</td>' . '<td>買家姓名</td>';
      echo '<td>賣家姓名</td>' . '<td>物品名稱</td>' . '<td>數量</td>' . '<td>價錢</td></tr>';
      while($row = mysqli_fetch_array($result)){
        echo '<tr><td>' . $row['buyer_ID'] . '</td><td>' . $row['seller_ID'] . '</td><td>' . 
        $row['item_ID'] . '</td><td>' . $row['buyer_name'] . '</td><td>' . $row['seller_name'] 
        . '</td><td>' . $row['item_name'] . '</td><td>' . $row['quantity'] . '</td><td>' 
        . $row['price'] . '</td>';
      }
    } else {
      echo '無購買紀錄!<br>';
    }
    echo '</tr></table></font>';
  }
?>