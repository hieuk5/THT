<head>
    <link rel="stylesheet" href="./LayoutClient/css/chitietmuahang.css">
</head>

<?php require_once 'views/layout/header.php' ?>


<?php require_once 'views/layout/menu.php' ?>

<main>
    <div class="container cart-container">
        <div class="row">
            <!-- Bảng thông tin sản phẩm -->
            <div class="col-lg-8">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th colspan="5">Thông tin sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #DCDCDC;">
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($chiTietDonHang as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?= BASE_URL . $item['hinh'] ?>" alt="Product Image" width="100px">
                                </td>
                                <td><?= $item['ten_sp']; ?></td>
                                <td><?= number_format($item['don_gia'], 0, ',', '.') . 'đ'; ?></td>
                                <td><?= $item['so_luong']; ?></td>
                                <td><?= number_format($item['thanh_tien'], 0, ',', '.') . 'đ'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Bảng thông tin đơn hàng -->
            <div class="col-lg-4">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th colspan="4">Thông tin đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="background-color: #DCDCDC;">Mã đơn hàng:</th>
                            <td><?= $donHang['ma_don_hang']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Người nhận:</th>
                            <td><?= $donHang['ten_nguoi_nhan']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Email:</th>
                            <td><?= $donHang['email_nguoi_nhan']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Số điện thoại:</th>
                            <td><?= $donHang['sdt_nguoi_nhan']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Địa chỉ:</th>
                            <td><?= $donHang['dia_chi_nguoi_nhan']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Ngày đặt:</th>
                            <td><?= $donHang['ngay_dat']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Ghi chú:</th>
                            <td><?= $donHang['ghi_chu']; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Tổng tiền:</th>
                            <td><?= number_format($donHang['tong_tien'], 0, ',', '.') . 'đ'; ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Phương thức thanh toán:</th>
                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                        </tr>
                        <tr>
                            <th style="background-color: #DCDCDC;">Trạng thái đơn hàng:</th>
                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<script src="./LayoutClient/js/cart.js"></script>



<?php require_once 'views/layout/footer.php' ?>