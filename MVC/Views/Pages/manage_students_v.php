<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>

</head>

<body>
    <form method="post" action="http://localhost/project_quanlisinhvien/manage_students/Timkiem">

        <div class="container mt-4">
            <h2 class="mb-4">Quản lí sinh viên</h2>
            <!-- Table for displaying students -->

            <div class="form-inline">
                <label for="myMasv">Mã Sinh Viên: </label>
                <input type="text" class="form-control1" id="myMasv" name="txtMasv" value="<?php if (isset($data['Masv'])) echo $data['Masv'] ?>">

                <label style="margin-left: 1cm; " for="myname">Họ và tên: </label>
                <input type="text" class="form-control1" id="myname" placeholder="" name="txtname" value="<?php if (isset($data['name'])) echo $data['name'] ?>">

                <button style="margin-left: 1cm; background-color: #26a69a;" type="submit" class="btn btn-primary" name="btnTimkiem">Tìm Kiếm</button>
                <!-- <button type="submit" class="btn btn-success" name="btnXuatExcel" style="margin-left: 230px;">
                    Xuất Excel
                </button> -->
            </div>
            <br>
            <table class="table table-hover table-bordered table-striped align-middle ">
                <thead class="table">
                    <tr>
                        <th>#</th>
                        <th>Mã sinh viên</th>
                        <th>Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Quê Quán</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['danhsachsinhvien']) && mysqli_num_rows($data['danhsachsinhvien']) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($data['danhsachsinhvien'])) {
                    ?>
                            <tr>
                                <td><?php echo (++$i); ?></td>
                                <td><?php echo $row['MaSoSV']; ?></td>
                                <td><?php echo $row['HoTen']; ?></td>
                                <td><?php echo $row['NgaySinh']; ?></td>
                                <td><?php echo $row['GioiTinh']; ?></td>
                                <td><?php echo $row['QueQuan']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['SoDienThoai']; ?></td>
                                <td>
                                    <a href="#"
                                        class="edit-link btn btn-sm btn-primary"
                                        data-id="<?php echo $row['MaSoSV']; ?>"
                                        data-name="<?php echo $row['HoTen']; ?>"
                                        data-email="<?php echo $row['Email']; ?>"
                                        data-phone="<?php echo $row['SoDienThoai']; ?>"
                                        data-address="<?php echo $row['QueQuan']; ?>"
                                        data-dob="<?php echo $row['NgaySinh']; ?>"
                                        data-gender="<?php echo $row['GioiTinh']; ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal">Sửa</a>
                                    <a href="http://localhost/project_quanlisinhvien/manage_students/delete_student/<?php echo $row['MaSoSV']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                                    <a href="http://localhost/project_quanlisinhvien/registration/viewRegisteredCourses/<?php echo $row['MaSoSV']; ?>"
                                        class="btn btn-sm btn-info">Môn học</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9" class="text-center text-danger">Không tìm thấy sinh viên nào</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="http://localhost/project_quanlisinhvien/manage_students/addstudent" class="btn btn-success">Thêm Sinh Viên</a>
        </div>
    </form>
    <!-- Modal for edit student -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Thêm modal-lg để modal rộng hơn -->
            <div class="modal-content shadow-lg rounded-4"> <!-- Thêm shadow và bo tròn -->
                <div class="modal-header bg-primary text-white"> <!-- Đổi nền header -->
                    <h5 class="modal-title" id="editModalLabel" style="text-align: center;">Edit Student Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Edit student form -->
                    <form action="http://localhost/project_quanlisinhvien/manage_students/edit_student" method="POST">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editStudentId" class="form-label">Mã Sinh Viên</label>
                                <input type="text" class="form-control" id="editStudentId" name="studentId" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="editStudentName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editStudentName" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editStudentDob" class="form-label">Ngày Sinh</label>
                                <input type="date" class="form-control" id="editStudentDob" name="dob" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="editStudentGender" class="form-label">Giới Tính</label>
                                <select class="form-select" id="editStudentGender" name="gender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editStudentAddress" class="form-label">Quê Quán</label>
                                <input type="text" class="form-control" id="editStudentAddress" name="address" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="editStudentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editStudentEmail" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editStudentPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="editStudentPhone" name="phone" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Save Changes</button> <!-- Đổi màu nút -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        // Ensure the modal data is populated when editing
        document.querySelectorAll('.edit-link').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('editStudentId').value = this.getAttribute('data-id');
                document.getElementById('editStudentName').value = this.getAttribute('data-name');
                document.getElementById('editStudentDob').value = this.getAttribute('data-dob');
                document.getElementById('editStudentGender').value = this.getAttribute('data-gender');
                document.getElementById('editStudentAddress').value = this.getAttribute('data-address');
                document.getElementById('editStudentEmail').value = this.getAttribute('data-email');
                document.getElementById('editStudentPhone').value = this.getAttribute('data-phone');
            });
        });
    </script>
</body>

</html>