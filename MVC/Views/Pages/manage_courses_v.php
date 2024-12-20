<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>

</head>

<body>
    <form method="post" action="http://localhost/project_quanlisinhvien/manage_courses/Timkiem">

        <div class="container mt-6">
            <div class="row">
                <div class="col-12">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Quản lý môn học</h2>

                    </div>
                    <div class="form-inline">
                        <label for="myMaMon">Mã Môn: </label>
                        <input type="text" class="form-control1" id="myMaMon" name="txtMaMon" value="<?php if (isset($data['MaMon'])) echo $data['MaMon'] ?>">

                        <label style="margin-left: 1cm; " for="myGiangVien">Giảng viên: </label>
                        <input type="text" class="form-control1" id="myGiangVien" placeholder="" name="txtGiangVien" value="<?php if (isset($data['GiangVien'])) echo $data['GiangVien'] ?>">

                        <button style="margin-left: 1cm; background-color: #26a69a;" type="submit" class="btn btn-primary" name="btnTimkiem">Tìm Kiếm</button>
                        <!-- <button type="submit" class="btn btn-success" name="btndangky" style="margin-left: 230px;">
                           
                        </button> -->
                    </div>
                    <br>
                    <!-- Courses Table -->
                    <div>
                        <table class="table table-bordered table-striped  ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã môn</th>
                                    <th>Tên môn</th>
                                    <th>Số tín chỉ</th>
                                    <th>Giảng viên</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['danhsachmonhoc']) && mysqli_num_rows($data['danhsachmonhoc']) > 0) {
                                    $i = 1; // Đếm số thứ tự
                                    while ($row = mysqli_fetch_assoc($data['danhsachmonhoc'])) {
                                ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?php echo ($row['MaMon']) ?></td>
                                            <td><?php echo ($row['TenMon']) ?></td>
                                            <td><?php echo ($row['SoTinChi']) ?></td>
                                            <td><?php echo ($row['GiangVien']) ?></td>
                                            <td>
                                                <!-- Button to open Edit Modal -->
                                                <a href="#"
                                                    class="edit-link btn btn-primary btn-sm"
                                                    data-id="<?= $row['MaMon'] ?>"
                                                    data-name="<?php echo ($row['TenMon']) ?>"
                                                    data-credits="<?= $row['SoTinChi'] ?>"
                                                    data-lecturer="<?php echo ($row['GiangVien']) ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCourseModal">
                                                    <i class="bi bi-pencil"></i> Sửa

                                                </a>
                                                <!-- Button to delete course -->
                                                <a href="http://localhost/project_quanlisinhvien/manage_courses/delete_course/<?= $row['MaMon'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa môn học này?')">
                                                    <i class="bi bi-trash"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Không có môn học nào.</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="http://localhost/project_quanlisinhvien/manage_courses/add_courses" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Thêm môn học
            </a>
        </div>
    </form>
    <!-- Modal for editing course -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Thêm modal-lg để modal rộng hơn -->
            <div class="modal-content shadow-lg rounded-4"> <!-- Thêm shadow và bo tròn -->
                <div class="modal-header bg-primary text-white"> <!-- Đổi nền header -->
                    <h5 class="modal-title" id="editCourseModalLabel" style="text-align: center;">Edit Course Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Edit course form -->
                    <form action="http://localhost/project_quanlisinhvien/manage_courses/update_course" method="POST">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editCourseId" class="form-label">Course Code</label>
                                <input type="text" class="form-control" id="editCourseId" name="MaMon" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="editCourseName" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="editCourseName" name="TenMon" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="editCourseCredits" class="form-label">Credits</label>
                                <input type="number" class="form-control" id="editCourseCredits" name="SoTinChi" min="1" max="10" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="editCourseLecturer" class="form-label">Lecturer</label>
                                <input type="text" class="form-control" id="editCourseLecturer" name="GiangVien" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and JS bundle (Popper is included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Ensure the modal data is populated when editing
        document.querySelectorAll('.edit-link').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('editCourseId').value = this.getAttribute('data-id');
                document.getElementById('editCourseName').value = this.getAttribute('data-name');
                document.getElementById('editCourseCredits').value = this.getAttribute('data-credits');
                document.getElementById('editCourseLecturer').value = this.getAttribute('data-lecturer');
            });
        });
    </script>
</body>

</html>