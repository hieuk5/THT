<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaikhoan.php';

// Route
$act = $_GET['act'] ?? '/';

if($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin'){
    checkLoginAdmin(); 
}

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo '<div class="alert alert-success">Đã xóa thành công!</div>';
    } elseif ($_GET['status'] === 'update_success') {
        echo '<div class="alert alert-success">Đã cập nhật thành công!</div>';
    } elseif ($_GET['status'] === 'add_success') {
        echo '<div class="alert alert-success">Đã thêm mới thành công!</div>';
    }

    // Xác định URL điều hướng dựa vào tham số 'type'
    $redirectUrl = BASE_URL_ADMIN;
    if (isset($_GET['type']) && $_GET['type'] === 'category') {
        $redirectUrl .= "?act=danhmuc";
    } else {
        $redirectUrl .= "?act=sanpham";
    }

    echo "<script>
        setTimeout(function() {
            window.location.href = '$redirectUrl';
        }, 3000);

        // Xóa `status` và `type` khỏi URL
        const url = new URL(window.location.href);
        url.searchParams.delete('status');
        url.searchParams.delete('type');
        window.history.replaceState(null, '', url);
    </script>";
} else {
    echo '';
}



// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {

    //route thống kê
    '/' => (new AdminThongKeController())->home(),

    //route danh mục
    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),

    //route sản phẩm
    'sanpham' => (new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' => (new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' => (new AdminSanPhamController())->postAddSanPham(),
    'formsuasanpham' => (new AdminSanPhamController())->formEditSanPham(),
    'suasanpham' => (new AdminSanPhamController())->postEditSanPham(),
    'suaalbumanhsanpham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'xoasanpham' => (new AdminSanPhamController())->deleteSanPham(),
    'chitietsanpham' => (new AdminSanPhamController())->detailSanPham(),


    'updatetrangthaibinhluan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),

    //route đơn hàng
    'donhang' => (new AdminDonHangController())->danhSachDonHang(),
    'formsuadonhang' => (new AdminDonHangController())->formEditDonHang(),
    'suadonhang' => (new AdminDonHangController())->postEditDonHang(),
    'chitietdonhang' => (new AdminDonHangController())->detailDonHang(),

    //route tài khoản
    //quản trị viên
    'listtaikhoanquantri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'formthemquantri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'themquantri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'formsuaquantri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'suaquantri' => (new AdminTaiKhoanController())->postEditQuanTri(),


    'xoapassword' => (new AdminTaiKhoanController())->deletePassword(),


    // quản lý tài khoản khách hàng
    'listtaikhoankhachhang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'formsuakhachhang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'suakhachhang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chitietkhachhang' => (new AdminTaiKhoanController())->detailKhachHang(),
    default => 'Không tìm thấy trang',
    
    // route auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin'=> (new AdminTaiKhoanController())->logout(),
};
