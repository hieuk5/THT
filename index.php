<?php 

session_start();
$tai_khoan_id = $_SESSION['tai_khoan_id'] ?? null; // Lấy từ session


// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/DanhMuc.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
require_once './models/BinhLuan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {

    //route
    '/' => (new HomeController())->home(),
    'trangchu' => (new HomeController())->trangchu(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'san-pham' => (new HomeController())->SanPham(),
    'gioi-thieu' => (new HomeController())->gioiThieu(),
    'lien-he' => (new HomeController())->lienHe(),
    'san-pham-theo-danh-muc' => (new HomeController())->SanPhamTheoDanhMuc(),

    //bình luận
    'binh-luan' => (new HomeController())->binhLuan(),

    'gio-hang' => (new HomeController())->gioHang(),
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietMuaHang(),
    'thanh-toan-thanh-cong' => (new HomeController())->thanhToanThanhCong(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),
    //'danhmuc' => (new HomeController())->DanhMuc(),

    // login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->logout(),

    // signup
    'form-signup' => (new HomeController())->formSignup(),
    'check-signup' => (new HomeController())->postSignup(),
};