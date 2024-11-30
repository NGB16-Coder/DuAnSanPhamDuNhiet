<?php
class AdminOrderController
{
    public $modelOrder;


    public function __construct()
    {
        $this->modelOrder = new AdminOrder();
    }
    public function listOrder()
    {
        $listOrder = $this->modelOrder->getAllOrder();
        require_once "./views/manageOrder/listOrder.php";
    }

    public function chitietOrder(){
        $order_id = $_GET['id'];
        $chiTietOrder = $this->modelOrder->detailOrder($order_id);
        $listOrder = $this->modelOrder->getAllOrder();
        require_once "./views/manageOrder/chitietOrder.php";
    }

    public function editOrder(){
        $chiTietOrder = $this->modelOrder->detailOrder($order_id);
        $trangThai = $this->modelOrder->editOrder();
        header('location:' . BASE_URL_ADMIN . '?act=chi-tiet-Order&id='.$Order['order_id']);
        exit();
    }

}