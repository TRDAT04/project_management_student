    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="Public/Css/login.css"> <!-- Custom CSS -->
    </head>

    <body style="background-image: url('Public/Pictures/bg-login.jpg'); background-size: cover; background-position: center;">

        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="login-container bg-white p-5 rounded shadow-lg" style="width: 350px;">
                <h1 class="text-center text-primary mb-4">Đăng nhập</h1>

                <!-- Hiển thị lỗi nếu có -->
                <?php if (!empty($data['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>

                <!-- Form đăng nhập -->
                <form action="http://localhost/project_quanlisinhvien/LoginController/authenticate" method="POST">
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <a href="#" class="text-primary">Quên mật khẩu?</a>
                        <a href="#" class="text-primary">Trợ giúp!</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS (Optional) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>