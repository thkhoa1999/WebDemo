<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
</head>
<body>

<?php
    abstract class NhanVien{  
        protected $hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon;
        const luongCoBan = 3000000;
        
        public function setHoTen($hoTen){
            $this->hoTen = $hoTen;
        }
        public function getHoTen(){
            return $this->hoTen;
        }
        public function setNgaySinh($ngaySinh){
            $this->ngaySinh = $ngaySinh;
        }
        public function getNgaySinh(){
            return $this->ngaySinh;
        }
        public function setGioiTinh($gioiTinh){
            $this->gioiTinh = $gioiTinh;
        }
        public function getGioiTinh(){
            return $this->gioiTinh;
        }
        public function setNgayVaoLam($ngayVaoLam){
            $this->ngayVaoLam = $ngayVaoLam;
        }
        public function getNgayVaoLam(){
            return $this->ngayVaoLam;
        }
        public function setHeSoLuong($heSoLuong){
            $this->heSoLuong = $heSoLuong;
        }
        public function getHeSoLuong(){
            return $this->heSoLuong;
        }
        public function setSoCon($soCon){
            $this->soCon = $soCon;
        }
        public function getSoCon(){
            return $this->soCon;
        }
        
        abstract public function tinhTienLuong();
        abstract public function tinhTroCap();
        public function setTinhTienThuong(){
            return (date("d-m-Y") -  $this->ngayVaoLam + 1) * 1000000;
        }
    }

    class NhanVienVanPhong extends NhanVien{
        protected $soNgayVang;
        const dinhMucVang = 2; 
        const donGiaPhat = 100000;

        public function setSoNgayVang($soNgayVang){
            $this->soNgayVang = $soNgayVang;
        }
        public function getSoNgayVang(){
            return $this->soNgayVang;
        }

        function tinhTienPhat(){
            if($this->soNgayVang > self::dinhMucVang)
                return $this->soNgayVang * self::donGiaPhat;
        }
        function tinhTroCap(){
            if($this->gioiTinh == "Nữ")
                return 200000 * $this->soCon * 1.5;
            else
                return 200000 * $this->soCon;
        }
        function tinhTienLuong(){
            return self::luongCoBan * $this->heSoLuong; 
        }
    }

    class NhanVienSanXuat extends NhanVien{
        protected $soSanPham;
        const dinhMucSP = 100; 
        const donGiaSP = 100000;

        public function setSoSanPham($soSanPham){
            $this->soSanPham = $soSanPham;
        }
        public function getSoSanPham(){
            return $this->soSanPham;
        }

        function tinhTienThuong(){
            if($this->soSanPham > self::dinhMucSP)
                return (($this->soSanPham - self::dinhMucSP) * self::donGiaSP * 0.03);
            else
                return 0;
        }
        function tinhTroCap(){
            return $this->soCon * 120000;
        }
        function tinhTienLuong(){
            return ($this->soSanPham  * self::donGiaSP);
        }
    }

    $hoTen = NULL;
    if(isset($_POST['tinh_toan'])){
        if(isset($_POST['loai_nv']) && ($_POST['loai_nv'])=="Văn phòng"){
            $vp=new NhanVienVanPhong();
            if(isset($_POST['ho_ten'])){
                $hoTen = $_POST['ho_ten'];
                $vp->setHoTen($hoTen);
            }     

            if(isset($_POST['so_con']) && is_numeric($_POST['so_con'])){
                $soCon = $_POST['so_con'];
                $vp->setSoCon($soCon);
            }     
            else{
                $soCon = 0;
                $vp->setSoCon($soCon);
            }
            if(isset($_POST['ngay_sinh'])){
                $ngaySinh = $_POST['ngay_sinh'];
                $vp->setNgaySinh($ngaySinh);
            }     
            else{
                $ngaySinh = date("d-m-Y");
                $vp->setNgaySinh($ngaySinh);
            }
            if(isset($_POST['ngay_vao_lam'])){
                $ngayVaoLam = $_POST['ngay_vao_lam'];
                $vp->setNgayVaoLam($ngayVaoLam);
            }     
            else{
                $ngayVaoLam = date("d-m-Y");
                $vp->setNgayVaoLam($ngayVaoLam);
            }
            $vp->setGioiTinh($_POST['gioi_tinh']);

            if(isset($_POST['he_so_luong']) && is_numeric($_POST['he_so_luong'])){
                $heSoLuong = $_POST['he_so_luong'];
                $vp->setHeSoLuong($heSoLuong);
            }     
            else{
                $heSoLuong = 1;
                $vp->setHeSoLuong($heSoLuong);
            }
            if(isset($_POST['so_ngay_vang']) && is_numeric($_POST['so_ngay_vang'])){
                $soNgayVang = $_POST['so_ngay_vang'];
                $vp->setSoNgayVang($soNgayVang);
            } 
            else{
                $soNgayVang = 0;
                $vp->setSoNgayVang($soNgayVang);
            }
                         
            $TienLuong = $vp->tinhTienLuong();
            $TroCap = $vp->tinhTroCap();
            $TienThuong = 0;
            $TienPhat = $vp->tinhTienPhat();
            $ThucLinh = $TienLuong + $TroCap + $TienThuong - $TienPhat;
        }
        
        if(isset($_POST['loai_nv']) && ($_POST['loai_nv'])=="Sản xuất"){
            $sx = new NhanVienSanXuat();

            if(isset($_POST['ho_ten'])){
                $hoTen = $_POST['ho_ten'];
                $sx->setHoTen($hoTen);
            }     
            //Số con
            if(isset($_POST['so_con']) && is_numeric($_POST['so_con'])){
                $soCon = $_POST['so_con'];
                $sx->setSoCon($soCon);
            }     
            else{
                $soCon = 0;
                $sx->setSoCon($soCon);
            }
            //Ngày sinh
            if(isset($_POST['ngay_sinh'])){
                $ngaySinh = $_POST['ngay_sinh'];
                $sx->setNgaySinh($ngaySinh);
            }     
            else{
                $ngaySinh = date("d-m-Y");
                $sx->setNgaySinh($ngaySinh);
            }
            //Ngày vào làm
            if(isset($_POST['ngay_vao_lam'])){
                $ngayVaoLam = $_POST['ngay_vao_lam'];
                $sx->setNgayVaoLam($ngayVaoLam);
            }     
            else{
                $ngayVaoLam = date("d-m-Y");
                $sx->setNgayVaoLam($ngayVaoLam);
            }
            //Giới tính
            $sx->setGioiTinh($_POST['gioi_tinh']);
            //Hệ số lương
            $heSoLuong = 1;

            if(isset($_POST['so_san_pham']) && is_numeric($_POST['so_san_pham'])){
                $soSanPham = $_POST['so_san_pham'];
                $sx->setSoSanPham($soSanPham);
            }     
            else{
                $soSanPham = 0;
                $sx->setSoSanPham($soSanPham);
            }
            //Checked loại nhân viên là Nhân viên sản xuất
            $TienLuong = $sx->tinhTienLuong();
            $TroCap = $sx->tinhTroCap();
            $TienThuong = $sx->tinhTienThuong();
            $TienPhat = 0;
            $ThucLinh = $TienLuong + $TroCap + $TienThuong - $TienPhat;
        }
    }
