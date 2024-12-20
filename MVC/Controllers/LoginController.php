<?php
class LoginController extends Controller
{

    private $loginModel;

    public function __construct()
    {
        $this->loginModel = $this->model('Login_m');
    }
    function Get_data()
    {
        $this->view(
            'Login_v',

        );
    }


    public function authenticate()
    {
        // Kiểm tra xem người dùng đã nhập thông tin chưa
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu người dùng
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập

            $user = $this->loginModel->checkLogin($email, $password);

            if ($user) {
                // Đăng nhập thành công
                $_SESSION['user'] = $user;
                header('Location: http://localhost/project_quanlisinhvien/Home'); // Chuyển hướng đến trang chủ
            } else {
                // Đăng nhập thất bại, hiển thị thông báo lỗi
                $error = "Email hoặc mật khẩu không chính xác!";

                $this->view('login_v', ['error' => $error]);
            }
        }
    }
    public function logout()
    {
        $this->view(
            'Login_v',

        );
    }
}
