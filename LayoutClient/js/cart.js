document.addEventListener('DOMContentLoaded', () => {
    // Lấy tất cả các dòng sản phẩm
    const quantityControls = document.querySelectorAll('.pro-qty');
    const checkoutButton = document.querySelector('.checkout-btn');

    const codRadio = document.querySelector('input[value="1"]');
    const atmRadio = document.querySelector('input[value="2"]'); 
    const atmQrCodeContainer = document.getElementById("atm-qr-code"); 
    const qrCodeContainer = document.getElementById("qr-code");

    quantityControls.forEach(control => {
        const input = control.querySelector('.qty-input');
        const incrementBtn = control.querySelector('.increment');
        const decrementBtn = control.querySelector('.decrement');

        // Xử lý sự kiện tăng số lượng
        incrementBtn.addEventListener('click', () => {
            let quantity = parseInt(input.value);
            if (!isNaN(quantity)) {
                input.value = quantity + 1;
            }
        });

        // Xử lý sự kiện giảm số lượng
        decrementBtn.addEventListener('click', () => {
            let quantity = parseInt(input.value);
            if (!isNaN(quantity) && quantity > 1) {
                input.value = quantity - 1;
            }
        });

        // Đảm bảo giá trị nhập vào là số hợp lệ
        input.addEventListener('input', () => {
            let value = parseInt(input.value);
            if (isNaN(value) || value <= 0) {
                input.value = 1;
            }
        });

        checkoutButton.addEventListener('click', () => {
            // Đường dẫn tới trang đích
            window.location.href = '?act=thanh-toan';
        });
    });

    // Thư viện tạo QR code (dùng thư viện qrcode.js)
    function generateQRCode(paymentDetails) {
        // Cấu hình QR Code
        const qrCode = new QRCode(qrCodeContainer, {
            text: paymentDetails, // Thông tin thanh toán ngân hàng
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }

    // Hiển thị/ẩn mã QR dựa trên phương thức thanh toán
    function togglePaymentMethod() {
        if (atmRadio.checked) {
            atmQrCodeContainer.style.display = "block"; // Hiển thị mã QR khi chọn ATM
            const paymentDetails = "Tên ngân hàng: Vietcombank\nSố tài khoản: 1036512474\nSố tiền: 1000000 đ"; // Thông tin thanh toán ngân hàng
            generateQRCode(paymentDetails); // Tạo mã QR với thông tin thanh toán
        } else {
            atmQrCodeContainer.style.display = "none"; // Ẩn mã QR khi không chọn ATM
        }
    }

    // Lắng nghe sự kiện thay đổi phương thức thanh toán
    codRadio.addEventListener("change", togglePaymentMethod);
    atmRadio.addEventListener("change", togglePaymentMethod);

    // Khởi tạo trạng thái khi trang tải
    togglePaymentMethod();
});
