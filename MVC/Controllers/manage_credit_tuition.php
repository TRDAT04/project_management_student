<?php

class Manage_credit_tuition extends Controller
{
    private $manage_credit_tuition_model;

    public function __construct()
    {
        $this->manage_credit_tuition_model = $this->model('manage_credit_tuition_m');
    }

    // Lấy danh sách học phí tín chỉ
    public function Get_data()
    {
        $danhSachGiaTinChi = $this->manage_credit_tuition_model->get_credit_prices();

        $this->view('Masterlayout', [
            'page' => 'manage_credit_tuition_v',
            'danhSachGiaTinChi' => $danhSachGiaTinChi
        ]);
    }

    // Hiển thị form thêm mới
    public function add_credit_tuition()
    {
        $this->view('Masterlayout', [
            'page' => 'add_credit_tuition_v',
        ]);
    }

    // Thêm mới học phí tín chỉ
    public function themmoi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnthem'])) {
            $hocKy = $_POST['HocKy'];
            $namHoc = $_POST['NamHoc'];
            $giaTinChi = $_POST['GiaTinChi'];

            $insertResult = $this->manage_credit_tuition_model->credit_tuition_ins($hocKy, $namHoc, $giaTinChi);

            if ($insertResult === true) {
                echo '<script>alert("Thêm mới thành công!");</script>';
                echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_credit_tuition/Get_data";</script>';
                exit;
            } else {
                $this->view('Masterlayout', [
                    'page' => 'add_credit_tuition_v',
                    'oldData' => [
                        'HocKy' => $hocKy,
                        'NamHoc' => $namHoc,
                        'GiaTinChi' => $giaTinChi,
                    ],
                ]);
                exit;
            }
        }
    }

    // Sửa học phí tín chỉ
    public function edit_credit_tuition()
    {
        $hocKy = $_POST['HocKy'];
        $namHoc = $_POST['NamHoc'];
        $giaTinChi = $_POST['GiaTinChi'];
        $insertResult = $this->manage_credit_tuition_model->credit_tuition_upd($hocKy, $namHoc, $giaTinChi);
        
        if ($insertResult) {
            echo '<script>alert("Sửa thành công")</script>';
        } else {
            echo '<script>alert("Sửa thất bại")</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_credit_tuition/Get_data";</script>';
        exit;
    }

    // Xóa học phí tín chỉ
    public function delete_credit_tuition($hocKy, $namHoc)
    {
        // Sử dụng học kỳ và năm học để xác định bản ghi cần xóa
       
        $result = $this->manage_credit_tuition_model->credit_tuition_del($hocKy, $namHoc);

        if ($result) {
            echo '<script>alert("Xóa thành công !");</script>';
        } else {
            echo '<script>alert("Xóa thất bại!");</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_credit_tuition/Get_data";</script>';
        exit;
    }
}
