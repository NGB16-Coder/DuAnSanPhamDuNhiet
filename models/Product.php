<?php

class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // hàm lấy danh sách all
    public function getAll()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm, tb_size.size_value,tb_size.size_id, sp_bien_the.*
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id
            INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function getProductById($sp_id)
    {
        try {
            $sql = "SELECT san_pham.*, danh_muc.ten_dm, sp_bien_the.spbt_id
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id 
            INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id 
            WHERE san_pham.sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getProductById() '.$e->getMessage();
        }
    }
    public function getVariantProduct($sp_id)
    {
        try {
            $sql = "SELECT tb_size.size_value, sp_bien_the.size_id, sp_bien_the.gia_sp, sp_bien_the.km_sp ,sp_bien_the.so_luong, san_pham.sp_id
            FROM sp_bien_the
            INNER JOIN tb_size ON sp_bien_the.size_id = tb_size.size_id
            INNER JOIN san_pham ON sp_bien_the.sp_id = san_pham.sp_id
            WHERE sp_bien_the.sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getVariantProduct() '.$e->getMessage();
        }
    }
    public function getVariantBySizeId($sp_id, $size_id)
    {
        try {
            $sql = "SELECT sp_bien_the.gia_sp, sp_bien_the.km_sp, sp_bien_the.so_luong, sp_bien_the.size_id
            FROM sp_bien_the
            WHERE sp_bien_the.sp_id = :sp_id AND sp_bien_the.size_id = :size_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id,
                ':size_id' => $size_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getVariantBySizeId() '.$e->getMessage();
        }
    }
    public function getProductCategory($dm_id)
    {
        try {
            $sql = "SELECT san_pham.*, sp_bien_the.* , danh_muc.*
                    FROM san_pham 
                    INNER JOIN danh_muc ON danh_muc.dm_id = san_pham.dm_id
                    INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id
                    WHERE danh_muc.dm_id=:dm_id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':dm_id' => $dm_id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo 'Lỗi getProductCategory() '.$e->getMessage();
        }
    }


    

    // Thêm bình luận
    public function addBinhLuan($tk_id, $sp_id, $noi_dung) {
        try {
            $sql = 'INSERT INTO binh_luan (tk_id, sp_id, noi_dung, ngay_tao, an_hien) 
                    VALUES (:tk_id, :sp_id, :noi_dung, NOW(), 1)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy bình luận theo sản phẩm
    public function getCommentByProduct($sp_id) {
        try {
            $sql = 'SELECT binh_luan.bl_id, binh_luan.noi_dung, binh_luan.ngay_tao, 
                           taikhoan.ho_ten 
                    FROM binh_luan 
                    INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
                    WHERE binh_luan.sp_id = :sp_id AND binh_luan.an_hien = 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

}
