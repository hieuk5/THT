<?php require_once 'views/layout/header.php' ?>
<?php require_once 'views/layout/menu.php' ?>
<link rel="stylesheet" href="./LayoutClient/css/thongtincanhan.css">


<body>
    


    <div class="noidung">
        <div class="sizebar">
            <div class="nd">
            <a href="" style="color: orange; font-size: 25px;">Thông tin cá nhân</a>
            </div>
            <button class="btn btn-danger">
            <a  href="<?= BASE_URL . '?act=logout' ?>"  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất chứ?');" style="text-decoration: none; color: white; font-size: 25px; " >Đăng xuất</a>
            </button>
            

        </div>
        <div class="conten">
            <div class="img">
            <img src="<?= $user['hoten'] ?>" alt="Ảnh người dùng" width="150" height="150">
            </div>
            <div class="ttcanhan">
                <table>
                    <tr>
                       <th>Họ và tên: </th> 
                       <td><?= $user['hoten'] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh: </th> 
                        <td><?= $user['ngay_sinh'] ?></td>
                     </tr>
                     <tr>
                        <th>Email: </th> 
                        <td><?= $user['email'] ?></td>
                     </tr>
                     <tr>
                        <th>Địa chỉ: </th> 
                        <td><?= $user['diachi'] ?></td>
                     </tr>
                     <tr>
                        <th>Số điện thoại: </th> 
                        <td><?= $user['dienthoai'] ?></td>
                     </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="./LayoutClient/js/trangchu.js"></script>
    <?php require_once 'views/layout/footer.php' ?>