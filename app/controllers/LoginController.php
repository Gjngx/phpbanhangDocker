<?php
class LoginController
{
    private $adminModel;
    private $roleModel;
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->adminModel = new AdminModel($this->db);
        $this->roleModel = new RoleModel($this->db);
    }
    public function index()
    {
        session_start();
        include_once 'app/views/admin/login.php';
    }
    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            session_start();
            if (empty($username)) {
                $_SESSION['errorMessage'] = "Vui lòng điền tài khoản!";
                header('Location: /login');
            } elseif (empty($password)) {
                $_SESSION['errorMessage'] = "Vui lòng điền mật khẩu!";
                header('Location: /login');
            } else {
                $account = $this->adminModel->getAccountByUsername($username);
                if ($account) {;
                    $pwd_hashed = $account->password;
                    if (password_verify($password, $pwd_hashed)) {
                        $_SESSION['user_id'] = $account->id;
                        $_SESSION['user_idrole'] = $account->id_role;
                        $_SESSION['username'] = $account->username;
                        header('Location: /admin');
                        exit;
                    } else {
                        $_SESSION['errorMessage'] = "Đăng nhập không thành công.";
                        header('Location: /login');
                    }
                } else {
                    $_SESSION['errorMessage'] = "Đăng nhập không thành công.";
                    header('Location: /login');
                }
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_idrole']);
        unset($_SESSION['username']);
        header("Location: /login");
        exit();
    }
}
