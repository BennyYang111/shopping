<?php
  //使用session前要有的start
  session_start();
  //判斷$_SESSION['buyer_ID']有沒有人登入
  if(!isset($_SESSION['buyer_ID'])){
  } else {
    echo '<font size="5">使用者:' . $_SESSION['buyer_ID'] . '</font>';
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>查看訂單</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bitnami.css">
  <link rel="stylesheet" href="../css/commodity.css">

</head>

<body>
  <br>
  <header class="main_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.php"> <img src="../img/7777.jpg" width="250"
                class="heading img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../index.php">首頁</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../item/index.php">所有商品</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../sign/index.php">註冊</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../method/logout.php">登出</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="index.php">查看訂單</a>
                </li>
              </ul>
            </div>
            <div class="user-login-info">
              <a href="../login/index.php"><img src="../img/user.svg" wight="30" height="30" alt="" title="登入"></a>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="../car/index.php"><img src="../img/bag.svg" wight="30" height="30" alt="" title="購物車"></a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <br><br><br>

  <center>
    <h1 class="title">購買紀錄</h1>
  </center>

  <form class="" action="purchase_record.php" method="post">
    <div class="box">
      <div class="box-head">
          <h3>清單</h3>
      </div>
      <div class="well">
        <center>
          <font size="5"><?php require_once "purchase_record.php"; ?></font><br>
          <button type="button" class="btn btn-primary" onclick="location.href='../index.php'">回到首頁</button>
          <button type="button" class="btn btn-primary" onclick="location.href='../cancel/index.php'">取消訂單</button>
        </center>
      </div>
    </div>
    
  </form>

  <footer class="footer_area clearfix">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="single_widget_area d-flex mb-30">
            <div class="footer-logo mr-50">
              <a href="../index.php"><img src="../img/7777.jpg" wight="100" height="100" alt=""></a>
            </div>
            <div class="footer_menu">
              <ul>
                <li><a href="../item/index.php">所有商品</a></li>
                <li><a href="../sign/index.php">註冊</a></li>
              </ul>
              <ul>
                <li><a href="../purchase_record/index.php">查看訂單</a></li>
                <li><a href="../login/index.php">登入</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-angle-up"
    aria-hidden="true"><img src="../img/top.jpg" width="250" class="heading img-fluid">
  </i></a>

</html>