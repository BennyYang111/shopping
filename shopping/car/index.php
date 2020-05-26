<!DOCTYPE html>
<html>

<head>
  <title>購物車</title>
  <meta charset="utf-8">
</head>

<body>
  <form class="" action="car.php" method="post">
    <font size="10" align="center">
      購物車
    </font><br>
    <a>選擇付款方式： </a><input type="radio" name="pay" value="atm">ATM轉帳
    <input type="radio" name="pay" value="card">信用卡
    <input type="radio" name="pay" value="cash">貨到付款<br><br>
    <a>使用信用卡付費請填寫(如果不是則空白)： </a><input type="text" name="number" value="" placeholder="輸入信用卡號">
    <a>請輸入寄送地址： </a><input type="text" name="address" value="" placeholder="輸入寄送地址">
    <br><br><input type="submit" name="MyHead" value="下單"><br><br>
    <a class="" href="../item/item.php" role="button">See more</a>
  </form>
</body>

</html>
