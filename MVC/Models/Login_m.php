<?php
class Login_m extends connectDB
{
    public function checkLogin($email, $password)
    {
        // Truy vấn email trong cơ sở dữ liệu
        $sql = "SELECT * FROM users WHERE email = ?";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy kết quả từ truy vấn
        $result = $stmt->get_result();

        // Nếu tìm thấy người dùng với email đó
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // So sánh mật khẩu trực tiếp
            if ($password == $user['password']) {
                return $user; // Đăng nhập thành công
            }
        }

        // Nếu không tìm thấy hoặc mật khẩu sai, trả về false
        return false;
    }
}
