<?php
// Model: manage_student_m.php

class manage_student_m extends connectDB
{

    public function get_student_infor()
    {
        $sql = "SELECT * FROM sinhvien";
        $result = mysqli_query($this->con, $sql);


        return $result;
    }
    public function sinhvien_find($masv, $name)
    {
        $sql = "SELECT * FROM sinhvien WHERE MaSoSV LIKE '%$masv%' AND HoTen LIKE '%$name%'";
        $result = mysqli_query($this->con, $sql);


        return $result;
    }


    function sinhvien_ins($masv, $ht, $ns, $dc, $dt, $email, $gt)
    {
        $sql_check_masv = "SELECT * FROM sinhvien WHERE MaSoSv = '$masv'";
        $result_masv = mysqli_query($this->con, $sql_check_masv);

        $sql_check_dt = "SELECT * FROM sinhvien WHERE SoDienThoai = '$dt'";
        $result_dt = mysqli_query($this->con, $sql_check_dt);

        $sql_check_email = "SELECT * FROM sinhvien WHERE Email = '$email'";
        $result_email = mysqli_query($this->con, $sql_check_email);

        if (mysqli_num_rows($result_masv) > 0) {
            echo '<script>alert("Mã sinh viên đã tồn tại. Vui lòng nhập mã khác.")</script>';
            return false;
        } elseif (mysqli_num_rows($result_dt) > 0) {
            echo '<script>alert("Số điện thoại đã tồn tại. Vui lòng nhập số khác.")</script>';
            return false;
        } elseif (mysqli_num_rows($result_email) > 0) {
            echo '<script>alert("Email đã tồn tại. Vui lòng nhập email khác.")</script>';
            return false;
        } else {

            $sql = "INSERT INTO sinhvien VALUES('$masv','$ht','$ns','$gt','$dc','$email','$dt')";
            return mysqli_query($this->con, $sql);
        }
    }

    function sinhvien_upd($masv, $ht, $ns, $dc, $dt, $email, $gt)
    {
        $sql = "UPDATE sinhvien SET HoTen='$ht', NgaySinh='$ns', QueQuan='$dc', SoDienThoai='$dt', Email='$email', GioiTinh='$gt'WHERE MaSoSV='$masv'";
        return mysqli_query($this->con, $sql);
    }
    function sinhvien_del($masv)
    {
        $sql = "DELETE FROM sinhvien WHERE MaSoSV = '$masv'";
        return mysqli_query($this->con, $sql);
    }
}
