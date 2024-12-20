<?php
// Controller: manage_students.php

class Manage_students extends Controller
{
    private $manage_student_model;

    public function __construct()
    {
        $this->manage_student_model = $this->model('manage_student_m');
    }

    public function Get_data()
    {
        $danhSachSinhVien = $this->manage_student_model->get_student_infor();

        $this->view('Masterlayout', [
            'page' => 'manage_students_v',
            'danhsachsinhvien' => $danhSachSinhVien
        ]);
    }

    public function addstudent()
    {

        $this->view('Masterlayout', [
            'page' => 'add_student_v',

        ]);
    }

    public function timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $masv = $_POST['txtMasv'];

            $name = $_POST['txtname'];
            $dl = $this->manage_student_model->sinhvien_find($masv, $name);

            // Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout', [
                'page' => 'manage_students_v',
                'danhsachsinhvien' => $dl,
                'Masv' => $masv,

                'name' => $name
            ]);
            exit;
        }
        if (isset($_POST['btndkmon'])) {
        }
    }

    public function themmoi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnthem'])) {
            $masv = $_POST['student_id'];
            $ht = $_POST['name'];
            $ns = $_POST['dob'];
            $dc = $_POST['address'];
            $dt = $_POST['phone'];
            $email = $_POST['email'];
            $gt = $_POST['gender'];

            // Gọi hàm thêm mới sinh viên
            $insertResult = $this->manage_student_model->sinhvien_ins($masv, $ht, $ns, $dc, $dt, $email, $gt);

            // Kiểm tra kết quả trả về
            if ($insertResult === true) {
                echo '<script>alert("Thêm mới thành công!");</script>';
                echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_students/Get_data";</script>';
                exit;
            } else {
                // Hiển thị lỗi và giữ lại dữ liệu người dùng
                $this->view('Masterlayout', [
                    'page' => 'add_student_v',

                    'oldData' => [
                        'student_id' => $masv,
                        'name' => $ht,
                        'dob' => $ns,
                        'address' => $dc,
                        'phone' => $dt,
                        'email' => $email,
                        'gender' => $gt,
                    ],
                ]);
                exit;
            }
        }
    }


    public function edit_student()
    {
        $masv = $_POST['studentId'];
        $ht = $_POST['name'];
        $ns = $_POST['dob'];
        $dc = $_POST['address'];
        $dt = $_POST['phone'];
        $email = $_POST['email'];
        $gt = $_POST['gender'];
        $insertResult = $this->manage_student_model->sinhvien_upd($masv, $ht, $ns, $dc, $dt, $email, $gt);
        if ($insertResult) {
            echo '<script>alert("Sửa thành công")</script>';
        } else {
            echo '<script>alert("Sửa thất bại")</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_students/Get_data";</script>';
        exit;
    }
    public function delete_student($masv)
    {
        $result = $this->manage_student_model->sinhvien_del($masv);
        if ($result) {
            echo '<script>alert("Xóa thành công")</script>';
        } else {
            echo '<script>alert("Xóa thất bại")</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_students/Get_data";</script>';
        exit;
    }
}
