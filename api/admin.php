<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="../asserts/img/favicon-32x32.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/api/css/base.css">
    <link rel="stylesheet" href="/api/css/styleAdmin.css">
    <title>Admin</title>
</head>



<body>
    <!-- Header -->

    <div class="header">
        <div class="header__logo">
            <a href="../index.html">
                <img src="../asserts/img/logo3.png" alt="">
            </a>

        </div>
        <ul class="navbar__list">
            <li class="navbar__item">
                <i class="fa-solid fa-share"></i>
                <a href="../index.html">Vào trang web</a>
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
                <!-- <div class="service__search">
                    <input type="text" placeholder="Nhập tên tour" class="service__input">
                    <i class="fa-solid fa-magnifying-glass" onclick="search();"></i>
                </div>

                <button class="service__addtour">Thêm mới</button> -->

            </div>
            <div class="content__product">

            </div>
            <div class="content__list">

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

                        <div class="auth-form_form">
                            <div class="auth-form_group">
                                <label for="">Title</label>
                                <input type="text" class="auth-form_input title" placeholder="Ex: Title">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Price</label>
                                <input type="text" class="auth-form_input price" placeholder="Ex: $30.00">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Day of number</label>
                                <input type="text" class="auth-form_input dayofnumber" placeholder="Ex: 2 Day & 3 Night">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Description</label>
                                <input type="text" class="auth-form_input description" placeholder="Ex: Description">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Image</label>
                                <input type="file" class="auth-form_input img">
                            </div>
                            <div class="auth-form_group">
                                <button class="btnSubmit" onclick="addTour();">Submit</button>
                            </div>
                        </div>
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

                        <div class="auth-form_form">
                            <div class="auth-form_group">
                                <label for="">Title</label>
                                <input type="text" class="auth-form_input title" placeholder="Ex: Title">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Price</label>
                                <input type="text" class="auth-form_input price" placeholder="Ex: $30.00">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Day of number</label>
                                <input type="text" class="auth-form_input dayofnumber" placeholder="Ex: 2 Day & 3 Night">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Description</label>
                                <input type="text" class="auth-form_input description" placeholder="Ex: Description">
                            </div>
                            <div class="auth-form_group">
                                <label for="">Image</label>
                                <input type="file" class="auth-form_input img">
                            </div>
                            <div class="auth-form_group">

                                <button class="btnSubmit" onclick="updateTour();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="./js/admin.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>