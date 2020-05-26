<!DOCTYPE html>
<html>

<head>
  <title>購買紀錄</title>
  <meta charset="utf-8">
</head>

<body>
  <form class="" action="cancel.php" method="post">
    <font size="10" align="center">
      有需要取消的訂單嗎?
    </font><br>
    <a>選擇要取消的訂單編號： </a><input type="text" name="ID" value="" placeholder="輸入訂單編號"><br><br>
    <input type="submit" name="MyHead" value="確認"><br><br>
    <a class="" href="../index.php" role="button">Home</a>
  </form>
</body>

</html>

<?php
  require_once "../method/connect.php";
  
  session_start();
  $buyer_ID = $_SESSION['buyer_ID'];
  $sql = "SELECT * FROM form WHERE buyer_ID='$buyer_ID'";
  $result = $connect->query($sql);

  //列出購買紀錄
  if($result->num_rows > 0) {
    echo '<table border="1"><tr>' 
      . '<td>訂單編號</td>' . '<td>賣家姓名</td>' .  '<td>買家姓名</td>' 
      . '<td>物品名稱</td>' . '<td>數量</td>' . '<td>價錢</td></tr>';
    while($row = mysqli_fetch_array($result)){
      echo '<tr><td>' . $row['form_ID'] . '</td><td>' . $row['seller_name'] . '</td><td>' . 
        $row['buyer_name'] . '</td><td>' . $row['item_name'] . '</td><td>' . $row['quantity'] 
        . '</td><td>' . $row['price'] . '</td>';
    }
  } else {
    echo '無訂單可取消!<br>回去吧~~';
    header("Refresh:2; url=../index.php");
  }
  echo '</tr></table>';
?>