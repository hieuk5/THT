<?php
class SanPham{
    public $conn; // khai báo phương thức

    public function __construct()
    {
        $this-> conn = connectDB();
    }

    public function getAllProduct(){
        try{
            $sql = "SELECT * FROM sanpham";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Loi". $e->getMessage();
        }
    }

    public function getAllSanPham(){
        try{
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
            FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Loi". $e->getMessage();
        }
    }

    public function getSanPhamHot() {
        try {
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
                    FROM sanpham 
                    INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
                    WHERE sanpham.is_hot = 1"; // Giả định có cột 'is_hot' để đánh dấu sản phẩm HOT
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
            FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
            WHERE sanpham.id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id){
        try {
            $sql = "SELECT * FROM hinh_anh_san_pham WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id){
        try{
            $sql = "SELECT binhluan.*, tai_khoan.hoten, tai_khoan.hinh
            FROM binhluan
            INNER JOIN tai_khoan ON binhluan.tai_khoan_id = tai_khoan.id
            WHERE binhluan.san_pham_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        }catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    
    public function getListSanPhamDanhMuc($danh_muc_id){
        try{
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
            FROM sanpham 
            
            INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
            WHERE sanpham.danh_muc_id = " . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Loi". $e->getMessage();
        }
    }

    public function getSanPhamTheoDanhMuc($idDanhMuc) {
        try {
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
                    FROM sanpham 
                    INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
                    WHERE sanpham.danh_muc_id = :id_danhmuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_danhmuc' => $idDanhMuc]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>