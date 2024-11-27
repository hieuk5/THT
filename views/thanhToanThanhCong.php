<head>
    <link rel="stylesheet" href="./LayoutClient/css/success.css">
</head>

<?php require_once 'views/layout/header.php' ?>


<?php require_once 'views/layout/menu.php' ?>

<div class="success-container">
        <div class="success-box">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-check-circle">
                    <path d="M9 12l2 2 4-4"></path>
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            <h1>Thanh toán thành công!</h1>
            <p>Cảm ơn bạn đã mua sắm với chúng tôi.</p>
            <a href="<?= BASE_URL . '?act=trangchu' ?>" id="back-home">
                <button>Về Trang chủ</button>
            </a>
        </div>
    </div>

<script src="./LayoutClient/js/cart.js"></script>



<?php require_once 'views/layout/footer.php' ?>