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
  <link rel="stylesheet" href="./cart.css" />
  <link rel="stylesheet" href="../homepage/home.css" />

</head>

<body>
  <?php
  session_start();
  // function handleCount(){
  //   foreach($_SESSION['giohang'] as $key => $value){
  //     if($value['3'] == $id){
  //         $count=$count+ $value['4'];
  //         $sp = [$tensp,$hinh,$giasp,$id,$count];
  //         $_SESSION['giohang'][$key] = $sp;
  //     }  
  // }
  // }
  ?>
  <nav class="navbar navbar-expand-lg my-navbar">
    <h1 class="navbar-brand ml-5" style="fontSize:40px;">
      <Link style=" color:black " to="/">
      <img src="../homepage/img/Logo-Kha-Go-khong-nen-2.png" style="height:30% ; width:30% " />
      </Link>
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto " id="my-item">
        <li class="nav-item active">
          <a class="nav-link" href="../homepage/index.php">
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
          <a class="fa fa-shopping-cart nav-link my-cart" id="cartID">
            <div style="z-index: 1000;" class="cart-modal hideCart">
              <table class="table text-center cart-item">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Count</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class='cart'>
    <h1 style="text-align:center" class="py-5">Gio Hang</h1>
    <div class="container">
      <table class="table" id="top-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="color:red">
              Sản phẩm
            </th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng đơn giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['giohang'])) {
            $tong = 0;
            foreach ($_SESSION['giohang'] as $key => $value) {
              $tong = $tong + ((int)$value[2] * (int)$value[4]);
              echo "
              <tr>
            <th scope='row'>", $key + 1, "</th>
            <td class='table-img'>
              <img style='height:100px; width:100px; object-fit:cover;' src='../homepage/img/", $value[1], "' />
            </td>
            <td>", $value[2], "</td>
            <td>
            <a style='color:white; text-decoration:none;'  href='updateCart.php?type=false&id=", $value[3], "' type='submit' style='font-weight:600; margin-left:5px; margin-right:5px; cursor:pointer;'>-</a>
            ", $value[4], "
            <a style='color:white; text-decoration:none;' href='updateCart.php?type=true&id=", $value[3], "' type='submit' style='font-weight:600; margin-left:5px; margin-right:5px; cursor:pointer;'>+</a>
            </td>
            <td style='color:red'>", (int)$value[2] * (int)$value[4], "</td>
          </tr>
          ";
            }
          }
          ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <div class="row bottom-content">
          <div class="col-md-6 payment-method">
            <div class="payment">

              <div class="form-group row">
                <label htmlFor class="col-md-5">
                  Thời gian giao hàng
                </label>
                <div class="col-md-7">
                  <select class="form-control" id="delivery_time"="delivery_time">
                    <option value>Thời gian giao hàng</option>
                    <option value={1}>Ca sáng: 7:00 - 12:00</option>
                    <option value={2}>Ca chiều: 13:00 - 17:00</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label htmlFor class="col-md-5">
                  Phương thức thanh toán
                </label>
                <div class="col-md-7">
                  <select class="form-control" name="pay_method">
                    <option value="shipCOD">Thanh toán tiền mặt</option>
                    <option value="Zalo">Thanh toán Zalo Pay</option>
                  </select>
                </div>
              </div>
              <div class="form-group mt-md-4">
                <label htmlFor>Note</label>
                <textarea class="form-control" name="note_order" placeholder="Thời gian có thể nhận hàng cụ thể nếu có. Ghi chú về địa chỉ giao hàng (block chung cư, tên tòa nhà văn phòng...)"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6 offset-lg-2 col-lg-4 mb-3 text-right payment-summary">
            <div class="row mb-md-2">
              <div class="col-7">Phí ship</div>
              <div class="col-5 price">0đ</div>
            </div>

            <div class="row total mt-md-4">
              <div class="col-7">Tổng đơn hàng:</div>
              <div class="col-5 text-price">
                <strong style="color:red"><?php if (isset($tong)) echo $tong;
                                          else echo "0"; ?>đ</strong>
              </div>
            </div>
          </div>
          <form method="post" action="handleCart.php" class="col-md-6" style="text-align:right">
            <button class="btn btn-success" type="submit">Hoàn thành</button>
          </form>
          <?php
          if ($_SESSION['giohang'] != null) {
            echo "<form method='post' action='handleCart.php' class='col-md-6' style='text-align:right'>
              <button class='btn btn-success' type='submit'>Thanh toán</button>
              </form>";
          } else {
            echo "
              <div class='col-md-6' style='text-align:right'>
              <button class='btn btn-success' type='button' disabled>Đặt hàng để thanh toán</button>
              </div>
              ";
          }
          ?>
        </div>
      </div>

    </div>
  </div>

  <div class="top-footer pt-5 " id="my-footer">
    <div class="row row-footer">
      <div class="col-sm-5">
        <h5 class="footer-title">CÔNG TY TNHH KHAGO</h5>
        <p>
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
  <!-- bs4 JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <!-- <script src="../homepage/main.js"></script> -->
</body>

</html>