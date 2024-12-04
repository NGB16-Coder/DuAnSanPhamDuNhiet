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
            INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id
            ORDER BY sp_bien_the.ngay_tao';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function getProductById($spbt_id)
    {
        try {
            $sql = "SELECT san_pham.*, danh_muc.ten_dm, sp_bien_the.spbt_id
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id 
            INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id 
            WHERE sp_bien_the.spbt_id = :spbt_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':spbt_id' => $spbt_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getProductById() '.$e->getMessage();
        }
    }
    public function getVariantProduct($spbt_id)
    {
        try {
            $sql = "SELECT tb_size.size_value, sp_bien_the.size_id,sp_bien_the.spbt_id, sp_bien_the.gia_sp, sp_bien_the.km_sp ,sp_bien_the.so_luong, san_pham.sp_id
            FROM sp_bien_the
            INNER JOIN tb_size ON sp_bien_the.size_id = tb_size.size_id
            INNER JOIN san_pham ON sp_bien_the.sp_id = san_pham.sp_id
            WHERE sp_bien_the.sp_id = :spbt_id
            ORDER BY sp_bien_the.size_id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':spbt_id' => $spbt_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getVariantProduct() '.$e->getMessage();
        }
    }
    public function getVariantBySizeId($spbt_id, $size_id)
    {
        try {
            $sql = "SELECT sp_bien_the.gia_sp, sp_bien_the.km_sp, sp_bien_the.so_luong, sp_bien_the.size_id, sp_bien_the.spbt_id
            FROM sp_bien_the
            WHERE sp_bien_the.spbt_id = :spbt_id AND sp_bien_the.size_id = :size_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':spbt_id' => $spbt_id,
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
    public function addBinhLuan($tk_id, $spbt_id, $noi_dung)
    {
        try {
            $sql = 'INSERT INTO binh_luan (tk_id, spbt_id, noi_dung) 
                    VALUES (:tk_id, :spbt_id, :noi_dung)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->bindParam(':spbt_id', $spbt_id, PDO::PARAM_INT);
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy bình luận theo sản phẩm
    public function getCommentByProduct($spbt_id)
    {
        try {
            $sql = 'SELECT binh_luan.bl_id, binh_luan.noi_dung, binh_luan.ngay_tao, 
                           taikhoan.ho_ten 
                    FROM binh_luan 
                    INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
                    WHERE binh_luan.spbt_id = :spbt_id AND binh_luan.an_hien = 1
                    ORDER BY binh_luan.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':spbt_id', $spbt_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    /// chức năng đánh giá sản ph
    public function addEvaluation($tk_id, $spbt_id, $sp_id, $noi_dung, $so_sao)
    {
        try {
            $sql = 'INSERT INTO danh_gia (tk_id, spbt_id, sp_id, noi_dung, so_sao) 
                    VALUES (:tk_id, :spbt_id, :sp_id, :noi_dung, :so_sao)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->bindParam(':spbt_id', $spbt_id, PDO::PARAM_INT);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            $stmt->bindParam(':so_sao', $so_sao, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: addEvaluation' . $e->getMessage();
        }
    }

    // kiểm tra mua hàng
    public function checkUserPurchase($tk_id, $spbt_id)
    {
        try {
            $sql = 'SELECT COUNT(*) AS count
                FROM chi_tiet_don_hang
                JOIN don_hang ON chi_tiet_don_hang.order_id = don_hang.order_id
                WHERE don_hang.tk_id = :tk_id 
                  AND chi_tiet_don_hang.spbt_id = :spbt_id
                  AND don_hang.trang_thai = 3'; // Chỉ kiểm tra các đơn hàng đã giao

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->bindParam(':spbt_id', $spbt_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0; // Trả về true nếu có giao dịch
        } catch (Exception $e) {
            echo 'Lỗi checkUserPurchase(): ' . $e->getMessage();
            return false;
        }
    }


    public function checkUserRated($tk_id, $spbt_id)
    {
        $query = "SELECT * FROM danh_gia WHERE tk_id = :tk_id AND spbt_id = :spbt_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tk_id', $tk_id);
        $stmt->bindParam(':spbt_id', $spbt_id);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Trả về true nếu đã có đánh giá
    }




    // list đánh giá
    public function getEvaluationByProduct($sp_id)
    {
        try {
            $sql = 'SELECT danh_gia.dg_id, danh_gia.noi_dung, danh_gia.so_sao, danh_gia.ngay_tao, 
                           taikhoan.ho_ten 
                    FROM danh_gia 
                    INNER JOIN taikhoan ON danh_gia.tk_id = taikhoan.tk_id
                    WHERE danh_gia.sp_id = :sp_id AND danh_gia.an_hien = 1
                    ORDER BY danh_gia.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: getEvaluationByProduct' . $e->getMessage();
        }
    }

}
