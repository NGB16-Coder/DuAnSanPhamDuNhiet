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
                    <th>Mã Đơn Hàng</th>
                    <th>TK ID </th>
                    <th>Địa Chỉ</th>
                    <th>Tên Nhận</th>
                    <th>SĐT</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listOrder as $Order): ?>
                  <tr>
                      <td><?= $Order['order_id']?></td>
                      <td><?= $Order['tk_id']?></td>
                      <td><?= $Order['dia_chi']?></td>
                      <td><?= $Order['ten_nhan']?></td>
                      <td><?= $Order['sdt']?></td>
                      <td><?= $Order['ngay_dat']?></td>
                      <td><?= $Order['tong_so_luong']?></td>
                      <td><?= $Order['trang_thai']?></td>
                      <td><?= $Order['tong_tien']?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-Order&id='.$Order['order_id'] ?>"><button >Chi Tiết</button></a>
                        <a href=""><button>Ẩn</button></a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th>Mã Đơn Hàng</th>
                    <th>TK ID </th>
                    <th>Địa Chỉ</th>
                    <th>Tên Nhận</th>
                    <th>SĐT</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
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