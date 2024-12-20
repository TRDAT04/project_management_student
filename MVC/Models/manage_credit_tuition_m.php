<?php

class manage_credit_tuition_m extends connectDB
{
    // Lấy danh sách học phí tín chỉ
    public function get_credit_prices()
    {
        $sql = "SELECT * FROM hocphitinchi";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    // Thêm mới học phí tín chỉ
    public function credit_tuition_ins($hocKy, $namHoc, $giaTinChi)
    {
        // Kiểm tra trùng học kỳ và năm học
        $sql_check = "SELECT * FROM hocphitinchi WHERE HocKy = '$hocKy' AND NamHoc = '$namHoc'";
        $result_check = mysqli_query($this->con, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            echo '<script>alert("Học kỳ và năm học đã tồn tại. Vui lòng nhập khác.")</script>';
            return false;
        } else {
            $sql = "INSERT INTO hocphitinchi (HocKy, NamHoc, GiaTinChi) VALUES('$hocKy', '$namHoc', '$giaTinChi')";
            return mysqli_query($this->con, $sql);
        }
    }

    // Sửa thông tin học phí tín chỉ
    public function credit_tuition_upd($hocKy, $namHoc, $giaTinChi)
    {
        $sql = "UPDATE hocphitinchi 
                SET GiaTinChi = '$giaTinChi' 
                WHERE HocKy = '$hocKy' AND NamHoc = '$namHoc'";
        return mysqli_query($this->con, $sql);
    }

    // Xóa học phí tín chỉ
    public function credit_tuition_del($hocKy, $namHoc)
    {
        $sql = "DELETE FROM hocphitinchi WHERE HocKy = '$hocKy' AND NamHoc = '$namHoc'";
        return mysqli_query($this->con, $sql);
    }
}
