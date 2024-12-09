document.addEventListener('DOMContentLoaded', () => {
    // Lấy tất cả các dòng sản phẩm
    const quantityControls = document.querySelectorAll('.pro-qty');
    const checkoutButton = document.querySelector('.checkout-btn');

    const codRadio = document.querySelector('input[value="1"]');
    const atmRadio = document.querySelector('input[value="2"]'); 
    const atmQrCodeContainer = document.getElementById("atm-qr-code"); 
    const qrCodeContainer = document.getElementById("qr-code");
    const totalOrderElement = document.querySelector('.total');
    const shippingCost = 30000; // Phí vận chuyển cố định

    quantityControls.forEach(control => {
        const input = control.querySelector('.qty-input');
        const incrementBtn = control.querySelector('.increment');
        const decrementBtn = control.querySelector('.decrement');
        const row = control.closest('tr');
        const priceElement = row.querySelector('td:nth-child(2) span'); // Giá sản phẩm
        const totalElement = row.querySelector('td:nth-child(4)'); // Cột tổng tiền

        // Chuyển đổi giá từ text sang số
        const parsePrice = (priceText) => {
            return parseInt(priceText.replace(/\./g, '').replace('đ', '')) || 0;
        };

        // Định dạng số thành tiền tệ
        const formatPrice = (price) => {
            return price.toLocaleString('vi-VN') + ' đ';
        };

        const updateRowTotal = () => {
            const price = parsePrice(priceElement.textContent);
            const quantity = parseInt(input.value) || 1;
            const rowTotal = price * quantity;
            totalElement.textContent = formatPrice(rowTotal);
            updateCartTotal();
        };

        const updateCartTotal = () => {
            const allRows = document.querySelectorAll('.cart-table tbody tr');
            let totalCart = 0;

            allRows.forEach(row => {
                const rowTotalText = row.querySelector('td:nth-child(4)').textContent;
                const rowTotal = parsePrice(rowTotalText);
                totalCart += rowTotal;
            });

            // Cập nhật tổng đơn hàng và tổng thanh toán
            document.querySelector('.summary-item span:nth-child(2)').textContent = formatPrice(totalCart);
            totalOrderElement.textContent = formatPrice(totalCart + shippingCost);
        };

        // Xử lý sự kiện tăng số lượng
        incrementBtn.addEventListener('click', () => {
            let quantity = parseInt(input.value);
            if (!isNaN(quantity)) {
                input.value = quantity + 1;
                updateRowTotal();
            }
        });

        // Xử lý sự kiện giảm số lượng
        decrementBtn.addEventListener('click', () => {
            let quantity = parseInt(input.value);
            if (!isNaN(quantity) && quantity > 1) {
                input.value = quantity - 1;
                updateRowTotal();
            }
        });

        // Đảm bảo giá trị nhập vào là số hợp lệ
        input.addEventListener('input', () => {
            let value = parseInt(input.value);
            if (isNaN(value) || value <= 0) {
                input.value = 1;
            }
            updateRowTotal();
        });
    });

    checkoutButton.addEventListener('click', () => {
        // Đường dẫn tới trang đích
        window.location.href = '?act=thanh-toan';
    });

    // Thư viện tạo QR code (dùng thư viện qrcode.js)
    function generateQRCode(paymentDetails) {
        // Cấu hình QR Code
        // const qrCode = new QRCode(qrCodeContainer, {
        //     text: paymentDetails, // Thông tin thanh toán ngân hàng
        //     correctLevel: QRCode.CorrectLevel.H
        // });
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
