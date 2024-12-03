<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lịch sử đơn hàng</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                                    <li class="breadcrumb-item active" aria-current="page">Lịch sử đơn hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row justify-content-center">
                    <!-- Login Content Start -->
                    <div class="col-lg-12 ">
                        <div class="card-body">
                        <?php if (!empty($orders)): ?>
                                <table class="table table-bordered table-striped" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Tổng Số Lượng</th>
                                            <th>Tổng Tiền</th>
                                            <th>Ngày Đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Chi Tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // var_dump($orders);die;
                                        foreach ($orders as $order): ?>
                                            <tr>
                                                <td>#ĐH<?= $order['order_id'] ?></td>
                                                <td><?= $order['tong_so_luong'] ?></td>
                                                <td><?= number_format($order['tong_tien']) ?>₫</td>
                                                <td><?= date('d/m/Y H:i', strtotime($order['ngay_dat'])) ?></td>
                                                <td>
                                                    <?php if($order['trang_thai'] == 1){
                                                        echo'<p class="alert alert-info">Chờ xác nhận</p>';
                                                    }elseif($order['trang_thai'] == 2){
                                                        echo'<p class="alert alert-warning">Đang giao hàng</p>';
                                                    }elseif($order['trang_thai'] == 3){
                                                        echo'<p class="alert alert-success">Đã giao hàng</p>';
                                                    }else{
                                                        echo'<p class="alert alert-danger">Đã hủy</p>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= BASE_URL.'?act=chi-tiet-don-hang&id='.$order['order_id'] ?>" class="btn btn-info">Xem Chi Tiết</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div style="text-align: center; margin: 20px; font-size: 1.5rem; font-weight: bold;">
                                    Bạn chưa có đơn hàng nào.
                                </div>
                            <?php endif; ?>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php include_once "./views/layout/footer.php" ?>
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


<!-- Mirrored from htmldemo.net/corano/corano/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:03 GMT -->

</html>