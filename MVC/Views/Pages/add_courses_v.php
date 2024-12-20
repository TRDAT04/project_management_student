<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Page Header -->
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Thêm Môn Học</h3>
                </div>
                <div class="card-body">
                    <form action="http://localhost/project_quanlisinhvien/manage_courses/save_course" method="POST">
                        <!-- Course ID -->
                        <div class="mb-3">
                            <label for="courseId" class="form-label">Mã môn</label>
                            <input type="text" class="form-control" id="courseId" name="MaMon" placeholder="Nhập mã môn học" required>
                        </div>

                        <!-- Course Name -->
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Tên môn</label>
                            <input type="text" class="form-control" id="courseName" name="TenMon" placeholder="Nhập tên môn học" required>
                        </div>

                        <!-- Credits -->
                        <div class="mb-3">
                            <label for="courseCredits" class="form-label">Số tín chỉ</label>
                            <input type="number" class="form-control" id="courseCredits" name="SoTinChi" placeholder="Nhập số tín chỉ" min="1" max="4" required>
                        </div>

                        <!-- Lecturer -->
                        <div class="mb-3">
                            <label for="courseLecturer" class="form-label">Giảng viên</label>
                            <input type="text" class="form-control" id="courseLecturer" name="GiangVien" placeholder="Nhập tên giảng viên" required>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4">Thêm Môn Học</button>
                            <a href="http://localhost/project_quanlisinhvien/manage_courses/Get_data" class="btn btn-outline-secondary px-4">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>