<?php 

class BinhLuan{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_bl) {
        try {
            // SQL để thêm bình luận
            $sql = "INSERT INTO binhluan (san_pham_id, tai_khoan_id, noi_dung, ngay_bl) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_bl)";
            // Chuẩn bị câu lệnh SQL
        //    var_dump($sql);
        //    die();
            $stmt = $this->conn->prepare($sql);
            
            // Thực thi câu lệnh SQL với dữ liệu từ đối số
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung' => $noi_dung,
                ':ngay_bl' => $ngay_bl
            ]);
    
            // Trả về ID của bình luận vừa được chèn vào
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            // Ghi lại lỗi vào file log hoặc xử lý theo cách khác
            error_log("Lỗi khi thêm bình luận: " . $e->getMessage());
            return false; // Hoặc bạn có thể ném một ngoại lệ
        }
    }
    
    
    

}