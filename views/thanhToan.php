<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website bán sản phẩm giữ nhiệt BAĐ</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- Start Header Area -->
    <?php include_once "views/layout/header.php" ?>
    <!-- end Header Area -->


    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="<?= BASE_URL?>"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin thanh toán</h5>
                            <div class="billing-form-wrap">
                                <form
                                    action="<?= BASE_URL.'?act=check-dang-ky' ?>"
                                    method="post">
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Tên đăng nhập" name="ho_ten" value="<?php if (isset($_SESSION['ho_ten'])) {
                                            echo $_SESSION['ho_ten'];
                                        } ?>">
                                        <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger">
                                            <?= $_SESSION['error']['ho_ten'] ?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" placeholder="email@gmail.com" name="email" value="<?php if (isset($_SESSION['email'])) {
                                            echo $_SESSION['email'];
                                        } ?>">
                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger">
                                            <?= $_SESSION['error']['email'] ?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Số điện thoại" name="sdt" value="<?php if (isset($_SESSION['sdt'])) {
                                            echo $_SESSION['sdt'];
                                        } ?>">
                                        <?php if (isset($_SESSION['error']['sdt'])) { ?>
                                        <p class="text-danger">
                                            <?= $_SESSION['error']['sdt'] ?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" placeholder="Địa chỉ nơi trốn" name="dia_chi" value="<?php if (isset($_SESSION['dia_chi'])) {
                                            echo $_SESSION['dia_chi'];
                                        } ?>">
                                        <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                        <p class="text-danger">
                                            <?= $_SESSION['error']['dia_chi'] ?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Tạo tài
                                                    khoản?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Tạo một tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn là khách
                                                hàng quay lại, vui lòng đăng nhập ở đầu trang.</p>

                                            <div class="flex mb">
                                                <div class="col-lg-12">
                                                    <div class="single-input-item">
                                                        <input type="password" placeholder="Mật khẩu" name="mat_khau"
                                                            value="<?php if (isset($_SESSION['mat_khau'])) {
                                                                echo $_SESSION['mat_khau'];
                                                            } ?>">
                                                        <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['mat_khau'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-input-item">
                                                        <input type="password" placeholder="Nhập lại mật khẩu"
                                                            name="remat_khau" value="<?php if (isset($_SESSION['remat_khau'])) {
                                                                echo $_SESSION['remat_khau'];
                                                            } ?>">
                                                        <?php if (isset($_SESSION['error']['remat_khau'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['remat_khau'] ?>
                                                        </p>
                                                        <?php } ?>
                                                        <?php if (isset($_SESSION['error']['checkmat_khau'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['checkmat_khau'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="#">
                                        <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">Họ và tên</label>
                                                <input type="text" id="f_name" placeholder="Họ và tên" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email</label>
                                        <input type="email" id="email" placeholder="Email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" id="phone" placeholder="Số điện thoại" />
                                    </div> -->



                                        <div class="checkout-box-wrap">
                                            <div class="single-input-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="ship_to_different">
                                                    <label class="custom-control-label" for="ship_to_different">Gửi đến
                                                        địa chỉ khác?</label>
                                                </div>
                                            </div>
                                            <div class="ship-to-different single-form-row">
                                                <form
                                                    action="<?= BASE_URL.'?act=check-dang-ky' ?>"
                                                    method="post">
                                                    <div class="single-input-item">
                                                        <input type="text" placeholder="Tên đăng nhập" name="ho_ten"
                                                            value="<?php if (isset($_SESSION['ho_ten'])) {
                                                                echo $_SESSION['ho_ten'];
                                                            } ?>">
                                                        <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['ho_ten'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <input type="email" placeholder="email@gmail.com" name="email"
                                                            value="<?php if (isset($_SESSION['email'])) {
                                                                echo $_SESSION['email'];
                                                            } ?>">
                                                        <?php if (isset($_SESSION['error']['email'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['email'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <input type="text" placeholder="Số điện thoại" name="sdt" value="<?php if (isset($_SESSION['sdt'])) {
                                                            echo $_SESSION['sdt'];
                                                        } ?>">
                                                        <?php if (isset($_SESSION['error']['sdt'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['sdt'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <input type="text" placeholder="Địa chỉ nơi trốn" name="dia_chi"
                                                            value="<?php if (isset($_SESSION['dia_chi'])) {
                                                                echo $_SESSION['dia_chi'];
                                                            } ?>">
                                                        <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                                        <p class="text-danger">
                                                            <?= $_SESSION['error']['dia_chi'] ?>
                                                        </p>
                                                        <?php } ?>
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Tóm tắt đơn hàng của bạn</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Các sản phẩm</th>
                                                <th>Tổng số tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="product-details.html">Suscipit Vestibulum <strong> ×
                                                            1</strong></a>
                                                </td>
                                                <td>$165.00</td>
                                            </tr>
                                            <tr>
                                                <td><a href="product-details.html">Ami Vestibulum suscipit <strong> ×
                                                            4</strong></a>
                                                </td>
                                                <td>$165.00</td>
                                            </tr>
                                            <tr>
                                                <td><a href="product-details.html">Vestibulum suscipit <strong> ×
                                                            2</strong></a>
                                                </td>
                                                <td>$165.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong>$400</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping"
                                                                    class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">Flat
                                                                    Rate: $70.00</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="freeshipping" name="shipping"
                                                                    class="custom-control-input" />
                                                                <label class="custom-control-label"
                                                                    for="freeshipping">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <td><strong>???</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi nhận
                                                    hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <button type="submit" class="btn btn-sqr">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <?php include_once "./views/layout/footer.php" ?>
    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->

</html>