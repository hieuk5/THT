<?php
class DanhMuc{
    public $conn; // khai báo phương thức

    public function __construct()
    {
        $this-> conn = connectDB();
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danhmuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
}