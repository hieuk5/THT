<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppin', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #444;
        }

        .container {
            position: relative;
            width: 70vw;
            height: 80vh;
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #df5b4a, #520852);
            z-index: 6;
            transform: translateX(100%);
            transition: 1s ease-in-out;
        }

        .singin-singup {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            z-index: 5;

        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 40%;
            min-width: 238px;
            padding: 0 10px;
        }

        form.sign-in-form {
            opacity: 1;
            transition: 0.5s ease-in-out;
            transition-delay: 1s;
        }

        form.sign-up-form {
            opacity: 1;
            transition: 0.5s ease-in-out;
            transition-delay: 1s;
        }

        .title {
            font-size: 35px;
            color: #df5b4a;
            margin-bottom: 10px;
        }

        .input-field {
            width: 100%;
            height: 50px;
            background: #f0f0f0;
            margin: 10px 0;
            border: 2px solid #df5b4a;
            border-radius: 50px;
            display: flex;
            align-items: center;
        }

        .input-field i {
            flex: 1;
            text-align: center;
            color: #666;
            font-size: 18px;
        }

        .input-field input {
            flex: 5;
            background: none;
            border: none;
            outline: none;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            color: #444;
        }

        .btn {
            width: 150px;
            height: 50px;
            border: none;
            border-radius: 50px;
            background: #df5b4a;
            color: #fff;
            font-weight: 600;
            margin: 10px 0;
            text-transform: uppercase;
            cursor: pointer;
        }

        .btn:hover {
            background: #df5b4a;
        }

        .social-text {
            margin: 10px 0;
            font-size: 16px;
        }

        .social-media {
            display: flex;
            justify-content: center;
        }

        .social-icon {
            height: 45px;
            width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* color: #444; */
            border: 1px solid #444;
            border-radius: 50px;
            margin: 0 5px;
        }

        a {
            text-decoration: none;
        }

        .social-icon:hover {
            color: #df5b4a;
            border-color: #df5b4a;
        }

        .panels-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            width: 35%;
            min-width: 238px;
            padding: 0 10px;
            text-align: center;
            z-index: 6;
        }

        .left-panel {
            pointer-events: none;
        }

        .content {
            color: #fff;
            transition: 1.1s ease-in-out;
            transition-delay: 0.5s;
        }

        .panel h3 {
            font-size: 24px;
            font-weight: 600;
        }

        .panel p {
            font-size: 15px;
            padding: 10px 0;
        }

        .image {
            width: 50%;
            transition: 1.1s ease-in-out;
            transition-delay: 0.4s;
        }

        .left-panel .image,
        .left-panel .content {
            transform: translateX(-200%);
        }

        .right-panel .image,
        .right-panel .content {
            transform: translateX(0);
        }

        .account-text {
            display: initial;
        }

        /*animation*/

        .container.sign-up-mode::before {
            transform: translateX(0);
        }

        .container.sign-up-mode .right-panel .image,
        .container.sign-up-mode .right-panel .content {
            transform: translateX(200%);
        }

        .container.sign-up-mode .left-panel .image,
        .container.sign-up-mode .left-panel .content {
            transform: translateX(0);
        }

        .container.sign-up-mode form.sign-in-form {
            opacity: 0;
        }

        .container.sign-up-mode form.sign-up-form {
            opacity: 1;
        }

        .container.sign-up-mode .right-panel {
            pointer-events: none;
        }

        .container.sign-up-mode .left-panel {
            pointer-events: all;
        }

        /*responsive*/
        @media(max-width:779px) {
            .container {
                width: 100vw;
                height: 100vw;
            }
        }

        @media(max-width:635px) {
            .container::before {
                display: none;
            }

            form {
                width: 80%;
            }

            form.sign-up-form {
                display: none;
            }

            .container.sign-up-mode2 form.sign-up-form {
                display: flex;
                opacity: 1;
            }

            .container.sign-up-mode2 form.sign-in-form {
                display: none;
            }

            .panels-container {
                display: none;
            }

            .account-text {
                display: initial;
                margin-top: 30px;
            }
        }

        @media(max-width:320px) {
            form {
                width: 90%;
            }
        }
    </style>
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
                    <input type="text" placeholder="Username or Email" name="email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">Or Sign in with platform</p>
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
                <p class="account-text">Quên mật khẩu <a href="#" id="sign-up-btn2">Đăng ký</a></p>
            </form>


            <form action="" class="sign-up-form">
                <h2 class="title">THT Shop | Sing up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with platform</p>
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
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>

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