<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- Start Header Area -->
    <?php
    include "views/layout/header.php"
    ?>
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
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết
                                        <?= $product['ten_sp'] ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= $product['img_sp'] ?>"
                                                alt="product-details" />

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 ms-3">
                                    <div class="product-details-des">
                                        <h2 class="product-name">
                                            <?= $product['ten_sp'] ?>
                                        </h2>
                                        <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>1 Reviews</span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h6>Danh mục:
                                                <b><?= $product['ten_dm'] ?></b>
                                            </h6>
                                        </div>
                                        <p class="pro-desc">
                                            <?= $product['mo_ta'] ? $product['mo_ta'] : "Không có mô tả" ?>
                                        </p>
                                        <form method="POST"
                                            action="<?= BASE_URL . '?act=them-vao-gio-hang' ?>">
                                            <h6 class="option-title">Size:</h6>
                                            <div class="row">
                                                <?php foreach ($variants as $variant): ?>
                                                <button type="button" class="btn btn-info ms-2 size-btn"
                                                    style="width:50px"
                                                    data-size-id="<?= $variant['size_id'] ?>"
                                                    data-price="<?= $variant['gia_sp'] ?>"
                                                    data-discount="<?= $variant['km_sp'] ?>"
                                                    data-stock="<?= $variant['so_luong'] ?>"
                                                    data-spbt-id="<?= $variant['spbt_id'] ?>">
                                                    <?= $variant['size_value'] ?>
                                                </button>
                                                <?php endforeach; ?>
                                            </div>

                                            <input type="hidden" id="selected-spbt-id" name="spbt_id"
                                                value="<?= $selectedVariant['spbt_id'] ?>">
                                            <input type="hidden" id="selected-size-id" name="size_id"
                                                value="<?= $selectedVariant['size_id'] ?>">

                                            <div class="price-box mt-3">
                                                <span id="selected-price" class="price-regular"
                                                    style="font-size: 1.3vw; font-weight:700;color:red">
                                                    <?= number_format($selectedVariant['km_sp'] ?: $selectedVariant['gia_sp']) ?>₫
                                                </span>
                                                <?php if ($selectedVariant['km_sp']): ?>
                                                <span id="original-price"
                                                    style="font-size:1.1vw;text-decoration:line-through;color:grey;">
                                                    <?= number_format($selectedVariant['gia_sp']) ?>₫
                                                </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="quantity-cart-box mt-2">
                                                <h6 class="option-title">Số lượng:</h6>
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" id="quantity-input" name="so_luong"
                                                            value="1" min="1"
                                                            max="<?= $selectedVariant['so_luong'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h6 class="option-title mt-3">Còn:
                                                <span id="selected-stock"
                                                    style="font-weight: 700;"><?= $selectedVariant['so_luong'] ?></span>
                                                sản phẩm
                                            </h6>
                                            <button type="submit" class="btn btn-cart2 mt-2" id="add-to-cart-btn">Thêm
                                                vào giỏ hàng</button>
                                        </form>



                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">SẢN PHẨM LIÊN QUAN</h2>
                            <p class="sub-title">Hãy tham khảo thêm một số mẫu liên quan</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->

                            <?php
    $tempProducts = []; // Mảng để lưu trữ các ID đã hiển thị
    foreach ($productCategory as $product) {
        // Kiểm tra nếu sản phẩm đã được hiển thị
        if (in_array($product['sp_id'], $tempProducts)) {
            continue; // Bỏ qua nếu sản phẩm đã hiển thị
        }
        $tempProducts[] = $product['sp_id'];?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a
                                        href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['sp_id'].'&size_id='.$product['size_id']; ?>">
                                        <img src="<?php echo $product['img_sp']; ?>"
                                            alt="Ảnh sản phẩm" class="img-fluid">
                                        <p style="font-size: 1.3vw; font-weight:700;color:red">
                                            <?php echo number_format($product['km_sp']); ?>₫
                                            <span style="font-size: 1.1vw; text-decoration:line-through;color:gray">
                                                <?php echo number_format($product['gia_sp']); ?>₫
                                            </span>
                                        </p>
                                        <p style="color:burlywood; font-size:1.2vw">
                                            <?php echo $product['ten_sp']; ?>
                                        </p>
                                    </a>
                                </figure>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
      include "views/layout/footer.php"
    ?>
    <!-- footer area end -->

    <!-- JS
============================================ -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeButtons = document.querySelectorAll('.size-btn');
            const selectedPrice = document.getElementById('selected-price');
            const originalPrice = document.getElementById('original-price');
            const selectedStock = document.getElementById('selected-stock');
            const selectedSizeId = document.getElementById('selected-size-id');
            const selectedSpbtId = document.getElementById('selected-spbt-id');
            const quantityInput = document.getElementById('quantity-input');
            const addToCartBtn = document.getElementById('add-to-cart-btn');

            // Xử lý khi chọn size
            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Lấy dữ liệu từ các thuộc tính data-
                    const sizeId = this.dataset.sizeId;
                    const price = parseInt(this.dataset.price);
                    const discount = parseInt(this.dataset.discount || 0);
                    const stock = parseInt(this.dataset.stock);
                    const spbtId = this.dataset.spbtId;

                    // Cập nhật các giá trị trên giao diện
                    selectedSizeId.value = sizeId;
                    selectedSpbtId.value = spbtId;
                    selectedStock.textContent = stock;

                    // Cập nhật giá và giá khuyến mãi
                    if (discount > 0) {
                        selectedPrice.textContent = discount.toLocaleString() + '₫';
                        originalPrice.textContent = price.toLocaleString() + '₫';
                        originalPrice.style.display = 'inline';
                    } else {
                        selectedPrice.textContent = price.toLocaleString() + '₫';
                        originalPrice.style.display = 'none';
                    }

                    // Cập nhật số lượng tối đa cho input số lượng
                    quantityInput.max = stock;
                    quantityInput.value = 1; // Reset số lượng về 1
                    addToCartBtn.disabled = stock === 0; // Vô hiệu hóa nút nếu hết hàng
                });
            });
        });
    </script>
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


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

</html>