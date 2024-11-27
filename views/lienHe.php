<head>
    <link rel="stylesheet" href="./LayoutClient/css/contact.css">
</head>

<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>

<body>
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

    <main>
        <div class="contact-page">
            <!-- Phần trên: thông tin liên hệ -->
            <div class="contact-info-section">
                <div class="info-box">
                    <h3>ADDRESS</h3>
                    <p>13 P. Trịnh Văn Bô, Xuân Phương,
                        Nam Từ Liêm, Hà Nội</p>
                </div>
                <div class="info-box">
                    <h3>CONTACT DETAILS</h3>
                    <p>Email: THTshop@gmail.com</p>
                    <p>Phone: 0376223847</p>
                </div>
                <div class="info-box">
                    <h3>SOCIAL NETWORKS</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    
                </div>
            </div>
    
            <!-- Phần dưới: ảnh + form liên hệ -->
            <div class="contact-content">
                <!-- Ảnh lớn bên trái -->
                <div class="image-container">
                    <img src="./LayoutClient/img/contact3.png" alt="House Image">
                </div>
                <!-- Form liên hệ bên phải -->
                <div class="form-container">
                    <h3>CONTACT</h3>
                    <h2>CONNECT WITH US NOW</h2>
                    <form>
                        <div class="form-group">
                            <input type="text" name="first-name" placeholder="First Name" required>
                            <input type="text" name="last-name" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="phone" placeholder="Phone Number" required>
                        </div>
                        <textarea name="message" placeholder="Message" rows="5" required></textarea>
                        <button type="submit">Send Information</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="./LayoutClient/js/trangchu.js"></script>
</body>





<?php require_once 'views/layout/footer.php' ?>