?>

    <form action="" method="post">
    <fieldset>
        <legend>Quản lý nhân viên</legend>
        <table border='0'>
            <tr>
                <td>Họ tên</td>
                <td>
                    <input type="text" name="ho_ten" size="50" value="<?php echo $hoTen ?>"/>
                </td>          
                <td>Số con</td>
                <td>
                    <input type="number" name="so_con" min="0" value="<?php echo $soCon ?>"/>
                </td>
            </tr>
                <td>Ngày sinh</td>
                <td>
                    <input type="date" name="ngay_sinh" value="<?php echo $ngaySinh ?>"/>
                </td>          
                <td>Ngày vào làm</td>
                <td>
                    <input type="date" name="ngay_vao_lam" value="<?php echo $ngayVaoLam ?>"/>
                </td>
            </tr>
            </tr>
                <td>Giới tính</td>
                <td>
                    <input type="radio" name="gioi_tinh" value="Nam" checked="checked" /> Nam
                    <input type="radio" name="gioi_tinh" value="Nữ" <?php if(isset($_POST['gioi_tinh'])&&($_POST['gioi_tinh'])=="Nữ") echo 'checked="checked"'?> /> Nữ
                </td>          
                <td>Hệ số lương </td>
                <td>
                    <input type="number" name="he_so_luong" min="0" step="0.01" value="<?php echo $heSoLuong ?>"/>
                </td>
            </tr>
            </tr>
                <td>Loại nhân viên</td>
                <td>
                    <input type="radio" name="loai_nv" value="Văn phòng" checked="checked"/> Văn phòng
                </td>          
                <td>
                    <input type="radio" name="loai_nv" value="Sản xuất" <?php if(isset($_POST['loai_nv'])&&($_POST['loai_nv'])=="Sản xuất") echo 'checked="checked"'?> /> Sản xuất
                </td> 
            </tr>
            <tr>
                <td>Số ngày vắng</td>
                <td>
                    <input type="number" name="so_ngay_vang" min="0" value="<?php echo $soNgayVang?>"/>
                </td>          
                <td>Số sản phẩm</td>
                <td>
                    <input type="number" name="so_san_pham" min="0" value="<?php echo $soSanPham?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" name="tinh_toan" value="Tính lương"/></td>
            </tr>
            <tr>
                <td>Tiền lương</td>
                <td>
                    <input type="number" name="tien_luong" min="0" disabled="" value="<?php echo $TienLuong; ?>"/>
                </td>          
                <td>Trợ cấp</td>
                <td>
                    <input type="number" name="tro_cap" min="0" disabled="" value="<?php echo $TroCap; ?>"/>
                </td>
            </tr>
            <tr>
                <td>Tiền thưởng</td>
                <td>
                    <input type="number" name="tien_thuong" min="0" disabled="" value="<?php echo $TienThuong; ?>"/>
                </td>          
                <td>Tiền phạt</td>
                <td>
                    <input type="number" name="tien_phat" min="0" disabled="" value="<?php echo $TienPhat; ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">Thực lĩnh
                    <input type="number" name="thuc_linh" min="0" disabled="" value="<?php echo $ThucLinh; ?>"/>
                </td>
            </tr>
        </table>
    </fieldset>
    </form>
</body>
</html>