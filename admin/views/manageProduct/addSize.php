<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- End Header -->

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- End Sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><a
                            href="<?= BASE_URL_ADMIN . '?act=listProduct' ?>">Quản
                            Lý Sản Phẩm</a></h1>
                </div>

            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Size Sản Phẩm</h3>

                        </div>
                        <!-- form start -->
                        <form
                            action="<?= BASE_URL_ADMIN .'?act=addSize' ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body row">
                                <input type="number" name="sp_id"
                                    value="<?=$product['sp_id']?>"
                                    readonly hidden>
                                <!-- Tên sản phẩm -->
                                <div class="form-group col-12">
                                    <label for="ten_sp">Tên Sản Phẩm</label>
                                    <input readonly type="text" name="ten_sp" class="form-control" id="ten_sp"
                                        placeholder="Tên Sản Phẩm"
                                        value="<?=$product['ten_sp']?>">
                                    <?php if (isset($_SESSION['error']['ten_sp'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['ten_sp'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Giá -->
                                <div class="form-group col-6">
                                    <label for="gia_sp">Giá Sản Phẩm</label>
                                    <input type="number" name="gia_sp" min="0" class="form-control" id="gia_sp"
                                        placeholder="Giá">
                                    <?php if (isset($_SESSION['error']['gia_sp'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['gia_sp'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Giá khuyến mãi -->
                                <div class="form-group col-6">
                                    <label for="km_sp">Giá Khuyến Mãi</label>
                                    <input type="number" name="km_sp" min="0" class="form-control" id="km_sp"
                                        placeholder="Giá Khuyến Mãi">
                                    <?php if (isset($_SESSION['error']['km_sp'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['km_sp'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Danh mục -->


                                <!-- Ảnh sản phẩm -->

                                <!-- Size -->
                                <div class="form-group col-6">
                                    <label for="size_id">Size</label>
                                    <select class="form-control" name="size_id" id="size_id">
                                        <option selected disabled>Chọn size sản phẩm</option>

                                        <?php foreach ($listSize as $size): ?>
                                        <option
                                            value="<?= $size['size_id'] ?>">
                                            <?= $size['size_value'] ?>
                                        </option>
                                        <?php endforeach; ?>

                                    </select>
                                    <?php if (isset($_SESSION['error']['size_id'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['size_id'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                                <!-- Số lượng -->
                                <div class="form-group col-6">
                                    <label for="so_luong">Số lượng</label>
                                    <input type="number" name="so_luong" min="0" class="form-control" id="so_luong"
                                        placeholder="Số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['so_luong'] ?>
                                    </p>
                                    <?php } ?>
                                </div>
                                <!-- Mô tả -->

                            </div>

                            <!-- Nút submit -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

</html>