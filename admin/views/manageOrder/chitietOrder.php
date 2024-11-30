<!-- Header-->
<?php include './views/layout/header.php' ?>
<!-- EndHeader-->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a
              href="<?= BASE_URL_ADMIN . '?act=listOrder' ?>">Quản Lí Đơn Hàng </a></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID Chi Tiết</th>
                    <th>Mã Đơn</th>
                    <th>ID SPBT</th>
                    <th>Giá Mua</th>
                    <th>Tổng Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đặt</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach($chiTietOrder as $Order) : ?>
                    <tr>
                        <td><?= $Order['ctdh_id']?></td>
                        <td><?= $Order['order_id']?></td>
                        <td><?= $Order['spbt_id']?></td>
                        <td><?= $Order['gia_mua']?></td>
                        <td><?= $Order['so_luong']?></td>
                        <?php
                            if ($Order['trang_thai'] == 1) {
                                $colorAlerts = 'primary';
                            } elseif ($Order['trang_thai'] >= 2 && $Order['trang_thai'] <= 4) {
                                $colorAlerts = 'warning'; // Sửa 'waring' thành 'warning'
                            } elseif ($Order['trang_thai'] == 4) {
                                $colorAlerts = 'success';
                            } 
                            ?>
                            <td 
                            <?php foreach($trangThai as $value):?>
                              <?php endforeach ?>><?=$value['ten_trang_thai']?></td>
                      </td>
                        <td><?= $Order['ngay_tao']?></td>
                        <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=editTrangThai' ?>">Chuyển trạng thái</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID Chi Tiết</th>
                    <th>Mã Đơn</th>
                    <th>ID SPBT</th>
                    <th>Giá Mua</th>
                    <th>Tổng Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đặt</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>

            </div>
            <!-- /.card-body -->


          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- EndFooter -->
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>