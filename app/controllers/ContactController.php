<?php
class ContactController {
    private $categoryModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }
    public function index() {
        session_start();
        include_once 'app/views/users/contact.php';
    }
}