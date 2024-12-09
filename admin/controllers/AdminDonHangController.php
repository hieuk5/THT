<?php 
class AdminDonHangController {
    public $modelDonHang;
    
    public function __construct() {
        $this->modelDonHang = new AdminDonHang();
  
    }
    public function danhSachDonHang() {
        $listDonHang = $this->modelDonHang->getAllDonHang();

        //sắp xếp đơn hàng theo ngày đặt
        usort($listDonHang, function($a, $b){
            return strtotime($b['ngay_dat']) - strtotime($a['ngay_dat']);
        });
        require_once './views/donhang/listDonHang.php';
    }

    public function detailDonHang() {
        $donhang_id = $_GET['id_donhang'];

        // lấy thông tin đơn hàng ở bảng đơn hàng
        $donHang = $this->modelDonHang->getDetailDonHang($donhang_id);
        
        // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi tiết đơn hàng
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($donhang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        //var_dump($sanPhamDonHang);die;
        require_once './views/donhang/detailDonHang.php';

    }

    public function formEditDonHang(){
        //hàm này dùng để hiện thị form nhập
        //lấy ra thông tin danh mục cần sửa
        $id = $_GET['id_donhang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
       
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if($donHang){
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        }else{
            $_SESSION['error_message'] = "Đơn hàng không tồn tại";
            header("Location: " . BASE_URL_ADMIN . "?act=donhang");
            exit();
        }
    }

    public function postEditDonHang(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $don_hang_id = $_POST['don_hang_id'] ?? '';
           
            

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';

            

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            
            if(empty($ten_nguoi_nhan)){
                $error['ten_nguoi_nhan'] = 'Bạn phải nhập tên người nhận';
            }

            if(empty($sdt_nguoi_nhan)){
                $error['sdt_nguoi_nhan'] = 'Bạn phải nhập số điện thoại người nhận';
            }

            if(empty($email_nguoi_nhan)){
                $error['email_nguoi_nhan'] = 'Bạn phải nhập email người nhận';
            }

            if(empty($dia_chi_nguoi_nhan)){
                $error['dia_chi_nguoi_nhan'] = 'Bạn phải nhập địa chỉ người nhận của sản phẩm';
            }

            if(empty($ghi_chu)){
                $error['ghi_chu'] = 'Bạn phải nhập nhập ghi chú của sản phẩm';
            }

            if(empty($trang_thai_id)){
                $error['trang_thai_id'] = 'Bạn phải nhập trạng thái của sản phẩm';
            }

            

            $_SESSION['error'] = $error;
            //var_dump($error);die();
            
            
            if(empty($error)){
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);

                header("Location: " . BASE_URL_ADMIN . "?act=donhang");
                exit();

            }else{
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=formsuadonhang&id_donhang=' . $don_hang_id);
                exit();
            }
            
        }
    }

    // public function postEditAnhSanPham() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $san_pham_id = $_POST['san_pham_id'];
    
    //         // Lấy danh sách ảnh sản phẩm hiện tại
    //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
    
    //         // Xử lý các ảnh được gửi từ form
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $current_img_ids = isset($_POST['current_img_ids']) ? $_POST['current_img_ids'] : [];
    
    //         // Khai báo để lưu ảnh thêm mới hoặc thay thế ảnh cũ
    //         $upload_files = [];
    
    //         // Upload ảnh mới hoặc thay thế ảnh cũ
    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($img_array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_files[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file,
    //                     ];
    //                 }
    //             }
    //         }
    
    //         // Cập nhật ảnh hoặc thêm mới
    //         foreach ($upload_files as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
    
    //                 // Cập nhật ảnh cũ
    //                 $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
    
    //                 // Xóa ảnh cũ
    //                 deleteFile($old_file);
    //             } else {
    //                 // Thêm ảnh mới
    //                 $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
    //             }
    //         }
    
    //         // Xử lý xóa ảnh
    //         foreach ($listAnhSanPhamCurrent as $anhSP) { 
    //             $anh_id = $anhSP['id'];
    //             if (in_array($anh_id, $img_delete)) {
    //                 // Xóa ảnh
    //                 $this->modelSanPham->destroyAnhSanPham($anh_id);
    
    //                 // Xóa file
    //                 deleteFile($anhSP['link_hinh_anh']);
    //             }
    //         }
    
    //         header("Location: " . BASE_URL_ADMIN . '?act=formsuasanpham&id_sanpham=' . $san_pham_id);
    //         exit();
    //     }
    // }
    

    // public function deleteSanPham(){
    //     $id = $_GET['id_sanpham'];
    //     $sanPham = $this->modelSanPham->getDetailSanPham($id);

    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


    //     if($sanPham){
    //         deleteFile($sanPham['hinh']);
    //         $this->modelSanPham->destroySanPham($id);     
    //     }

    //     if($listAnhSanPham){
    //         foreach($listAnhSanPham as $key=>$anhSp){
    //             deleteFile($anhSp['link_hinh_anh']);
    //             $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
    //         }
    //     }
    //     header("Location: " . BASE_URL_ADMIN . "?act=sanpham&status=success");
    //     exit();
    // }

    // public function detailSanPham(){
    //     //hàm này dùng để hiện thị form nhập
    //     //lấy ra thông tin danh mục cần sửa
    //     $id = $_GET['id_sanpham'];
    //     $sanPham = $this->modelSanPham->getDetailSanPham($id);
    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
    //     if($sanPham){
    //         require_once './views/sanpham/detailSanPham.php';
            
    //     }else{
    //         header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
    //         exit();
    //     }
    // }
}
?>