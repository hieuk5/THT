<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./LayoutClient/css/login.css">
</head>

<body>
    <div class="container">
        <div class="singin-singup">

            <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error'] ?></p>
                <?php } else {
                ?><p class="login-box-msg text-center">Vui lòng đăng nhập</p>
                <?php } ?>
                <h2 class="title">THT Shop | Sing in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">Hoặc đăng nhập bằng nền tảng</p>
                <div class="social-media">
                    <a href="" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="account-text">Quên mật khẩu - <a href="#" id="sign-up-btn2">Đăng ký</a></p>
            </form>


            <form action="<?= BASE_URL . '?act=check-signup' ?>" method="post" class="sign-up-form">
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error'] ?></p>
                <?php } else {
                ?><p class="login-box-msg text-center">Vui lòng đăng ký</p>
                <?php } ?>

                <h2 class="title">THT Shop | Sing up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Hoặc đăng nhập bằng nền tảng</p>
                <div class="social-media">
                    <a href="" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                

            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <p>Welcome to THT Shop, Vietnam's number 1 phone store.</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="./LayoutClient/img/svg1.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <p>Welcome to THT Shop, Vietnam's number 1 phone store.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="./LayoutClient/img/svg2.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="./LayoutClient/js/login.js"></script>

</body>

</html>