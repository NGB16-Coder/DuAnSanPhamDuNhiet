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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            $listProduct = $this->product->loc($_POST['search']);
            // var_dump($listProduct); // In ra mảng sản phẩm
        } else {
            // Nếu không có tìm kiếm, lấy tất cả sản phẩm
            $listProduct = $this->product->getAll();
        }
        $listCategory = $this->category->getAllCategory();
        $listtaikhoan = $this->taikhoan->getAlltaikhoan();

        if (isset($_SESSION['taikhoan']) && !empty($_SESSION['taikhoan'])) {
            $tk_id = null;
            foreach ($listtaikhoan as $value) {
                if ($_SESSION['taikhoan'] === $value['email']) {
                    $tk_id = $value['tk_id'];
                    break;
                }
            }
        } else {
            $tk_id = null;
        }

      
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
            // var_dump($email, $mat_khau);die;
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
            $sp_id = $_POST['sp_id'];
            $this->product->addBinhLuan($tk_id, $sp_id, $noi_dung);
            header('location: '.BASE_URL . '?act=chi-tiet-san-pham&id=' . $spbt_id . '&size_id='.$size_id.'&sp_id='.$sp_id);
            exit;
        } else {
            echo "<script>
            window.history.back();
            </script>";
        }
    }

    // Lấy danh sách bình luận theo sản phẩm
    // public function listCommentByProduct()
    // {
    //     $spbt_id = $_GET['spbt_id'];
    //     session_start();
    //     $listComment = $this->product->getCommentByProduct($spbt_id);
    // }

    // public function listEvaluationByProduct()
    // {
    //     $sp_id = $_GET['sp_id'];
    //     var_dump($sp_id);die;
    //     $listEvaluation = $this->product->getEvaluationByProduct($sp_id);
    //     require_once "./views/detailProduct.php";
    // }

    public function addEvaluation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderDetails = $_POST['orderDetails'];
            $order_id = $_POST['order_id'];
            $tk_id = $_POST['tk_id'];

            if (is_array($orderDetails)) {
                foreach ($orderDetails as $product) {
                    // Lấy dữ liệu từng sản phẩm
                    $spbt_id = $product['spbt_id'];
                    $sp_id = $product['sp_id'];
                    $so_sao = $product['so_sao'];
                    $noi_dung = $product['noi_dung'];
                    // var_dump($spbt_id, $sp_id, $so_sao, $noi_dung, $tk_id, $order_id);
                    // die();
                    $this->product->addEvaluation($tk_id, $spbt_id, $sp_id, $order_id, $noi_dung, $so_sao);
                }
                echo "<script>
                alert('Đánh giá của bạn đã được gửi thành công!');
                window.location.href='" . BASE_URL . "?act=lich-su-don&id=" . $tk_id . "';
                </script>";
                exit;
            } else {
                echo "<script>
                alert('Gửi không thành công!');
                window.history.back();
                </script>";
                exit;
            }

        }
    }

    public function infoAcc()
    {
        $tk_id = $_GET['id'];
        $listCategory = $this->category->getAllCategory();
        $TKById = $this->taikhoan->getTKById($tk_id);
        require_once './views/infoAcc.php';
    }
    public function editInfo()
    {
        $tk_id = $_POST['tk_id'];
        $ho_ten = $_POST['ho_ten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $dia_chi = $_POST['dia_chi'];
        $mat_khau = $_POST['mat_khau'];
        $checkEdit = $this->taikhoan-> editInfo($tk_id, $ho_ten, $sdt, $email, $dia_chi, $mat_khau);
        if ($checkEdit) {
            echo "<script>
                alert('Sửa thông tin thành công!');
                window.location.href='" . BASE_URL . "?act=info-Acc&id=" . $tk_id . "';
                </script>";
            exit;
        } else {
            echo "<script>
                alert('Sửa thông tin thất bại!');
                window.location.href='" . BASE_URL . "?act=info-Acc&id=" . $tk_id . "';
                </script>";
            exit;
        }
    }
}
