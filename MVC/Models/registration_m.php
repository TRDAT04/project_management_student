<?php
class registration_m extends connectDB
{
    // Lấy danh sách sinh viên
    public function getAllStudents()
    {
        $sql = "SELECT * FROM sinhvien";
        $result = mysqli_query($this->con, $sql);

        if (!$result) {
            die("Error executing query: " . $this->con->error);
        }

        $students = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        return $students; // Trả về mảng sinh viên
    }

    // Lấy danh sách môn học
    public function getAllCourses()
    {
        $sql = "SELECT * FROM monhoc";
        $result = mysqli_query($this->con, $sql);

        if (!$result) {
            die("Error executing query: " . $this->con->error);
        }

        $courses = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row;
        }

        return $courses; // Trả về mảng môn học
    }

    // Đăng ký môn học cho sinh viên
    public function registerCourseForStudent($studentId, $courseId, $semester, $academicYear)
    {
        // Kiểm tra trùng lặp
        if ($this->isCourseAlreadyRegistered($studentId, $courseId, $semester, $academicYear)) {
            return false; // Đã đăng ký trước đó
        }

        $sql = "INSERT INTO dangkymonhoc (MaSoSV, MaMon, HocKy, NamHoc) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Prepare statement failed: " . $this->con->error);
        }

        $stmt->bind_param("ssss", $studentId, $courseId, $semester, $academicYear);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();

        return true; // Đăng ký thành công
    }


    // Kiểm tra xem sinh viên đã đăng ký môn học chưa (tránh trùng lặp)
    public function isCourseAlreadyRegistered($studentId, $courseId)
    {
        $sql = "SELECT * FROM dangkymonhoc WHERE MaSoSV = ? AND MaMon = ?";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Prepare statement failed: " . $this->con->error);
        }

        $stmt->bind_param("ss", $studentId, $courseId);
        $stmt->execute();
        $result = $stmt->get_result();

        $isRegistered = $result->num_rows > 0;

        $stmt->close();

        return $isRegistered;
    }


    public function getRegisteredCourses($studentId)
    {
        $sql = "SELECT mh.MaMon, mh.TenMon, dk.HocKy, dk.NamHoc 
            FROM dangkymonhoc dk 
            JOIN monhoc mh ON dk.MaMon = mh.MaMon 
            WHERE dk.MaSoSV = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $studentId);
        $stmt->execute();
        $result = $stmt->get_result();

        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }

        $stmt->close();

        return $courses;
    }
}
