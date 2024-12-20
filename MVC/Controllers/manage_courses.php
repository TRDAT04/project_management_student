<?php
class manage_courses extends controller
{
    private $mc;
    public function __construct()
    {
        $this->mc = $this->model('manage_courses_m');
    }
    public function Get_data()
    {
        $courseList = $this->mc->get_all_courses();

        $this->view('Masterlayout', [
            'page' => 'manage_courses_v',
            'danhsachmonhoc' => $courseList
        ]);
    }
    public function timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mamon = $_POST['txtMaMon'];

            $name = $_POST['txtGiangVien'];
            $dl = $this->mc->monhoc_find($mamon, $name);

            // Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout', [
                'page' => 'manage_courses_v',
                'danhsachmonhoc' => $dl,
                'MaMon' => $mamon,

                'GiangVien' => $name
            ]);
            exit;
        }
        if (isset($_POST['btnXuatExcel'])) {
        }
    }
    public function add_courses()
    {
        $this->view('Masterlayout', [
            'page' => 'add_courses_v'

        ]);
    }
    public function save_course()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maMon = $_POST['MaMon'];
            $tenMon = $_POST['TenMon'];
            $soTinChi = $_POST['SoTinChi'];
            $giangVien = $_POST['GiangVien'];

            // Gọi model để thêm dữ liệu vào database
            $result = $this->mc->insert_course($maMon, $tenMon, $soTinChi, $giangVien);

            if ($result) {
                echo '<script>alert("Thêm môn học thành công!");</script>';
                echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_courses/Get_data";</script>';
            } else {
                echo '<script>alert("Thêm môn học thất bại! Vui lòng kiểm tra lại.");</script>';
                echo '<script>window.history.back();</script>';
            }
        }
    }
    public function delete_course($maMon)
    {
        $result = $this->mc->course_del($maMon);
        if ($result) {
            echo '<script>alert("Xóa thành công")</script>';
        } else {
            echo '<script>alert("Xóa thất bại")</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_courses/Get_data";</script>';
        exit;
    }
    public function update_course()
    {
        $maMon = $_POST['MaMon'];
        $tenMon = $_POST['TenMon'];
        $soTinChi = $_POST['SoTinChi'];
        $giangVien = $_POST['GiangVien'];
        $insertResult = $this->mc->update_course($maMon, $tenMon, $soTinChi, $giangVien);
        if ($insertResult) {
            echo '<script>alert("Sửa thành công")</script>';
        } else {
            echo '<script>alert("Sửa thất bại")</script>';
        }
        echo '<script>window.location.href = "http://localhost/project_quanlisinhvien/manage_courses/Get_data";</script>';
        exit;
    }
}
