<div class="container my-4">
    <h2>Đăng ký môn học cho sinh viên</h2>
    <form action="http://localhost/project_quanlisinhvien/registration/registerCoursesForStudent" method="POST">
        <!-- Chọn sinh viên -->
        <div class="form-group mb-3">
            <label for="student">Sinh Viên:</label>
            <select class="form-control" id="student" name="student_id" required>
                <?php foreach ($data['students'] as $student): ?>
                    <option value="<?php echo $student['MaSoSV']; ?>">
                        <?php echo $student['HoTen']; ?> (ID: <?php echo $student['MaSoSV']; ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Chọn học kỳ -->
        <!-- Chọn học kỳ -->
        <div class="form-group mb-3">
            <label for="semester">Chọn học kỳ:</label>
            <select class="form-control" id="semester" name="semester" required>
                <option value="1">Học kỳ 1</option>
                <option value="2">Học kỳ 2</option>
            </select>
        </div>


        <!-- Chọn năm học -->
        <div class="form-group mb-3">
            <label for="academic_year">Chọn Năm Học:</label>
            <select class="form-control" id="academic_year" name="academic_year" required>
                <option value="2024-2025">2024-2025</option>
                <option value="2025-2026">2025-2026</option>
            </select>
        </div>

        <!-- Danh sách môn học -->
        <h4 class="mt-4">Danh sách môn học</h4>
        <div class="row">
            <?php foreach ($data['courses'] as $course): ?>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            id="course_<?php echo $course['MaMon']; ?>"
                            name="courses[]" value="<?php echo $course['MaMon']; ?>">
                        <label class="form-check-label" for="course_<?php echo $course['MaMon']; ?>">
                            <?php echo $course['TenMon']; ?> - <?php echo $course['SoTinChi']; ?> Tín
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Đăng ký</button>
    </form>
</div>