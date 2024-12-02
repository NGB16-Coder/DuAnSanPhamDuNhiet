<?php

class ProductController
{
    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function chiTietProduct()
    {
        // Lấy ra thông tin sản phẩm
        $sp_id = (int)$_GET['id'];
        $size_id = (int)$_GET['size_id'];
        $product = $this->product->getProductById($sp_id);
        $variants = $this->product->getVariantProduct($sp_id);
        // var_dump($product['dm_id']);
        // die;
        // Xác định size được chọn
        $selectedSizeId = $size_id ?? $variants[0]['size_id']; // Mặc định là size đầu tiên

        // Lấy thông tin biến thể theo size được chọn
        $selectedVariant = $this->product->getVariantBySizeId($sp_id, $selectedSizeId);
        $productCategory = $this->product->getProductCategory($product['dm_id']);
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($product && $variants) {
            require_once "./views/detailProduct.php";
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }
    public function productCategory()
    {

        // Lấy ra thông tin sản phẩm
        $dm_id = $_GET['id'];
        $productCategory = $this->product->getProductCategory($dm_id);
        // $listProduct = $this->product->getAll();
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($productCategory) {
            require_once "./views/productCategory.php";
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }
}
