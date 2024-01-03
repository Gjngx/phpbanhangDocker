<?php
class DefaultController {
    private $productsModel;private $categoryModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productsModel = new ProductModel($this->db);
        $this->categoryModel = new CategoryModel($this->db);
    }
    public function index() {
        $products = $this->productsModel-> getNewestProducts();
        session_start();
        include_once 'app/views/users/index.php';
    }
}