<?php

class manage_tuition_m extends connectDB
{
    // Lấy danh sách học phí của sinh viên
    public function get_tuition_list()
    {
        $sql = "SELECT 
            sv.MaSoSV, 
            sv.HoTen,
            SUM(mp.SoTinChi * hptc.GiaTinChi) AS TongHocPhi
            FROM sinhvien sv
            JOIN dangkymonhoc dkmh ON sv.MaSoSV = dkmh.MaSoSV
            JOIN monhoc mp ON dkmh.MaMon = mp.MaMon
            JOIN HocPhiTinChi hptc ON dkmh.HocKy = hptc.HocKy AND dkmh.NamHoc = hptc.NamHoc
        GROUP BY sv.MaSoSV;
";

        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function update_tuition_info($maSV, $maMon, $hocKy, $namHoc, $trangThai, $ngayThanhToan, $hinhThucThanhToan, $ghiChu)
    {
        $sql = "UPDATE hocphi 
                SET TrangThai = '$trangThai', 
                    NgayThanhToan = '$ngayThanhToan', 
                    HinhThucThanhToan = '$hinhThucThanhToan', 
                    GhiChu = '$ghiChu'
                WHERE MaSV = '$maSV' AND HocKy = '$hocKy' AND NamHoc = '$namHoc';";

        return mysqli_query($this->con, $sql);
    }


}
