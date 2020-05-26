<!DOCTYPE html>
<html>

<head>
  <title>登入</title>
  <meta charset="utf-8">
</head>

<body>
  <form class="" action="login.php" method="post">
    <font size="10" align="center">
      登入
    </font><br><br>
    <a>帳號: </a><input type="text" name="account" value="" placeholder="輸入帳號"><br><br>
    <a>密碼: </a><input type="password" name="password" value="" placeholder="輸入密碼"><br><br>
    <input type="submit" name="MyHead" value="登入"><br><br>
    <a class="" href="../index.php" role="button">Home</a>
  </form>
</body>

</html>

<?php
  session_start();
  if(isset($_SESSION['buyer_ID'])) {
    echo '<br>已經登入過了喔' . $_SESSION['buyer_ID'] . '~~~~~~~<br>';
    echo '不給你再登入一次! 掰掰~~~';
    header("Refresh:2; url=../index.php");
  }
?>