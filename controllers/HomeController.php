<?php
// session_start();
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public $modelGioHang;
    public $modelDonHang;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelBinhLuan = new BinhLuan();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();
        require_once './views/home.php';
    }

    public function SanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/productSanPham.php';
        return $listSanPham;
    }

    public function gioiThieu(){
        require_once './views/gioiThieu.php';
    }

    public function lienHe(){
        require_once './views/lienHe.php';
    }

    public function thanhToanThanhCong(){
        require_once "./views/thanhToanThanhCong.php";
    }

    public function getSanPhamHot()
    {
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();
        return $listSanPhamHot;
    }

    public function SanPhamTheoDanhMuc() {
        $idDanhMuc = isset($_GET['id']) ? $_GET['id'] : 0;
        $listSanPham = $this->modelSanPham->getSanPhamTheoDanhMuc($idDanhMuc);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/productSanPham.php';
    }

    // public function DanhMuc() {
    //     $listSanPhamCungDanhMuc = $this->modelDanhMuc->getDanhMucSanPham($danhMuc); // Lấy dữ liệu từ model
    //     $listSanPham = $this->modelDanhMuc->getSanPham(); // Lấy danh sách sản phẩm

    //     require_once './views/productSanPham.php'; // Truyền biến sang view
    // }


    public function chiTietSanPham()
    {
        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']) ?? null;
        if ($user) {
            $tai_khoan_id = $user['id'];
        }else{
            $tai_khoan_id = 0;
        }
        //var_dump($listBinhLuan);die();
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        //var_dump($listSanPhamCungDanhMuc);die();
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else if ($listSanPhamCungDanhMuc) {
            require_once './views/productSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function binhLuan() {

        if (isset($_POST['san_pham_id']) && isset($_POST['noi_dung']) && isset($_POST['tai_khoan_id'])) {
            $san_pham_id = $_POST['san_pham_id'];
            $noi_dung = $_POST['noi_dung'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ngay_bl = date('Y-m-d H:i:s');

            $tai_khoan_id = $_SESSION['tai_khoan_id'] ?? null; // Lấy từ session
            
            // var_dump($tai_khoan_id);
            // die( );
            
            // Kiểm tra nếu sản phẩm tồn tại
            if ($san_pham_id && $noi_dung && $tai_khoan_id) {
                // Thêm bình luận vào cơ sở dữ liệu
                $binhLuan1 =$this->modelBinhLuan->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung,  $ngay_bl);
                //var_dump($binhluan1);die();
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_sanpham=" . $san_pham_id);
                exit();
            } else {
                echo "Vui lòng đăng nhập để điền đầy đủ thông tin!";
            }
        } else {
            echo "Dữ liệu không hợp lệ!";
        }
        // var_dump($_POST); die();
    }
    

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lẤY email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);die;
            // xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            //var_dump($user);die();

            if ($user == $email) {
                // trường hợp đăng nhập thành công
                // lưu thông tin cào session
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                // neu loi thi luu loi vao session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['user_client']) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                //var_dump($mail['id']);die();
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                var_dump('chưa đăng nhập');
                die();
            }
        }
    }

    public function gioHang()
    {
        if ($_SESSION['user_client']) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            //var_dump($mail['id']);die();
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }

    public function thanhToan()
    {
        if ($_SESSION['user_client']) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            //var_dump($mail['id']);die();
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';
        } else {
            var_dump('chưa đăng nhập');
            die();
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat =  date('Y-m-d');
            //var_dump($ngay_dat);die();
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000,9999);

            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            //var_dump('Thêm thành công');die();
            //lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if($donHang){
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                foreach($chiTietGioHang as $item){
                    $donGia = $item['giam_gia'] ?? $item['gia'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, // ID đơn hàng vừa tạo
                        $item['san_pham_id'], // ID sản phẩm
                        $donGia, // Đơn giá lấy từ sản phẩm
                        $item['so_luong'], // số lượng
                        $donGia * $item['so_luong'] //thành tiền
                    );
                }

                //sau khi thêm xong thì xóa sản phẩm trong giỏ hàng
                //xóa toàn bộ sản phẩm trong giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                //xóa thông tin giỏ hàng người dùng
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                header("Location: " . BASE_URL . '?act=thanh-toan-thanh-cong');
                exit();
            }else{
                var_dump('Thêm đơn hàng thất bại');
                die();
            }
        }
    }

    public function lichSuMuaHang(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //lấy danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            //lấy danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            //var_dump($phuongThucThanhToan);die();
            //lấy danh sách tất cả đơn hàng của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once "./views/lichSuMuaHang.php";
        }else{
            var_dump("Bạn chưa đăng nhập");
            die();
        }
    }

    public function chiTietMuaHang(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //lấy id đơn hàng truyền từ URL
            $donHangId = $_GET['id'];

            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            //lấy ra thông tin đơn hàng theo id
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            //lấy thông tin sản phẩm 
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);

            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);

            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo "Bạn không có quyền truy cập đơn hàng này";
                exit();
            }
            require_once "./views/chiTietMuaHang.php";
        }else{
            var_dump("Bạn chưa đăng nhập");
            die();
        }
    }

    public function huyDonHang(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //lấy id đơn hàng truyền từ URL
            $donHangId = $_GET['id'];

            //kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo "Bạn không có quyền hủy đơn hàng này";
                exit();
            }

            if($donHang['trang_thai_id'] != 1){
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit();
            }

            //hủy đơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 10);
            header("Location: ". BASE_URL . '?act=lich-su-mua-hang');
            exit();
        }else{
            var_dump("Bạn chưa đăng nhập");
            die();
        }
    }

    public function logout(){
        if (isset($_SESSION['user_client'])){
            unset($_SESSION['user_client']);
            unset($_SESSION['tai_khoan_id']);
            header("location: ". BASE_URL . '?act=trangchu');
        }
    }


    public function formSignup(){
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postSignup(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //xử lý thông tin lưu trữ
            $result = $this->modelTaiKhoan->getDangKyTaiKhoan($username, $email, $password);
            //var_dump($result);die();

            if($result === true){
                //đăng ký thành công
                $_SESSION['success'] = "Đăng ký thành công";
                header("Location: ". BASE_URL . '?act=login');
                exit();
            }else{
                //có lỗi
                $_SESSION['error'] = $result;
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL . '?act=form-signup');
                exit();
            }
        }
    }


    public function trangchu()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listSanPhamHot = $this->modelSanPham->getSanPhamHot();
        require_once './views/home.php';
    }

    // public function danhSachSanPham(){
    //     //echo "Đây là danh sách sản phẩm của tôi";
    //     $listProduct = $this->modelSanPham->getAllProduct();
    //     //var_dump($listProduct);
    //     require_once './views/listProduct.php';
    // }
}