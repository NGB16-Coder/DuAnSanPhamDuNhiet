<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giới thiệu</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Start Header Area -->
    <?php include_once "views/layout/header.php" ?>
    <!-- end Header Area -->


    <main>
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
                                    <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <div class="checkout-billing-details-wrap">
                    <div class="billing-form-wrap mt-3">
                        <div class="single-input-item">
                            <label for="ho_ten">Họ và tên</label>
                            <input type="text" placeholder="Tên đăng nhập" name="ho_ten"
                                value="<?= $TKById['ho_ten'] ?>"
                                readonly>
                        </div>
                        <div class="single-input-item">
                            <label for="email">Email</label>
                            <input type="email" placeholder="email@gmail.com" name="email"
                                value="<?= $TKById['email'] ?>"
                                readonly>

                        </div>
                        <div class="single-input-item">
                            <label for="mat_khau">Mật khẩu</label>
                            <input type="password" placeholder="email@gmail.com" name="mat_khau"
                                value="<?= $TKById['mat_khau'] ?>"
                                readonly>

                        </div>
                        <div class="single-input-item">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" placeholder="Số điện thoại" name="sdt"
                                value="<?= $TKById['sdt'] ?>"
                                readonly>
                        </div>
                        <div class="single-input-item">
                            <label for="dia_chi">Địa chỉ nơi trốn</label>
                            <input type="text" placeholder="Địa chỉ nơi trốn" name="dia_chi"
                                value="<?= $TKById['dia_chi'] ?>"
                                readonly>
                        </div>


                        <div class="checkout-box-wrap">
                            <div class="single-input-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                    <label class="custom-control-label" for="ship_to_different">Sửa thông tin?</label>
                                </div>
                            </div>
                            <form action="<?= BASE_URL . '?act=edit-thong-tin' ?>" method="post">
                                <div class="ship-to-different single-form-row">
                                    <div class="billing-form-wrap mt-3">
                                        <div class="single-input-item">
                                            <label for="ho_ten">Họ và tên</label>
                                            <input type="text" placeholder="Tên đăng nhập" name="ho_ten"
                                                value="<?= $TKById['ho_ten'] ?>">
                                                <input type="hidden" name="tk_id" value="<?= $tk_id ?>">
                                        </div>
                                        <div class="single-input-item">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="email@gmail.com" name="email"
                                                value="<?= $TKById['email'] ?>">

                                        </div>
                                        <div class="single-input-item">
                                            <label for="mat_khau">Mật khẩu</label>
                                            <input type="text" placeholder="email@gmail.com" name="mat_khau"
                                                value="<?= $TKById['mat_khau'] ?>">

                                        </div>
                                        <div class="single-input-item">
                                            <label for="sdt">Số điện thoại</label>
                                            <input type="text" placeholder="Số điện thoại" name="sdt"
                                                value="<?= $TKById['sdt'] ?>">
                                        </div>
                                        <div class="single-input-item">
                                            <label for="dia_chi">Địa chỉ nơi trốn</label>
                                            <input type="text" placeholder="Địa chỉ nơi trốn" name="dia_chi"
                                                value="<?= $TKById['dia_chi'] ?>">
                                        </div>
                                        <p class="d-flex justify-content-center mt-2">
                                            <button type="submit" style="text-decoration: none; font-size:1.2vw"
                                                class="btn btn-success">Sửa</button>
                                        </p>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php include_once "views/layout/footer.php" ?>
    <!-- footer area end -->

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


<!-- Mirrored from htmldemo.net/corano/corano/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:03 GMT -->

</html>