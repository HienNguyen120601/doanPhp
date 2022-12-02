<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- FONTAWSOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- BS4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="./home.css" />
</head>

<body>
  <?php

  //   include '../api/SQL/connect.php';
  //   if (isset($pdo)) {
  //     $sql = "select * from product";
  //     $result = $pdo->query($sql);
  //     $row = $result->fetch(PDO::FETCH_ASSOC);
  //     var_dump($row);
  //   }

  include "../../sql/connect.php";
  session_start();

  if (isset($pdo)) {
    $sql = "select * from product";
    $pdo->query("set names 'utf8'");
    $result = $pdo->prepare($sql);
    $result->execute();
    $item1 = array();


    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $item1[] = $row;
    }
    //$row = $result->fetch(PDO::FETCH_ASSOC);

  }

  if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
  }
  // $listProduct= array();
  // $id=$_POST["submit"];
  // $_SESSION["id_product_$id"]=$_POST;

  // $listProduct["id_product_$id"]=$_SESSION;
  // var_dump($listProduct);


  // session_destroy();
  // foreach($_SESSION as $key=>$value)
  // {
  // }
  // $id=(int) $_SESSION["id_product"];
  // var_dump($item1[$id]);
  ?>
  <nav class="navbar navbar-expand-lg my-navbar">
    <h1 class="navbar-brand ml-5" style="fontSize:40px;">
      <Link style=" color:black " to="/">
      <img src="./img/Logo-Kha-Go-khong-nen-2.png" style="height:30% ; width:30% " />
      </Link>
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto " id="my-item">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            Home <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../order/order.php">
            Order
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            Products
          </a>
        </li>
        <li class="nav-item">
          <!-- Button trigger modal -->

          <?php
          if (isset($_SESSION['user'])) {
            echo '<a type="button" class="nav-link btnLogout">', $_SESSION['user']['username'], '</a> ';
          } else
            echo '<a type="button" class="nav-link" data-toggle="modal" data-target="#staticBackdrop">Login</a>';
          ?>
          <form action="dangXuat.php" method="POST">
            <button type='submit' class='logout-modal hideCart'>
              Log out
            </button>
          </form>


          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Log in</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dangNhap.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Account</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="taiKhoan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="matKhau">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="fa fa-shopping-cart nav-link my-cart" onClick="()" id="cartID"></a>
          <div style="z-index: 1000;overflow-y:scroll;" class="cart-modal hideCart">
            <table class="table text-center cart-item">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Count</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (isset($_SESSION['giohang'])) {
                  $cartItem = $_SESSION['giohang'];
                  foreach ($cartItem as $key => $value) {

                    echo "
                <tr>
                <td>
                <img height='50px' style='objectFit:cover' src=./img/", $value[1], " ", "class='card-img-top' alt='...' />", "</a>

                </td>
                <td style='text-align:center;'>

                $value[4]

                </td>  
                <td>$value[2]</td>
                </tr>";
                  }
                }
                ?>


                <tr>
                  <td>Thành tiền:</td>
                  <td>
                    <?php
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $key => $value) {
                      $tong = $tong + ((int)$value[2] * (int)$value[4]);
                    }
                    echo $tong;
                    ?>
                  </td>
                  <td style="colspan:2">
                    <?php
                    if (isset($_SESSION['user'])) {
                      echo '<a href="../cart/cart.php" class="btn btn-success">ĐẶT HÀNG</a>';
                    } else {
                      echo '<a class="btn btn-success" type="button" id="isLoginBtn">ĐẶT HÀNG</a>
                      ';
                    };
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <p class="text-danger" id="isLogin"></p>
          </div>

        </li>
      </ul>
    </div>
  </nav>
  <!-- PRODUCT -->


  <!-- PRODUCT -->
  <div class="product pt-5">
    <h1 style="text-align:center; color:white"> SẢN PHẨM</h1>
    <div>
      <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
            New Arrival
          </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
            Special
          </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
            Best Seller
          </a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row container product-item">
            <?php
            foreach ($item1 as $key => $value) {
              if ($value['type'] == "arrival") {
                echo "<div  class='col-sm-4'>
                    <div class='card' style=' width:16rem'>
                    <a>
            <img height='250px' style='objectFit:cover' src=./img/", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                    <div class='card-body'>
                <div   class='row row_no_margin ' >
                    <div  class='col-sm-8 cart-content'>
                    <h3 >", $value["name"], "</h3><p>", $value["price"], "</p>
                    </div>
                        <!-- shopping cart -->
                       <form method='post' action='addcart.php'>
                       <input type='number' value=", 1, " name='count'min='",1,"' ></input>
                       <input type='submit' value='ADD' name='submit' class='btn btn-success'></input>
                       <input type='hidden' value=", $value["name"], " name='tensp' ></input>
                       <input type='hidden' value=", $value["img"], " name='hinh' ></input>
                       <input type='hidden' value=", $value["price"], " name='giasp' ></input>
                       <input type='hidden' value=", $value["id"], " name='id' ></input>
                       </form>
                    </div>
                    </div>
                    </div>
            </div>";
              }
            }
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="row container product-item">
            <?php
            foreach ($item1 as $key => $value) {
              if ($value['type'] == "special") {
                echo "<div  class='col-sm-4'>
                    <div class='card' style=' width:16rem'>
                    <a>
            <img height='250px' style='objectFit:cover' src=./img/", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                    <div class='card-body'>
                <div   class='row row_no_margin ' >
                    <div  class='col-sm-8'>
                    <h3 >", $value["name"], "</h3><p>", $value["price"], "</p>
                    </div>
                        <!-- shopping cart -->
                       <form method='post' action='addcart.php'>
                       <input type='number' value=", 1, " name='count' ></input>
                       <input type='submit' value='ADD' name='submit' class='btn btn-success'></input>
                       <input type='hidden' value=", $value["name"], " name='tensp' ></input>
                       <input type='hidden' value=", $value["img"], " name='hinh' ></input>
                       <input type='hidden' value=", $value["price"], " name='giasp' ></input>
                       <input type='hidden' value=", $value["id"], " name='id' ></input>
                       </form>
                    </div>
                    </div>
                    </div>
            </div>";
              }
            }
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <div class="row container product-item">
            <?php
            foreach ($item1 as $key => $value) {
              if ($value['type'] == "best") {
                echo "<div  class='col-sm-4'>
                    <div class='card' style=' width:16rem'>
                    <a>
            <img height='250px' style='objectFit:cover' src=./img/", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                    <div class='card-body'>
                <div   class='row row_no_margin ' >
                    <div  class='col-sm-8'>
                    <h3 >", $value["name"], "</h3><p>", $value["price"], "</p>
                    </div>
                        <!-- shopping cart -->
                       <form method='post' action='addcart.php'>
                       <input type='number' value=", 1, " name='count' ></input>
                       <input type='submit' value='ADD' name='submit' class='btn btn-success'></input>
                       <input type='hidden' value=", $value["name"], " name='tensp' ></input>
                       <input type='hidden' value=", $value["img"], " name='hinh' ></input>
                       <input type='hidden' value=", $value["price"], " name='giasp' ></input>
                       <input type='hidden' value=", $value["id"], " name='id' ></input>
                       </form>
                    </div>
                    </div>
                    </div>
            </div>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <div class="top-footer pt-5 " id="my-footer">
    <div class="row row-footer">
      <div class="col-sm-5">
        <h5 class="footer-title">CÔNG TY TNHH KHAGO</h5>
        <i class="fa fa-map-marker-alt"></i> 180 Cao Lỗ, Phường 4, Quận 8
        </p>
        <p>
          <i class="fa fa-phone"></i> (+84) 123 456 789 [hotline] - (+84) 123 456 789
          [sms]
        </p>
        <p>
          <i class="fa fa-envelope"></i> info@khago.vn. For business inquiries:
          business@khago.vn
        </p>
        <p>
          MST 0313272749 do Sở kế hoạch và đầu tư TPHCM cấp ngày 26/05/2015
        </p>
      </div>
      <div class="col-sm-3">
        <h5 class="footer-title">ĐIỀU KHOẢN CHUNG</h5>
        <p>Chính Sách Quy Định Chung</p>
        <p>Quy Định Hình Thức Thanh Toán</p>
        <p>Chính Sách Vận Chuyển Giao Hàng</p>
        <p>Chính Sách Bảo Mật Thông Tin</p>
      </div>
      <div class="col-sm-3 footer-img">
        <h5 class="footer-title">FOLLOW US</h5>
        <p>
          <FacebookIcon />
          <InstagramIcon />
          <YouTubeIcon />
          <TwitterIcon />
        </p>
        <form>
          <div class="form-group">
            <input type="email" placeholder="Email" class="form-control" id="exampleInputPassword1" />
          </div>
          <button type="button" class="btn btn-success">
            Send
          </button>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- bs4 JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <!-- Script -->
  <script src="./main.js"></script>
</body>

</html>