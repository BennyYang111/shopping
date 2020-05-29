<font size="10">
  <a class="" href="sign/index.php" role="button">註冊</a>
</font>
<font size="10">
  <a class="" href="item/index.php" role="button">商品</a>
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
</font><br><br>
<font size="10">
  <a class="" href="method/logout(system).php" role="button">將使用者登出</a>
</font>
<font size="10">
  <a class="" href="item/new_index.php" role="button">新增物品</a>
</font>
<font size="10">
  <a class="" href="sign/seller_index.php" role="button">增加賣家</a>
</font><br><br>

<?php
  //使用session前要有的start
  session_start();
  //判斷$_SESSION['buyer_ID']有沒有人登入
  if(!isset($_SESSION['buyer_ID'])){
    echo '<font size="5">現在登入者 : XXXXX</font><br><br>';
  } else {
    echo '<font size="5">現在登入者 : ' . $_SESSION['buyer_ID'] . '</font><br>';
  }
  
  if(!isset($_SESSION['form_quantity'])){
    echo '<br><font size="5">放入購物車的商品數 : XXXXX</font>';
  } else {
    echo '<br><font size="5">放入購物車的商品數 : ' . $_SESSION['form_quantity'] . '</font><br>'; 
  }

?>
