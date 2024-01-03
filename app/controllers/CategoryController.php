<?php
class CategoryController {
    private $categoryModel;
    private $productsModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
        $this->productsModel = new ProductModel($this->db);
    }
    public function product($id) {
        session_start();
        $limit = 12;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $limit;
        $totalPropucts = $this->productsModel->getTotalProductsByCategory($id);
        $totalPages = ceil($totalPropucts / $limit);
        $products = $this->productsModel-> getProductByIdCategoriesPaginated($id, $limit, $offset);
        include_once 'app/views/users/category.php';
    }
}