<?php

class manage_courses_m extends connectDB
{

    public function get_all_courses()
    {
        $sql = "SELECT * FROM MonHoc";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function monhoc_find($mamon, $name)
    {
        $sql = "SELECT * FROM monhoc WHERE MaMon LIKE '%$mamon%' AND GiangVien LIKE '%$name%'";
        $result = mysqli_query($this->con, $sql);


        return $result;
    }

    // Thêm mới môn học
    public function insert_course($maMon, $tenMon, $soTinChi, $giangVien)
    {
        $sql_check = "SELECT * FROM MonHoc WHERE MaMon = '$maMon'";
        $result = mysqli_query($this->con, $sql_check);

        // Kiểm tra nếu mã môn đã tồn tại
        if (mysqli_num_rows($result) > 0) {
            return false; // Mã môn đã tồn tại
        }

        $sql = "INSERT INTO MonHoc (MaMon, TenMon, SoTinChi, GiangVien) 
                VALUES ('$maMon', '$tenMon', $soTinChi, '$giangVien')";
        return mysqli_query($this->con, $sql);
    }

    // Sửa thông tin môn học
    public function update_course($maMon, $tenMon, $soTinChi, $giangVien)
    {
        $sql = "UPDATE MonHoc 
                SET TenMon = '$tenMon', SoTinChi = $soTinChi, GiangVien = '$giangVien' 
                WHERE MaMon = '$maMon'";
        return mysqli_query($this->con, $sql);
    }

    // Xóa môn học
    public function course_del($maMon)
    {
        $sql = "DELETE FROM MonHoc WHERE MaMon = '$maMon'";
        return mysqli_query($this->con, $sql);
    }

    // Lấy thông tin chi tiết của một môn học
    public function get_course_by_id($maMon)
    {
        $sql = "SELECT * FROM MonHoc WHERE MaMon = '$maMon'";
        $result = mysqli_query($this->con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }
}
