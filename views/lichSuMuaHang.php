<head>
    <link rel="stylesheet" href="./LayoutClient/css/cart.css">
</head>

<?php require_once 'views/layout/header.php' ?>


<?php require_once 'views/layout/menu.php' ?>

<main>
    <div class="cart-container">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($donHangs as $donHang):
                ?>
                <tr>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= formatNumber($donHang['tong_tien'])?> đ</td>
                    <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                    <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-primary">
                            Chi tiết
                        </a>

                        <?php if($donHang['trang_thai_id'] == 1) : ?>
                            <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                Hủy
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</main>

<script src="./LayoutClient/js/cart.js"></script>



<?php require_once 'views/layout/footer.php' ?>