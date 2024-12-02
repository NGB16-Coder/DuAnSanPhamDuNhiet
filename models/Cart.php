<?php

class CartModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addToCart($tk_id, $spbt_id, $size_id, $so_luong)
    {
        try {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $sql = "SELECT * FROM gio_hang WHERE tk_id = :tk_id AND spbt_id = :spbt_id AND size_id = :size_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':spbt_id' => $spbt_id,
                ':size_id' => $size_id,
            ]);
            $existingCartItem = $stmt->fetch();

            // var_dump($existingCartItem);die;
            if ($existingCartItem['spbt_id'] == $spbt_id) {
                if ($existingCartItem['size_id'] == $size_id) {
                    // var_dump($existingCartItem);var_dump($existingCartItem['size_id']); die;
                    // Nếu đã tồn tại size rồi thì tăng số lượng
                    $sql = "UPDATE gio_hang SET so_luong = so_luong + :so_luong WHERE id = :id AND size_id= :size_id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        ':so_luong' => $so_luong,
                        ':size_id' => $size_id,
                        ':id' => $existingCartItem['id']
                    ]);
                } else {
                    // die;
                    // Nếu chưa tồn tại, thêm mới size
                    $sql = "INSERT INTO gio_hang (spbt_id, size_id, tk_id, so_luong) VALUES (:spbt_id, :size_id, :tk_id, :so_luong)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        ':spbt_id' => $spbt_id,
                        ':size_id' => $size_id,
                        ':tk_id' => $tk_id,
                        ':so_luong' => $so_luong
                    ]);
                }
            } else {
                // Nếu chưa tồn tại, thêm mới
                $sql = "INSERT INTO gio_hang (spbt_id, size_id, tk_id, so_luong) VALUES (:spbt_id, :size_id, :tk_id, :so_luong)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':spbt_id' => $spbt_id,
                    ':size_id' => $size_id,
                    ':tk_id' => $tk_id,
                    ':so_luong' => $so_luong
                ]);
            }
            return true;
        } catch (Exception $e) {
            echo 'Lỗi addToCart(): ' . $e->getMessage();
            return false;
        }
    }

    public function getCartItems($tk_id)
    {
        try {
            $sql = "SELECT gio_hang.*,san_pham.img_sp, san_pham.ten_sp, sp_bien_the.gia_sp, sp_bien_the.km_sp, tb_size.size_value
                    FROM gio_hang
                    INNER JOIN sp_bien_the ON gio_hang.spbt_id = sp_bien_the.spbt_id
                    INNER JOIN san_pham ON san_pham.sp_id = sp_bien_the.spbt_id
                    INNER JOIN tb_size ON gio_hang.size_id = tb_size.size_id
                    WHERE tk_id = :tk_id
                    ORDER BY san_pham.ten_sp";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getCartItems(): ' . $e->getMessage();
        }
    }

}
