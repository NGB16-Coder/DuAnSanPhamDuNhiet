<?php

class OrderModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function createOrder($tk_id, $items)
    {
        try {
            $totalQuantity = 0;
            $totalAmount = 0;
            foreach ($items as $item) {
                $totalQuantity += $item['so_luong'];
                $totalAmount += $item['km_sp'] * $item['so_luong'];
            }

            $sql = "INSERT INTO don_hang (tk_id, tong_so_luong, tong_tien) VALUES (:tk_id, :totalQuantity, :totalAmount)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':totalQuantity' => $totalQuantity,
                ':totalAmount' => $totalAmount
            ]);
            $order_id = $this->conn->lastInsertId();
            //chi tiết đơn hàng
            foreach ($items as $item) {
                $sqlDetail = "INSERT INTO chi_tiet_don_hang ( order_id, spbt_id, so_luong_mua, gia_mua) VALUES (:order_id, :spbt_id, :so_luong_mua, :gia_mua)";
                $stmtDetail = $this->conn->prepare($sqlDetail);
                $stmtDetail->execute([
                    ':order_id' => $order_id,
                    ':spbt_id' => $item['spbt_id'],
                    ':so_luong_mua' => $item['so_luong'],
                    ':gia_mua' => $item['km_sp']
                ]);
            }
            // Giảm số lượng tồn kho
            $sql = "UPDATE sp_bien_the SET so_luong = so_luong - :so_luong WHERE spbt_id = :spbt_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong' => $item['so_luong'],
                ':spbt_id' => $item['spbt_id'],
            ]);
            // var_dump($order_id);
            return $order_id;
        } catch (Exception $e) {
            echo 'Lỗi createOrder(): ' . $e->getMessage();
            return false;
        }
    }

    public function getOrdersByUser($tk_id)
    {
        try {
            $sql = "SELECT * FROM don_hang WHERE tk_id = :tk_id ORDER BY ngay_dat DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tk_id' => $tk_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getOrdersByUser Id(): ' . $e->getMessage();
        }
    }

    public function getDetailOrder($order_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hang.ctdh_id, chi_tiet_don_hang.order_id, chi_tiet_don_hang.gia_mua, chi_tiet_don_hang.ngay_tao ,taikhoan.*,don_hang.*
                    FROM don_hang
                    INNER JOIN chi_tiet_don_hang ON chi_tiet_don_hang.order_id = don_hang.order_id
                    INNER JOIN taikhoan ON taikhoan.tk_id = don_hang.tk_id
                    WHERE chi_tiet_don_hang.order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailOrder() '.$e->getMessage();
        }
    }

    public function getProductOrder($order_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hang.ctdh_id,chi_tiet_don_hang.order_id,chi_tiet_don_hang.spbt_id,chi_tiet_don_hang.gia_mua,chi_tiet_don_hang.so_luong_mua, tb_size.size_value, san_pham.ten_sp
                    FROM chi_tiet_don_hang
                    INNER JOIN sp_bien_the ON chi_tiet_don_hang.spbt_id = sp_bien_the.spbt_id
                    INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id
                    INNER JOIN san_pham ON sp_bien_the.sp_id = san_pham.sp_id
                    WHERE chi_tiet_don_hang.order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getProductOrder() '.$e->getMessage();
        }
    }
}
