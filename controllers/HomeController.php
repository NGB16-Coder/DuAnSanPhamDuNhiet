<?php


class HomeController
{
    public $product;
    public $category;
    public $taikhoan;
    private $cartModel;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->taikhoan = new taikhoan();
        $this->cartModel = new CartModel();

    }
    public function trangchu()
    {
        $listProduct = $this->product->getAll();
        $listCategory = $this->category->getAllCategory();
        // var_dump($listCategory);
        // die;
        require_once './trangchu.php';
    }
    public function gioiThieu()
    {
        $listCategory = $this->category->getAllCategory();
        require_once './views/gioiThieu.php';
    }

    public function formDangNhap()
    {
        $listCategory = $this->category->getAllCategory();
        require_once './views/formdangnhap.php';
        deleteSessionError();
    }

    public function dangNhap()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy email và pass gửi lên form
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            // var_dump($email);die;
            // Ghi nhớ tài khoản
            if (isset($_POST['rememberMe'])) {
                setcookie("email", $email, time() + 86400 * 7);
                setcookie("mat_khau", $mat_khau, time() + 86400 * 7);
            }

            // Kiểm tra thông tin đăng nhập
            $taikhoan = $this->taikhoan->checkLogin($email, $mat_khau);
            // var_dump($taikhoan);
            // die;
            if ($taikhoan === $email) { // đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['taikhoan_admin'] = $taikhoan;
                // var_dump($_SESSION['taikhoan_admin']);die;
                header('location:'. BASE_URL_ADMIN);
                exit();
            } elseif ($taikhoan == 'Trang client') {
                $_SESSION['taikhoan'] = $email;
                header('location:'. BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['error'] = $taikhoan;

                $_SESSION['flash'] = true;
                header('location:'.BASE_URL . '?act=dang-nhap');
                exit();
            }
        }
        deleteSessionError();
    }

    public function formDangKy()
    {
        $listCategory = $this->category->getAllCategory();
        require_once './views/formdangky.php';
        deleteSessionError();
    }

    public function dangKy()
    {

        $listtaikhoan = $this->taikhoan->getAlltaikhoan();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $mat_khau = $_POST['mat_khau'];
            $remat_khau = $_POST['remat_khau'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Vui lòng nhập tên đăng nhập!';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập Email!';
            }
            if (empty($sdt)) {
                $errors['sdt'] = 'Vui lòng nhập số điện thoại!';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Vui lòng nhập địa chỉ nơi trú!';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu!';
            }
            if (empty($remat_khau)) {
                $errors['remat_khau'] = 'Vui lòng nhập lại mật khẩu!';
            } elseif ($mat_khau !== $remat_khau) {
                $errors['checkmat_khau'] = 'Mật khẩu không giống nhau';
            }

            // lưu input vào session khi lỗi không cần nhập lại
            $_SESSION['ho_ten'] = $ho_ten;
            $_SESSION['email'] = $email;
            $_SESSION['sdt'] = $sdt;
            $_SESSION['dia_chi'] = $dia_chi;
            $_SESSION['mat_khau'] = $mat_khau;
            $_SESSION['remat_khau'] = $remat_khau;

            // Kiểm tra xem đã tồn tại email hoặc sdt chưa
            foreach ($listtaikhoan as $taikhoan) {
                $taikhoan['email'];
                $taikhoan['sdt'];
                if ($email === $taikhoan['email']) {
                    $errors['email'] = 'Email đã được đăng ký!';
                }
                if ($sdt === $taikhoan['sdt']) {
                    $errors['sdt'] = 'Số điện thoại đã được đăng ký';
                }
            }

            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm

                $this->taikhoan->inserttaikhoan($ho_ten, $email, $sdt, $dia_chi, $mat_khau);
                session_unset();
                session_destroy();
                echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="?act=dang-nhap";</script>';
                exit();

            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL . '?act=dang-ky');
                exit();


            }
        }
    }

    public function logout()
    {
        require_once './views/logout.php';
    }
    public function xoaCookie()
    {
        require_once './views/xoaCookie.php';
    }
    public function lienHe()
    {
        $listCategory = $this->category->getAllCategory();
        require_once './views/lienhe.php';

    }
    public function thanhToan()
    {
        $listCategory = $this->category->getAllCategory();
        $tk_id = $_GET['id'];
        $TKById = $this->taikhoan->getTKById($tk_id);
        $cartItems = $this->cartModel->getCartItems($tk_id);
        $selectedItems = [];
        foreach ($cartItems as $item) {
            if (isset($_POST['select-product']) && in_array($item['id'], $_POST['select-product'])) {
                $selectedItems[] = $item;
            }
        }
        // var_dump($selectedItems);die;
        // var_dump($TKById);die;
        require_once './views/thanhToan.php';
        deleteSessionError();
    }

    /// chuc nang binh luan
    // thêm bình luận


    // Thêm bình luận
    public function addBinhLuan()
    {

        if (!isset($_SESSION['taikhoan'])) {
            echo "<script>alert('Vui lòng đăng nhập để bình luận!'); window.location.href='" . BASE_URL . "?act=dang-nhap';</script>";
            exit;
        }

        $listtaikhoan = $this->taikhoan->getAlltaikhoan();
        $tk_id = null;

        foreach ($listtaikhoan as $value) {
            if ($_SESSION['taikhoan'] == $value['email']) {
                $tk_id = $value['tk_id'];
                break;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $spbt_id = $_POST['spbt_id'];
            $size_id = $_POST['size_id'];
            $noi_dung = $_POST['noi_dung'];

            $this->product->addBinhLuan($tk_id, $spbt_id, $noi_dung);
            header('location: '.BASE_URL . '?act=chi-tiet-san-pham&id=' . $spbt_id . '&size_id='.$size_id);
            exit;
        }
    }

    // Lấy danh sách bình luận theo sản phẩm
    public function listCommentByProduct()
    {
        $spbt_id = $_GET['$id'];
        session_start();
        $listComment = $this->product->getCommentByProduct($spbt_id);
    }

    // Lấy danh sách đánh giá theo sản phẩm
    public function listEvaluationByProduct()
    {
        $sp_id = $_GET['id']; // Lấy ID sản phẩm từ query string
        session_start();
        $listEvaluation = $this->product->getEvaluationByProduct($sp_id); // Gọi model để lấy đánh giá
        require_once "./views/detailProduct.php"; // Chuyển dữ liệu qua view
    }

    // đánh giá
    public function addEvaluation()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['taikhoan'])) {
            echo "<script>
                alert('Vui lòng đăng nhập để đánh giá!');
                window.location.href='" . BASE_URL . "?act=dang-nhap';
              </script>";
            exit;
        }

        // Lấy thông tin tài khoản từ phiên đăng nhập
        $listtaikhoan = $this->taikhoan->getAlltaikhoan();
        $tk_id = null;

        foreach ($listtaikhoan as $value) {
            if ($_SESSION['taikhoan'] == $value['email']) {
                $tk_id = $value['tk_id'];
                break;
            }
        }

        if ($tk_id === null) {
            echo "<script>
                alert('Tài khoản không hợp lệ!');
                window.location.href='" . BASE_URL . "';
              </script>";
            exit;
        }

        // Xử lý khi người dùng gửi đánh giá qua form (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $spbt_id = $_POST['spbt_id'];           // Lấy ID sản phẩm từ form
            $noi_dung = $_POST['noi_dung'];         // Lấy nội dung đánh giá từ form
            $so_sao = $_POST['rating'];             // Lấy số sao từ form
            $size_id = $_POST['size_id'];
            $sp_id = $_POST['sp_id'];
            $size_sp = $_POST['size_sp'];
            if (empty($spbt_id) || empty($noi_dung) || empty($so_sao)) {
                echo "<script>
                    alert('Vui lòng nhập đầy đủ thông tin!');
                    window.location.href='" . BASE_URL . "?act=chi-tiet-san-pham&id=" . $sp_id . '&size_id='.$size_sp. "'; 
                  </script>";
                exit;
            }

            // Kiểm tra người dùng đã mua sản phẩm chưa
            $hasPurchased = $this->product->checkUserPurchase($tk_id, $spbt_id);
            if (!$hasPurchased) {
                echo "<script>
                    alert('Bạn chỉ có thể đánh giá sản phẩm mà bạn đã mua!');
                    window.location.href='" . BASE_URL . "?act=chi-tiet-san-pham&id=" . $sp_id .'&size_id='.$size_sp.  "';
                  </script>";
                exit;
            }

            // Kiểm tra người dùng đã đánh giá sản phẩm này chưa
            $hasRated = $this->product->checkUserRated($tk_id, $spbt_id);
            if ($hasRated) {
                echo "<script>
                     alert('Bạn đã đánh giá sản phẩm này trước đó!');
                     window.location.href='" . BASE_URL . "?act=chi-tiet-san-pham&id=" . $sp_id . '&size_id='.$size_sp. "'; 
                   </script>";
                exit;
            }
            // var_dump($spbt_id);var_dump($so_sao);var_dump($tk_id);var_dump($sp_id);var_dump($size_sp);die;

            // Thêm đánh giá vào cơ sở dữ liệu
            $this->product->addEvaluation($tk_id, $spbt_id, $sp_id, $noi_dung, $so_sao);

            // Quay lại trang chi tiết sản phẩm
            header('location: ' . BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp_id . '&size_id='.$size_sp);
            exit;
        }
    }
}
