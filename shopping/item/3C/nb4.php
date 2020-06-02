<?php
  require_once "../../method/connect.php";
  $sql = "SELECT * FROM stock WHERE item_name='【777電腦系列】 筆記型電腦 銀'";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();
  session_start();
  $_SESSION['item'] = '【777電腦系列】 筆記型電腦 銀';
  $quantity = $row['quantity'];
  $seller = $row['seller_name'];
  $_SESSION['seller'] = $seller;

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
  <title>【777電腦系列】 筆記型電腦 銀</title>
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
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/bitnami.css">
  <link rel="stylesheet" href="../../css/commodity.css">
</head>

<body>
  <br>
  <header class="main_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../../index.php"> <img src="../../img/7777.jpg" width="250"
                class="heading img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../../index.php">首頁</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../../item/index.php">所有商品</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../../sign/index.php">註冊</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../../method/logout.php">登出</a>
                </li>
                <pre>       </pre>
                <li class="nav-item">
                  <a class="nav-link" href="../../purchase_record/index.php">查看訂單</a>
                </li>
              </ul>
            </div>
            <div class="user-login-info">
              <a href="../../login/index.php"><img src="../../img/user.svg" wight="30" height="30" alt=""></a>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="../../car/index.php"><img src="../../img/bag.svg" wight="30" height="30" alt=""></a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <br>
  <br>
  <br>
  <div role="main" class="container1">
    <div class="product-briefing flex card _2cRTS4">
      <br>
      <center>
        <div class="qaNIZv">
          <span>【777電腦系列】 筆記型電腦 銀</span>
        </div>
        <br>
        <div class="flex items-center">
          <div class="_3n5NQx" style="font-size: 30px;">$63,888</div>
        </div>
      </center>
      <center>
        <div class="_1anaJP">
          <img src="../../img/nb-4.jpg" class=" item-img img-fluid" alt="">
        </div>
      </center>
      <center>
        <div class="flex items-center _1FzU2Y">
          <div class="_2C2YFD">
            <div class="kP-bM3" style="font-size: 30px;">商品規格: </div>
            <div class="_2aZyWI">
              <div class="kIo6pj" style="font-size: 20px;">型號 : Surface Book2
              </div>
              <div class="kIo6pj" style="font-size: 20px;">品牌 : Microsoft</div>
              <div class="kIo6pj" id='stock' style="font-size: 20px;">庫存 : <?php echo $quantity; ?></div>
            </div>
          </div>
        </div>
        <form class="" action="../order.php" method="post">
          <br><a>請問要購買數量： </a><input type="number" name="quantity" value="" placeholder="輸入需要數量"><br><br>
          <input type="submit" name="MyHead" value="加入購物車">
        </form>
      </center>

      <br><br>
    </div>
  </div>
  <br>
  <br>

  <div class="product-briefing flex card _2cRTS4">
    <div class="_1zBnTu page-product__shop">
      <div class="_1Sw6Er">
        <span>賣家名稱 : <?php echo $seller; ?></span>
      </div>
    </div>
  </div>
  <br>
  <br>
  <footer class="footer_area clearfix">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="single_widget_area d-flex mb-30">
            <div class="footer-logo mr-50">
              <a href="../../index.php"><img src="../../img/7777.jpg" wight="100" height="100" alt=""></a>
            </div>
            <div class="footer_menu">
              <ul>
                <li><a href="../../item/index.php">所有商品</a></li>
                <li><a href="../../sign/index.php">註冊</a></li>
              </ul>
              <ul>
                <li><a href="../../purchase_record/index.php">查看訂單</a></li>
                <li><a href="../../login/index.php">登入</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-angle-up"
    aria-hidden="true"><img src="../../img/top.jpg" width="250" class="heading img-fluid">
  </i></a>

</html>
