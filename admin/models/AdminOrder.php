<?php
class AdminOrder
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllOrder()
    {
        try {
            $sql = "SELECT don_hang.*, taikhoan.ho_ten
            FROM don_hang
            INNER JOIN taikhoan ON don_hang.tk_id = taikhoan.tk_id
            ORDER BY don_hang.ngay_tao DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllOrder() '.$e->getMessage();
        }
    }

    public function detailOrder($order_id){
        try {
            $sql = 'SELECT chi_tiet_don_hang.*, sp_bien_the.sp_id, sp_bien_the.size_id, tb_size.size_value, san_pham.ten_sp, chi_tiet_don_hang.so_luong, chi_tiet_don_hang.gia_mua
            FROM chi_tiet_don_hang
            INNER JOIN sp_bien_the ON chi_tiet_don_hang.spbt_id = sp_bien_the.spbt_id
            INNER JOIN san_pham ON sp_bien_the.sp_id = san_pham.sp_id
            INNER JOIN tb_size ON sp_bien_the.size_id = tb_size.size_id
            WHERE chi_tiet_don_hang.order_id = :order_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getdetailOrder() '.$e->getMessage();
        }
    }

    public function editOrder()
    {
        try {
            $sql = "UPDATE chi_tiet_don_hang SET trang_thai= :trang_thai WHERE order_id=:order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":order_id"=>$order_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi editOrderOrder() '.$e->getMessage();
        }
    }

}