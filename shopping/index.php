<font size="10">
  <a class="" href="sign/buyer_index.php" role="button">註冊</a>
</font>
<font size="10">
  <a class="" href="item/item.php" role="button">商品</a>
</font>
<font size="10">
  <a class="" href="purchase_record/index.php" role="button">購買紀錄</a>
</font>
<font size="10">
  <a class="" href="car/index.php" role="button">購物車</a>
</font>
<font size="10">
  <a class="" href="cancel/index.php" role="button">取消訂單</a>
</font>
<font size="10">
  <a class="" href="login/index.php" role="button">登入</a>
</font>
<font size="10">
  <a class="" href="method/logout.php" role="button">將使用者登出</a>
</font>
<font size="10">
  <a class="" href="sign/seller_index.php" role="button">增加賣家</a>
</font>
<font size="5">
  <br><br><a>現在登入者:</a>
</font>

<?php
  //使用session前要有的start
  session_start();
  //判斷$_SESSION['buyer_ID']有沒有人登入
  if(!isset($_SESSION['buyer_ID'])){
    echo '無!';
  } else {
    echo $_SESSION['buyer_ID'];
  }

?>
