<header>
    <img src="./LayoutClient/img/thtshop-removebg-preview.png" alt="">
    <nav>
        <ul>
            <li><a href="<?= BASE_URL . '?act=trangchu' ?>">Trang chủ</a></li>
            <li><a href="<?= BASE_URL . '?act=san-pham' ?>">Sản phẩm</a></li>
            <li><a href="<?= BASE_URL . '?act=gioi-thieu' ?>">Giới thiệu</a></li>
            <li><a href="<?= BASE_URL . '?act=lien-he' ?>">Liên Hệ</a></li>
        </ul>
    </nav>
    <div class="icon1">
        <form action="" id="search-box">
            <div class="search-container">
                <input type="text" id="search-text" placeholder="Bạn muốn tìm gì..." required>
                <button id="search-btn">
                    <i class="fa-solid fa-magnifying-glass" style="color: #fff;"></i>
                </button>
            </div>
        </form>

        <label for="">
            <?php if (isset($_SESSION['user_client'])) {
                echo $_SESSION['user_client'];
            } ?>
        </label>

        <div class="dropdown-container">
            <span class="material-symbols-outlined dropdown-icon">person</span>
            <div class="dropdown-menu">
                <?php if (!isset($_SESSION['user_client'])) { ?>
                    <a href="<?= BASE_URL . '?act=login' ?>" class="dropdown-item">Đăng nhập</a>
                <?php } else { ?>
                    <a href="" class="dropdown-item">Thông tin cá nhân</a>
                    <a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>" class="dropdown-item">Lịch sử mua hàng</a>
                    <a href="<?= BASE_URL . '?act=logout' ?>" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất chứ?');">Đăng xuất</a>
                <?php } ?>
            </div>
        </div>

        <!-- <a href=""><span class="material-symbols-outlined">favorite</span></a> -->
        <a href="<?= BASE_URL . '?act=gio-hang' ?>"><span class="material-symbols-outlined">
                shopping_cart
            </span></a>
    </div>
</header>
</div>