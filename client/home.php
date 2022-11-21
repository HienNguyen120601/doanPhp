<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BS4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./home.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg my-navbar">
        <h1 class="navbar-brand ml-5" style ="fontSize:40px;">
          <Link style=" color:black " to="/">
            <img src="../assets/Img/Logo-Kha-Go-khong-nen-2.png" style="height=30% ; width:30% " />
          </Link>
        </h1>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon" />
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
              <a class="nav-link" href="#">
                Price
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Log in
              </a>
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
        </div>
      </nav>
    <!-- PRODUCT -->
    <?php
//   include '../api/SQL/connect.php';
//   if (isset($pdo)) {
//     $sql = "select * from product";
//     $result = $pdo->query($sql);
//     $row = $result->fetch(PDO::FETCH_ASSOC);
//     var_dump($row);
//   }


     $item1 = array();
  $item1[] = array("id" => "1", "name" => "kho ga", "price" => "10000", "img" => "../assets/Img/Logo-Kha-Go-khong-nen-2.png", "count" => "10", "detail" => "ngon");
  $item1[] = array("id" => "2", "name" => "kho ga", "price" => "10000", "img" => "../assets/Img/Logo-Kha-Go-khong-nen-2.png", "count" => "10", "detail" => "ngon");
  $item1[] = array("id" => "3", "name" => "kho ga", "price" => "10000", "img" => "../assets/Img/Logo-Kha-Go-khong-nen-2.png", "count" => "10", "detail" => "ngon");
  $item1[] = array("id" => "4", "name" => "kho ga", "price" => "10000", "img" => "../assets/Img/Logo-Kha-Go-khong-nen-2.png", "count" => "10", "detail" => "ngon");
  $item1[] = array("id" => "5", "name" => "kho ga", "price" => "10000", "img" => "../assets/Img/Logo-Kha-Go-khong-nen-2.png", "count" => "10", "detail" => "ngon");   ?>
    <div class="product">
      <h1 class="title" style="text-align:center">Products</h1>
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
                echo "<div class='col-sm-4'>
                            <div class='card' style=' width:16rem'>
                            <a>
                    <img height='250px' style='objectFit:cover' src=", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                            <div class='card-body'>
                        <div class='row row_no_margin'>
                                <div class='col-sm-8'>
                            <h3>", $value["name"], "</h3><p>", $value["price"], "</p></div>
                                <!-- shopping cart -->
                            </div>
                            </div>
                            </div>
                    </div>";
                }
                ?>
                    
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row container product-item">
            <?php
            foreach ($item1 as $key => $value) {
              echo "<div class='col-sm-4'>
                        <div class='card' style=' width:16rem'>
                          <a>
                  <img height='250px' style='objectFit:cover' src=", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                          <div class='card-body'>
                    <div class='row row_no_margin'>
                            <div class='col-sm-8'>
                        <h3>", $value["name"], "</h3><p>", $value["price"], "</p></div>
                              <!-- shopping cart -->
                           </div>
                          </div>
                        </div>
                </div>";
            }
            ?>
          </div>
         
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
           <div class="row container product-item">
           <?php
            foreach ($item1 as $key => $value) {
              echo "<div class='col-sm-4'>
                        <div class='card' style=' width:16rem'>
                          <a>
                  <img height='250px' style='objectFit:cover' src=", $value["img"], " ", "class='card-img-top' alt='...' />", "</a>
                          <div class='card-body'>
                    <div class='row row_no_margin'>
                            <div class='col-sm-8'>
                        <h3>", $value["name"], "</h3><p>", $value["price"], "</p></div>
                              <!-- shopping cart -->
                           </div>
                          </div>
                        </div>
                </div>";
            }
            ?>
            </div>
          </div>
      </div>
    </div>
            <!-- FOOTER -->
            <div class="top-footer pt-5" id="my-footer">
    <div class="row row-footer" >
      <div class="col-sm-5">
        <h5 class='footer-title'>CÔNG TY TNHH GRIVAL</h5>
        <p>
        <LocationOnIcon/> 180 Cao Lỗ, Phường 4, Quận 8
        </p>
        <p>
         <LocalPhoneIcon/> (+84) 123 456 789 [hotline] - (+84) 123 456 789 [sms]
        </p>
        <p>
         <EmailIcon/> info@grival.vn. For business inquiries:
          business@grival.vn
        </p>
        <p>
          MST 0313272749 do Sở kế hoạch và đầu tư TPHCM cấp ngày 26/05/2015
        </p>
      </div>
      <div class="col-sm-3">
        <h5 class='footer-title'>ĐIỀU KHOẢN CHUNG</h5>
        <p>Chính Sách Quy Định Chung</p>
        <p>Quy Định Hình Thức Thanh Toán</p>
        <p>Chính Sách Vận Chuyển Giao Hàng</p>
        <p>Chính Sách Bảo Mật Thông Tin</p>
      </div>
      <div class="col-sm-3 footer-img">
        <h5 class='footer-title' >FOLLOW US</h5>
      <p><FacebookIcon/> <InstagramIcon/> <YouTubeIcon/> <TwitterIcon/> </p>
      <form>
  <div class="form-group">
    <input type="email" placeholder='Email' class="form-control" id="exampleInputPassword1" />
  </div>
  <button type="button" class="btn btn-success">Send</button>
</form>

      </div>
    </div>
  </div>
    <!-- bs4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>