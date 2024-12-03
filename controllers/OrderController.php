<?php

class OrderController
{
    private $cartModel;
    private $orderModel;
    public $category;
    public $taikhoan;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->orderModel = new OrderModel();
        $this->category = new Category();
        $this->taikhoan = new taikhoan();
    }

    // Phương thức checkout đã có ở bước trước

    public function xacNhanDon()
    {
        $tk_id = $_GET['id'];
        $cartItems = $this->cartModel->getCartItems($tk_id);
        $selectedItems = [];
        // var_dump($_POST['select-product']);

        if (isset($_POST['select-product'])) {
            foreach ($cartItems as $item) {
                if (in_array($item['id'], $_POST['select-product'])) {
                    $selectedItems[] = $item;
                }
            }
        }
        // var_dump($selectedItems);
        // Lưu thông tin đơn hàng
        $order_id = $this->orderModel->createOrder($tk_id, $selectedItems);


        // Xóa sản phẩm đã đặt hàng khỏi giỏ
        foreach ($selectedItems as $item) {
            $this->cartModel->deleteCart($item['id']);
        }
        
        // var_dump($order_id);
        // die;
        // Chuyển đến trang lịch sử đơn hàng
        header('Location: ' . BASE_URL . '?act=lich-su-don&id=' . $tk_id);
        exit;
    }
    
    public function orderHistory()
    {
        $tk_id = $_GET['id'];
        $listCategory = $this->category->getAllCategory();
        $orders = $this->orderModel->getOrdersByUser($tk_id);
        require_once './views/historyOrder.php';
    }

    public function detailOrder()
    {
        $order_id = (int)$_GET['id'];
        $listCategory = $this->category->getAllCategory();
        $detailDonHang = $this->orderModel->getDetailOrder($order_id);
        // var_dump($detailDonHang['tk_id']);die;
        $productDonHang = $this->orderModel->getProductOrder($order_id);
        // var_dump($productDonHang);die;
        if ($detailDonHang && $productDonHang) {
            require_once "./views/chitietOrder.php";
        } else {
            header('location: ' . BASE_URL . '?act=lich-su-don&tk_id='.$detailDonHang['tk_id']);
        }
    }
}
