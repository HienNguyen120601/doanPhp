<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="../asserts/img/favicon-32x32.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">

    <link rel="stylesheet" href="../assets/css/base.css">
    <title>Admin</title>
</head>



<body>
    <!-- Header -->
    <?php
    include '../SQL/connect.php';
    session_start();
    if (!isset($_SESSION['isLoginAdmin'])) {
        header('location:' . 'index.php');
    }
    if (isset($pdo)) {
        $sql = "select * from product";
        $pdo->query("set names 'utf8'");
        $result = $pdo->prepare($sql);
        $result->execute();
        $item = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $item[] = $row;
        }
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $name = $_POST['Name'];
        //     $price = $_POST['Price'];
        //     $img = $_POST['Image'];
        //     $count = $_POST['Count'];
        //     $detail = $_POST['Detail'];
        //     $type = $_POST['Type'];
        //     $sqlInsert = "insert into product(name,price,img,count,detail,type)" . "values('$name','$price','$img','$count','$detail','$type')";
        //     $result = $pdo->query($sqlInsert);
        //     $result->execute();
        // }
        //$row = $result->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <div class="img__preview">
        <div class="preview__overlay">
        </div>
        <div class="preview__content">
        </div>
    </div>
    <div class="header">
        <div class="header__logo">
            <a href="../client/homepage/index.php">
                <img src="../assets/Img/Logo-Kha-Go-khong-nen-2.png" alt="">
            </a>

        </div>
        <ul class="navbar__list">
            <li class="navbar__item">
                <i class="fa-solid fa-share"></i>
                <a href="../client/homepage/index.php">Vào trang web</a>
            </li>
            <li class="navbar__item">
                <span>Liên hệ</span>
            </li>
            <li class="navbar__item"><span>Đơn hàng</span></li>
        </ul>
    </div>
    <!-- container -->
    <div class="container">
        <!-- SideBar -->
        <div class="sidebar">
            <div class="sidebar__title">
                <i class="fa-solid fa-house"></i>
                <span>Trang chủ admin</span>
            </div>
            <div class="sidebar__product">
                <div class="product__title">
                    <i class="fa-brands fa-servicestack"></i>
                    <span>Quản trị dịch vụ</span>
                </div>
                <ul class="sidebar__list">
                    <li class="sidebar__item">
                        <span onclick="renderTour();" class="product">Sản phẩm</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderOrder();" class="order">Đơn hàng</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();" class="customer">Khách hàng</span>
                    </li>
                </ul>
            </div>
            <div class="sidebar__product">
                <div class="product__title">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Quản trị thông tin</span>
                </div>
                <ul class="sidebar__list">
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Ưu đãi</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Báo cáo</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Thiết lập</span>
                    </li>
                </ul>
            </div>
            <div class="sidebar__product">
                <div class="product__title">
                    <i class="fa-solid fa-synagogue"></i>
                    <span>Quản trị giao diện</span>
                </div>
                <ul class="sidebar__list">
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Giao diện</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Widget</span>
                    </li>
                    <li class="sidebar__item">
                        <span onclick="renderCustormer();">Tùy biến</span>
                    </li>
                </ul>
            </div>


        </div>
        <!-- content -->
        <div class="content">
            <div class="content__header">
                <span id="title">Quản trị sản phẩm</span>
                <i class="fa-solid fa-chevron-right"></i>
                <span id='product'>Sản phẩm</span>
            </div>
            <div class="content__service">
                <div class="service__search">
                    <input type="text" placeholder="Nhập tên sản phẩm" class="service__input">
                    <i class="fa-solid fa-magnifying-glass" onclick="searchTour();"></i>
                </div>

                <button onclick="showAddForm();" class="service__addtour">Thêm mới</button>

            </div>
            <div class="content__product">
                <span class="product__label">Name</span>
                <span class="product__label">Price</span>
                <span class="product__label">Img</span>
                <span class="product__label">Detail</span>
                <span class="product__label">Count</span>
                <span class="product__label">Type</span>
                <span class="product__label">Service</span>

            </div>
            <div class="content__list">
                <?php
                foreach ($item as $key => $value) {
                    $json = json_encode($value);
                    echo "<div class='product__item'>
                                     <span class='product__content'>", $value['name'], "</span>
                                     <span class='product__content'>", $value['price'], "</span>
                                     <span class='product__content' img-src='", $value['img'], "' onclick='previewImg(this)'><i class='fa-solid fa-eye'></i></span>
                                     <span class='product__content'>", $value['detail'], "</span>
                                     <span class='product__content'>", $value['count'], "</span>
                                     <span class='product__content'>", $value['type'], "</span>
                                     <span class='product__content'>
                                     <a href='./delete.php?id=", $value["id"], "' >
                                     <i onclick='deleteTour(this);' style='color:black;cursor:pointer;'
                                     class='fa-solid fa-circle-xmark' data-id=", $value['id'], "></i>              
                                     </a>
                                    
                                     <i onclick='showUpdateForm($json)'  style='color:black;cursor:pointer;' class='fa-solid fa-pen' data-id=", $value['id'], "></i>
                                    
                                     </span>
                                 </div>";
                }
                ?>
            </div>
            <!-- <div class="order__detail">
                <div class="order__detail__lab">
                    <span class="orderDetail_label">Driver</span>
                    <span class="orderDetail_label">Vehicle</span>
                    <span class="orderDetail_label">TourGuide</span>
                    <span class="orderDetail_label">Marge</span>
                    <span class="orderDetail_label">People</span>
                    <span class="orderDetail_label">Note</span>
                </div>
                <div class="order__detail__list">
                    <span class="orderDetail_item">Driver</span>
                    <span class="orderDetail_item">Vehicle</span>
                    <span class="orderDetail_item">TourGuide</span>
                    <span class="orderDetail_item">Marge</span>
                    <span class="orderDetail_item">People</span>
                    <span class="orderDetail_item">Note</span>
                </div>
            </div> -->
        </div>
        <!-- CURD -->
        <!-- Add -->
        <div class="modal addtour hideModal">
            <div class="modal_background ">
            </div>
            <div class="modal_body">

                <div class="auth-form">
                    <div class="auth-form_container">

                        <form method="POST" action="create.php" class="auth-form_form">
                            <div class="auth-form_group">
                                <label for="">Name</label>
                                <input type="text" class="auth-form_input title" name="Name" placeholder="Ex: Name">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Price</label>
                                <input type="number" class="auth-form_input price" name="Price" placeholder="Ex: 30000">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Detail</label>
                                <input type="text" class="auth-form_input dayofnumber" name="Detail" placeholder="Ex: Detail">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Count</label>
                                <input type="number" class="auth-form_input description" name="Count" placeholder="Ex: 10">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Type</label>
                                <input type="text" class="auth-form_input description" name="Type" placeholder="Ex: Arrival">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Image</label>
                                <input type="file" name="Image" class="auth-form_input img">
                            </div>

                            <button class="btnSubmit" type="submit" name="submit">Submit</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- update -->
        <div class="modal updateTour hideModal">
            <div class="modal_background ">
            </div>
            <div class="modal_body">

                <div class="auth-form">
                    <div class="auth-form_container">

                        <form method="POST" action="update.php" class="auth-form_form">
                            <?php

                            ?>
                            <input type="hidden" class="auth-form_input id" name="Id">
                            <div class="auth-form_group">
                                <label for="">Name</label>
                                <input type="text" class="auth-form_input name" name="Name" placeholder="Ex: Name">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Price</label>
                                <input type="number" class="auth-form_input price" name="Price" placeholder="Ex: 30000">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Detail</label>
                                <input type="text" class="auth-form_input detail" name="Detail" placeholder="Ex: Detail">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Count</label>
                                <input type="number" class="auth-form_input count" name="Count" placeholder="Ex: 10">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Type</label>
                                <input type="text" class="auth-form_input type" name="Type" placeholder="Ex: Arrival">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Image</label>
                                <input type="file" name="Image" class="auth-form_input img">
                            </div>

                            <button class="btnSubmit" type="submit" name="submit">Submit</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <script src="../assets/js/admin.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>