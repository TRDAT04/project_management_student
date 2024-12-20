<?php

class Manage_tuition extends Controller
{
    private $manage_tuition_model;

    public function __construct()
    {
        $this->manage_tuition_model = $this->model('manage_tuition_m');
    }

    // Lấy danh sách học phí
    public function Get_data()
    {
        $danhSachHocPhi = $this->manage_tuition_model->get_tuition_list();

        $this->view('Masterlayout', [
            'page' => 'manage_tuition_v',
            'danhSachHocPhi' => $danhSachHocPhi
        ]);
    }


    public function edit_tuition_form($maSV, $hocKy, $namHoc)
    {
        $hocPhiChiTiet = $this->manage_tuition_model->get_tuition_detail($maSV, $hocKy, $namHoc);

        $this->view('Masterlayout', [
            'page' => 'edit_tuition_v',
            'hocPhiChiTiet' => $hocPhiChiTiet
        ]);
    }

    // Cập nhật thông tin học phí
    public function update_tuition()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnUpdate'])) {
            $maSV = $_POST['MaSV'];
            $hocKy = $_POST['HocKy'];
            $namHoc = $_POST['NamHoc'];
            $trangThai = $_POST['TrangThai'];
            $ngayThanhToan = $_POST['NgayThanhToan'];
            $hinhThucThanhToan = $_POST['HinhThucThanhToan'];
            $ghiChu = $_POST['GhiChu'];

            $updateResult = $this->manage_tuition_model->update_tuition_info(
                $maSV, $hocKy, $namHoc, $trangThai, $ngayThanhToan, $hinhThucThanhToan, $ghiChu
            );

            if ($updateResult) {
                echo '<script>alert("Cập nhật thành công!");</script>';
            } else {
                echo '<script>alert("Cập nhật thất bại!");</script>';
            }

            echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_tuition/Get_data";</script>';
            exit;
        }
    }

    
}
