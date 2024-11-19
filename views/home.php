<?php require_once 'views/layout/header.php' ?>

<body>

    <?php require_once 'views/layout/menu.php' ?>
    <div class="banner">
        <div class="slider" id="slider">
            <div class="slide active">
                <img src="./LayoutClient/img/slider_1.png" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="./LayoutClient/img/slider_2.png" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="./LayoutClient/img/slider_3.png" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="./LayoutClient/img/slider_4.png" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="./LayoutClient/img/slider_5.png" alt="Slide 3">
            </div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
        <div class="dots" id="dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div class="container">
        <h2>Sản Phẩm Mới</h2>
        <button class="btn2">
            <h4>View all product</h4>
        </button>
        <div class="product">
            <?php foreach ($listSanPham as $key => $sanPham): ?>
                <div class="pro-item">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>">
                        <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="">
                    </a>


                    <?php
                    if (!empty($sanPham['ngay_nhap']) && strtotime($sanPham['ngay_nhap'])) {
                        try {
                            $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                            $ngayHienTai = new DateTime();
                            $tinhNgay = $ngayHienTai->diff($ngayNhap);

                            // Kiểm tra ngày nhập hợp lệ và cách ngày hiện tại không quá 7 ngày
                            if ($tinhNgay->invert == 0 && $tinhNgay->days <= 7) {
                    ?>
                                <div class="product-label discount">
                                    <span>New</span>
                                </div>
                    <?php
                            }
                        } catch (Exception $e) {
                            // Ghi log lỗi nếu ngày không hợp lệ
                            error_log("Lỗi định dạng ngày nhập: " . $e->getMessage());
                        }
                    } else {
                        // Ngày nhập không hợp lệ hoặc trống
                        error_log("Ngày nhập sản phẩm không hợp lệ hoặc trống.");
                    }
                    ?>


                    <div class="ten"><?= $sanPham['ten_sp'] ?></div>
                    <div class="giamgia"><?= formatNumber($sanPham['giam_gia']) ?> đ</div>
                    <div class="gia"><?= formatNumber($sanPham['gia']) ?> đ</div>
                    
                    <button class="btn1">Xem chi tiết</button>
                </div>
            <?php endforeach; ?>

        </div>

        <h2>Sản Phẩm HOT</h2>
        <button class="btn2">View all product</button>

        <div class="product">
            <?php foreach ($listSanPhamHot as $key => $sanPham): ?>
                <div class="pro-item">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_sanpham=' . $sanPham['id']; ?>">
                        <img src="<?= BASE_URL . $sanPham['hinh'] ?>" alt="">
                    </a>
                    <div class="ten"><?= $sanPham['ten_sp'] ?></div>
                    <div class="giamgia"><?= formatNumber($sanPham['giam_gia']) ?> đ</div>
                    <div class="gia"><?= formatNumber($sanPham['gia']) ?> đ</div>
                    
                    <button class="btn1">Xem chi tiết</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="banner">
        <img src="./LayoutClient/img/section_banner.webp" alt="">
    </div>
    <div class="container">

        <h2>Tin tức</h2>
        <button class="btn2">
            <h4>View all news</h4>
        </button>
        <div class="product2">
            <div class="pro-item">
                <img src="./LayoutClient/img/news1.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>14/11/2024</p>
                    </span>
                </div>
                <div class="ten">Giá iPhone tháng 11</div>
                <div class="new"><a href="">Xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>
            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news5.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>14/11/2024</p>
                    </span>
                </div>
                <div class="ten">Samsung chính hãng</div>
                <div class="new"><a href="">Xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>

            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news3.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>14/11/2024</p>
                    </span>
                </div>
                <div class="ten">Sản phẩm giảm giá</div>
                <div class="new"><a href="">Xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>

            </div>
            <div class="pro-item">
                <img src="./LayoutClient/img/news4.png" alt="">
                <div class="date">
                    <span><img src="./LayoutClient/img/lich.png.png" alt="">
                        <p>14/11/2024</p>
                    </span>
                </div>
                <div class="ten">iPad chính hãng</div>
                <div class="new"><a href="">Xem chi tiết <img class="imgicon" src="./LayoutClient/img/muitenred.png" alt=""></a></div>

            </div>
        </div>
    </div>
    <script src="./LayoutClient/js/trangchu.js"></script>
    <?php require_once 'views/layout/footer.php' ?>
</body>

</html>