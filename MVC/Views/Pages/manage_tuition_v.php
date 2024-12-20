<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tuition</title>
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/Home.css">
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/bootstrap.min.css">
    <script src="http://localhost/project_quanlisinhvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/project_quanlisinhvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/project_quanlisinhvien/Public/Js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form method="post" action="http://localhost/project_quanlisinhvien/manage_tuition/search">
        <div class="container mt-6">
            <div class="row">
                <div class="col-12">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Quản lý học phí sinh viên</h2>
                    </div>

                    <br>
                    <!-- Tuition Table -->
                    <div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã số sinh viên</th>
                                    <th>Mã môn</th>
                                    <th>Học kỳ</th>
                                    <th>Năm học</th>
                                    <th>Tổng học phí</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày thanh toán</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Ghi chú</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['danhSachHocPhi']) && mysqli_num_rows($data['danhSachHocPhi']) > 0) {
                                    while ($row = mysqli_fetch_assoc($data['danhSachHocPhi'])) {
                                ?>
                                        <tr>
                                            <td><?php echo ($row['MaSV']); ?></td>
                                            <td><?php echo ($row['MaMon']); ?></td>
                                            <td><?php echo ($row['HocKy']); ?></td>
                                            <td><?php echo ($row['NamHoc']); ?></td>
                                            <td><?php echo ($row['TongHocPhi']); ?> VNĐ</td>
                                            <td><?php echo ($row['TrangThai']); ?></td>
                                            <td><?php echo ($row['NgayThanhToan']); ?></td>
                                            <td><?php echo ($row['HinhThucThanhToan']); ?></td>
                                            <td><?php echo ($row['GhiChu']); ?></td>
                                            <td>
                                                <!-- Button to open Edit Modal -->
                                                <a href="#"
                                                    class="edit-link btn btn-primary btn-sm"
                                                    data-id="<?php echo $row['MaSV']; ?>"
                                                    data-mamon="<?php echo $row['MaMon']; ?>"
                                                    data-status="<?php echo $row['TrangThai']; ?>"
                                                    data-date="<?php echo $row['NgayThanhToan']; ?>"
                                                    data-method="<?php echo $row['HinhThucThanhToan']; ?>"
                                                    data-note="<?php echo $row['GhiChu']; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editTuitionModal">
                                                    <i class="bi bi-pencil"></i> Sửa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">Chưa có dữ liệu học phí</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal for editing Tuition -->
    <div class="modal fade" id="editTuitionModal" tabindex="-1" aria-labelledby="editTuitionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editTuitionModalLabel">Chỉnh sửa thông tin học phí</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Edit Tuition form -->
                    <form action="http://localhost/project_quanlisinhvien/manage_tuition/edit_tuition" method="POST">
                        <input type="hidden" id="editMaSV" name="MaSV">
                        <input type="hidden" id="editMaMon" name="MaMon">

                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Trạng thái</label>
                            <input type="text" class="form-control" id="editStatus" name="TrangThai" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDate" class="form-label">Ngày thanh toán</label>
                            <input type="date" class="form-control" id="editDate" name="NgayThanhToan">
                        </div>
                        <div class="mb-3">
                            <label for="editMethod" class="form-label">Hình thức thanh toán</label>
                            <input type="text" class="form-control" id="editMethod" name="HinhThucThanhToan">
                        </div>
                        <div class="mb-3">
                            <label for="editNote" class="form-label">Ghi chú</label>
                            <textarea class="form-control" id="editNote" name="GhiChu" rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Ensure the modal data is populated when editing
        document.querySelectorAll('.edit-link').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('editMaSV').value = this.getAttribute('data-id');
                document.getElementById('editMaMon').value = this.getAttribute('data-mamon');
                document.getElementById('editStatus').value = this.getAttribute('data-status');
                document.getElementById('editDate').value = this.getAttribute('data-date');
                document.getElementById('editMethod').value = this.getAttribute('data-method');
                document.getElementById('editNote').value = this.getAttribute('data-note');
            });
        });
    </script>
</body>

</html>
