<head>
    <link rel="stylesheet" href="./LayoutClient/css/trangchu.css">
    <link rel="stylesheet" href="./LayoutClient/css/details.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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
        <!-- content-->
        <div class="product-page">
            <!-- Product Image Section -->
            <div class="product-image">
                <!-- Phần hình ảnh chính -->
                <div class="img-main">
                    <img src="<?= BASE_URL . $listAnhSanPham[0]['link_hinh_anh'] ?>" alt="">
                </div>

                <!-- Phần thumbnail -->
                <div class="thumbnail-gallery">
                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                        <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="" onclick="changeMainImage(this)">
                    <?php endforeach; ?>
                </div>
            </div>



            <!-- Product Details Section -->
            <div class="product-details">
                <div class="manufacturer-name">
                    <a href="#"><?= $sanPham['ten_loai'] ?></a>
                </div>
                <h1><?= $sanPham['ten_sp'] ?></h1>
                <p class="series-info">
                    <?php $countComment = count($listBinhLuan); ?>
                    <span><?= $countComment . ' bình luận' ?></span>
                </p>
                <div class="availability">
                    <i class="fa fa-check-circle"></i>
                    <span><?= $sanPham['soluong'] > 0 ? $sanPham['soluong'] . ' còn hàng' : 'Hết hàng' ?></span>
                </div>
                <ul class="promotion-details">
                    <?= $sanPham['mo_ta'] ?>
                    <div class="color-selection">
                    <div class="capacity-main">
                        <label for="capacity">Dung Lượng:</label>
                        <div class="capacity-options">
                            <button class="capacity" data-value="128GB">128GB</button>
                            <button class="capacity" data-value="256GB">256GB</button>
                            <button class="capacity" data-value="512GB">512GB</button>
                        </div>
                    </div>
                </div>
                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                        <div class="quantity-main">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                            <label for="product-quantity">Số Lượng:</label>
                            <div class="quantity">
                                <input type="number" id="product-quantity" value="1" min="1" name="so_luong">
                            </div>
                        </div>

                        

                        <div id="error-message" style="color: red; display: none;"></div>
                        <hr align="center">

                        <div class="price">
                            <div class="giamgia" id="discount-price"><?= formatNumber($sanPham['giam_gia']) ?> đ</div>
                            <div id="total-price" data-price="<?= $sanPham['gia']; ?>">
                            <?= formatNumber($sanPham['gia']) ?> đ
                        </div>
                        </div>

                        <div class="purchase-buttons">
                            <div class="buy-now">
                                <button class="buy-now">
                                    <i class="fa-solid fa-bag-shopping">
                                    </i>
                                    Đặt hàng
                                </button>
                            </div>
                            <button class="add-to-cart">Thêm giỏ hàng</button>
                            <button class="installment">Mua trả góp</button>
                        </div>
                    </form>
                    <!-- Add other list items here -->
                </ul>

                



                <div class="contact-message" style="display: none; color: red; margin-top: 10px;">
                    Vui lòng liên hệ để biết thêm thông tin về sản phẩm!
                </div>
            </div>
        </div>
    </div>


    <div class="product-details-reviews section-padding pb-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-review-info">
                    <ul class="nav review-tab">
                        <li>
                            <a data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                        </li>
                    </ul>
                    <div class="tab-content reviews-tab">

                        <div class="tab-pane fade show active" id="tab_three">
                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                <div class="total-reviews">
                                    <div class="rev-avatar">
                                        <img src="<?= $binhLuan['hinh'] ?>" alt="">
                                    </div>
                                    <div class="review-box">

                                        <div class="post-author">
                                            <p><span><?= $binhLuan['hoten'] ?> -</span><?= $binhLuan['ngay_bl'] ?></p>
                                        </div>
                                        <p><?= $binhLuan['noi_dung'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <?php
                            if (isset($_SESSION['user_client'])) {
                                $tai_khoan_id = $_SESSION['user_client'];

                            ?>

                                <form action="<?= BASE_URL . '?act=binh-luan&id_sanpham=' . $sanPham['id'] ?>" method="post" class="review-form">
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                    <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id; ?>">

                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                Nội dung Bình luận</label>
                                            <textarea class="form-control" required placeholder="Nhập nội dung bình luận sản phẩm" name="noi_dung"></textarea>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button class="btn btn-sqr" type="submit">Bình luận</button>
                                    </div>
                                </form>

                            <?php
                            } else {
                                echo '<p class="alert alert-warning">Bạn cần đăng nhập thì mới có thể bình luận. <a href="' . BASE_URL . '?act=login">Đăng nhập tại đây</a></p>';
                            }
                            ?>

                            <!-- end of review-form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container1"> -->
    <h2>Có thể bạn sẽ thích</h2>
    <div class="product2">
        <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
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

    <script src="./LayoutClient/js/trangchu.js"></script>
    <script src="./LayoutClient/js/details.js"></script>

    <?php require_once 'views/layout/footer.php' ?>
</body>

</html>