<form action="http://localhost/project_quanlisinhvien/manage_credit_tuition/themmoi" method="post">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Thêm Giá Tín Chỉ</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="HocKy" class="form-label">Học Kỳ</label>
                            <select class="form-select" id="HocKy" name="HocKy" required>
                                <option value="" disabled selected>Chọn học kỳ</option>
                                <option value="1">Học kỳ 1</option>
                                <option value="2">Học kỳ 2</option>
                            </select>
                        </div>

                        <!-- Chọn năm học -->
                        <div class="form-group mb-3">
                            <label for="academic_year">Chọn Năm Học:</label>
                            <select class="form-control" id="academic_year" name="NamHoc" required>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2025-2026">2025-2026</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="creditPrice" class="form-label">Giá Tín Chỉ</label>
                            <input type="number" class="form-control" id="creditPrice" name="GiaTinChi" placeholder="Nhập giá tín chỉ (VD: 500000)" required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-4" name="btnthem">Thêm Giá Tín Chỉ</button>
                            <a href="http://localhost/project_quanlisinhvien/manage_credit_tuition/Get_data" class="btn btn-outline-secondary px-4">Quay Lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>