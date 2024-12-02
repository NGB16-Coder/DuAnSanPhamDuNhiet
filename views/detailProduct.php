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
                                    <!-- <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img1.jpg"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img2.jpg"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img3.jpg"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img4.jpg"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img5.jpg"
                                                alt="product-details" />
                                        </div>
                                    </div> -->
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
                                                    <a href="javascript:void(0)" class="btn btn-info ms-2 size-btn"
                                                        style="width:50px"
                                                        data-size-id="<?= $variant['size_id'] ?>"
                                                        data-price="<?= $variant['gia_sp'] ?>"
                                                        data-stock="<?= $variant['so_luong'] ?>">
                                                        <?= $variant['size_value'] ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>

                                            <input type="hidden" name="spbt_id"
                                                value="<?= $product['spbt_id'] ?>">
                                            <input type="hidden" id="selected-size-id" name="size_id"
                                                value="<?= $selectedVariant['size_id'] ?>">
                                            <input type="hidden" name="so_luong" value="1">

                                            <div class="price-box">
                                                <span id="selected-price" class="price-regular"
                                                    style="font-size: 1.3vw; font-weight:700;color:red">
                                                    <?= number_format($selectedVariant['gia_sp']) ?>₫
                                                </span>

                                                <h6 class="option-title mt-3">Còn:
                                                    <span id="selected-stock"
                                                        style="font-weight: 700;"><?= $selectedVariant['so_luong'] ?></span>
                                                    sản phẩm
                                                </h6>
                                            </div>

                                            <button type="submit" class="btn btn-cart2">Thêm vào giỏ hàng</button>
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

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">Xem Đánh Giá</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">Xem Bình Luận</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">Bình Luận</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                        fringilla augue nec est tristique auctor. Ipsum metus feugiat
                                                        sem, quis fermentum turpis eros eget velit. Donec ac tempus
                                                        ante. Fusce ultricies massa massa. Fusce aliquam, purus eget
                                                        sagittis vulputate, sapien libero hendrerit est, sed commodo
                                                        augue nisi non neque.Cras neque metus, consequat et blandit et,
                                                        luctus a nunc. Etiam gravida vehicula tellus, in imperdiet
                                                        ligula euismod eget. Pellentesque habitant morbi tristique
                                                        senectus et netus et malesuada fames ac turpis egestas. Nam
                                                        erat mi, rutrum at sollicitudin rhoncus</p>
                                                </div>
                                            </div>

                                            <!-- Phần hiển thị comment -->
                                            <div class="tab-pane fade" id="tab_two">
                                                <div class="tab-comments mt-4">
                                                    <h6 class="text-secondary mb-3">
                                                        <i class="bi bi-chat-left-text-fill me-2"></i>Danh sách bình luận
                                                    </h6>
                                                    <table class="table table-bordered">
                                                    <thead>
                                                            <tr>
                                                            
                                                            <th scope="col">Nội Dung</th>
                                                            <th scope="col">Người Bình Luận</th>
                                                            <th scope="col">Ngày Bình Luận</th>
                                                            </tr>
                                                    </thead>  
                                                        <tbody>
                                                            <?php if (!empty($listComment)): ?>
                                                                <?php foreach ($listComment as $index => $comment): ?>
                                                                    <tr>
                                                                        
                                                                        <td scope="row"><?php echo htmlspecialchars($comment['noi_dung']); ?></td>
                                                                        <td scope="row"><?php echo htmlspecialchars($comment['ho_ten']); ?></td>
                                                                        <td scope="row">
                                                                            <span >
                                                                                <?php echo date('d-m-Y', strtotime($comment['ngay_tao'])); ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-danger">
                                                                        <i class="bi bi-exclamation-circle-fill"></i> Không có bình luận nào!
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>

    
                                                </div>

                                            </div>

                                            <!-- Phần Người Dùng Comment -->
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="<?php echo BASE_URL . '?act=addBinhLuan'; ?>" method="POST" class="review-form">
                                                    <input type="hidden" name="sp_id" value="<?php echo $sp_id; ?>"> <!-- Gửi ID sản phẩm -->

                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label">
                                                                <span class="text-danger">*</span> Nội dung bình luận
                                                            </label>
                                                            <textarea name="noi_dung" class="form-control" rows="3" placeholder="Nhập bình luận của bạn..." required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="buttons mt-3">
                                                        <button class="btn btn-sqr btn-primary" type="submit">Gửi bình luận</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
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
                                $tempProducts[] = $product['sp_id']; ?>
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a
                                            href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['sp_id'] . '&size_id=' . $product['size_id']; ?>">
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

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/coc1.png" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
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
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/12/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                        diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <script>
        document.querySelectorAll('.size-btn').forEach(button => {
            button.addEventListener('click', function() {
                const sizeId = this.getAttribute('data-size-id');
                const price = this.getAttribute('data-price');
                const stock = this.getAttribute('data-stock');

                // Cập nhật giá trị vào input hidden
                document.getElementById('selected-size-id').value = sizeId;

                // Cập nhật giá và số lượng còn lại trên giao diện
                document.getElementById('selected-price').innerText = new Intl.NumberFormat().format(
                    price) + '₫';
                document.getElementById('selected-stock').innerText = stock;
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