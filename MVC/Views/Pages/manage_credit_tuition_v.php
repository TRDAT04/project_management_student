<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Credit Tuition</title>
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/Home.css">
    <link rel="stylesheet" href="http://localhost/project_quanlisinhvien/Public/Css/bootstrap.min.css">
    <script src="http://localhost/project_quanlisinhvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/project_quanlisinhvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/project_quanlisinhvien/Public/Js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form method="post" action="http://localhost/project_quanlisinhvien/manage_credit_tuition/Timkiem">
        <div class="container mt-6">
            <div class="row">
                <div class="col-12">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Quản lý học phí tín chỉ</h2>
                    </div>

                    <br>
                    <!-- Credit Tuition Table -->
                    <div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Học kỳ</th>
                                    <th>Năm học</th>
                                    <th>Giá tín chỉ</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['danhSachGiaTinChi']) && mysqli_num_rows($data['danhSachGiaTinChi']) > 0) {
                                    while ($row = mysqli_fetch_assoc($data['danhSachGiaTinChi'])) {
                                ?>
                                        <tr>
                                            <td><?php echo ($row['HocKy']) ?></td>
                                            <td><?php echo ($row['NamHoc']) ?></td>
                                            <td><?php echo ($row['GiaTinChi']) ?> VNĐ</td>
                                            <td>
                                                <!-- Button to open Edit Modal -->
                                                <a href="#"
                                                    class="edit-link btn btn-primary btn-sm"
                                                    data-id="<?= $row['HocKy'] ?>"
                                                    data-year="<?= $row['NamHoc'] ?>"
                                                    data-price="<?= $row['GiaTinChi'] ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCreditTuitionModal">
                                                    <i class="bi bi-pencil"></i> Sửa
                                                </a>
                                                <!-- Button to delete Credit tuition -->
                                                <a href="http://localhost/project_quanlisinhvien/manage_credit_tuition/delete_credit_tuition/<?= $row['HocKy'] ?>/<?= $row['NamHoc'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa học phí này?')">
                                                    <i class="bi bi-trash"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Chưa có dữ liệu học phí tín chỉ</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="http://localhost/project_quanlisinhvien/manage_credit_tuition/add_credit_tuition" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Thêm học phí tín chỉ
            </a>
        </div>
    </form>

    <!-- Modal for editing Credit tuition -->
    <div class="modal fade" id="editCreditTuitionModal" tabindex="-1" aria-labelledby="editCreditTuitionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editCreditTuitionModalLabel">Chỉnh sửa học phí tín chỉ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Edit Credit tuition form -->
                    <form action="http://localhost/project_quanlisinhvien/manage_credit_tuition/edit_credit_tuition" method="POST">
                        <div class="mb-3">
                            <label for="editSemester" class="form-label">Học kỳ</label>
                            <input type="text" class="form-control" id="editSemester" name="HocKy" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editYear" class="form-label">Năm học</label>
                            <input type="text" class="form-control" id="editYear" name="NamHoc" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Giá tín chỉ (VNĐ)</label>
                            <input type="number" class="form-control" id="editPrice" name="GiaTinChi" min="1000" required>
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
                document.getElementById('editSemester').value = this.getAttribute('data-id');
                document.getElementById('editYear').value = this.getAttribute('data-year');
                document.getElementById('editPrice').value = this.getAttribute('data-price');
            });
        });
    </script>
</body>

</html>
