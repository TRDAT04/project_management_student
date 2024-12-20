<div class="container my-4">
    <h2>Danh sách môn học đã đăng ký</h2>
    <h4>Sinh viên ID: <?php echo $data['studentId']; ?></h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Môn</th>
                <th>Tên Môn</th>
                <th>Học Kỳ</th>
                <th>Năm Học</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['registeredCourses'])): ?>
                <?php foreach ($data['registeredCourses'] as $course): ?>
                    <tr>
                        <td><?php echo $course['MaMon']; ?></td>
                        <td><?php echo $course['TenMon']; ?></td>
                        <td><?php echo $course['HocKy']; ?></td>
                        <td><?php echo $course['NamHoc']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Sinh viên chưa đăng ký môn học nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>