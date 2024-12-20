<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/Home.css">
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/bootstrap.min.css">
    <script src="http://localhost/project_quanlisinhvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/project_quanlisinhvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="Public/Js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Student Management</div>
        <nav class="nav">
            <ul>
                <li><a href="http://localhost/project_quanlisinhvien">Trang chủ</a></li>
                <li><a href="#">Hồ Sơ</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Đăng xuất</a></li>
            </ul>
        </nav>
    </header>

    <!-- Layout Container -->
    <div class="layout d-flex">
        <!-- Sidebar -->
        <aside class="bg-dark p-3 text-white" style="width: 250px; height: 100vh; position: fixed;">
            <h5 class="text-light mb-4">Quản Lý</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="http://localhost/project_quanlisinhvien/manage_students" class="nav-link text-white">
                        <i class="bi bi-people"></i> Quản Lí Sinh Viên
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#courseManagement" aria-expanded="false">
                        <i class="bi bi-book"></i> Quản Lí Khóa Học
                    </a>
                    <ul id="courseManagement" class="collapse nav flex-column ms-3 mt-2">
                        <li class="nav-item">
                            <a href="http://localhost/project_quanlisinhvien/manage_courses" class="nav-link text-white">
                                <i class="bi bi-list"></i> Danh Sách Khóa Học
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/project_quanlisinhvien/registration/Get_data" class="nav-link text-white">
                                <i class="bi bi-clipboard"></i> Quản Lí Đăng Kí
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-journal-text"></i> Quản Lí Học Tập
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#tuitionManagement" aria-expanded="false">
                        <i class="bi bi-book"></i> Quản lí học phí
                    </a>
                    <ul id="tuitionManagement" class="collapse nav flex-column ms-3 mt-2">
                        <li class="nav-item">
                            <a href="http://localhost/project_quanlisinhvien/manage_credit_tuition" class="nav-link text-white">
                                <i class="bi bi-list"></i> Học phí tín chỉ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/project_quanlisinhvien/manage_tuition" class="nav-link text-white">
                                <i class="bi bi-clipboard"></i> Quản lí học phí sinh viên
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-person-circle"></i> Quản Lí Tài Khoản
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content p-4" style="margin-left: 250px; width: calc(100% - 250px); padding-bottom: 70px;">
            <?php
            if (isset($data['page'])) {
                include_once './MVC/Views/Pages/' . basename($data['page']) . '.php';
            }
            ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer  text-white text-center py-3 mt-auto" style="position: fixed; bottom: 0; left: 0; width: 100%;">
        <p class="mb-0">&copy; 2024 Student Management System. All rights reserved.</p>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Xác nhận đăng xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn đăng xuất không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a href="http://localhost/project_quanlisinhvien/LoginController/logout" class="btn btn-primary">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>




