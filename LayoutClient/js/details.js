// Chọn các phần tử cần thiết từ DOM
document.addEventListener('DOMContentLoaded', function () {
    const capacityButtons = document.querySelectorAll('.capacity-options .capacity');
    const contactMessage = document.querySelector('.contact-message');
    const quantityMain = document.querySelector('.quantity-main');
    const price = document.querySelector('.price');
    const purchaseButtons = document.querySelector('.purchase-buttons');
    const quantityInput = document.getElementById('product-quantity');
    const originalPriceElement = document.getElementById('total-price');
    const errorMessage = document.getElementById('error-message');

    // Lấy giá gốc từ HTML
    const basePrice = parseInt(originalPriceElement.getAttribute('data-price'), 10);

    if (isNaN(basePrice)) {
        console.error("Giá sản phẩm không hợp lệ.");
        return;
    }

    // Hàm định dạng số tiền
    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(value);
    }

    // Cập nhật tổng giá khi người dùng thay đổi số lượng
    quantityInput.addEventListener('input', function () {
        let quantityValue = parseInt(quantityInput.value, 10) || 1;

        // Đảm bảo số lượng không nhỏ hơn 1
        if (quantityValue < 1) quantityValue = 1;
        quantityInput.value = quantityValue;

        // Tính toán tổng giá
        const totalPrice = basePrice * quantityValue;
        originalPriceElement.textContent = formatCurrency(totalPrice);
    });

    // Hàm xử lý khi người dùng chọn dung lượng
    function handleCapacitySelection(event) {
        const selectedCapacity = event.target.dataset.value;

        if (selectedCapacity === '256GB' || selectedCapacity === '512GB') {
            contactMessage.style.display = 'block';
            quantityMain.style.display = 'none';
            price.style.display = 'none';
            purchaseButtons.style.display = 'none';
        } else {
            contactMessage.style.display = 'none';
            quantityMain.style.display = 'block';
            price.style.display = 'block';
            purchaseButtons.style.display = 'block';

            // Reset giá trị số lượng và tổng giá
            quantityInput.value = 1;
            const totalPrice = basePrice * 1;
            originalPriceElement.textContent = formatCurrency(totalPrice);
        }
    }

    // Gán sự kiện cho các nút dung lượng
    capacityButtons.forEach(button => {
        button.addEventListener('click', handleCapacitySelection);
    });

    // Kiểm tra thông tin trước khi gửi form
    document.getElementById('productForm')?.addEventListener('submit', function (e) {
        const quantity = parseInt(quantityInput.value, 10) || 1;

        // Reset thông báo lỗi
        errorMessage.style.display = "none";
        errorMessage.textContent = "";

        // Kiểm tra số lượng
        if (quantity < 1 || isNaN(quantity)) {
            errorMessage.textContent = "Số lượng không hợp lệ.";
            errorMessage.style.display = "block";
            e.preventDefault();
            return;
        }
    });
});

function changeMainImage(thumbnail) {
    // Lấy đường dẫn của ảnh được click
    const newImageSrc = thumbnail.src;

    // Tìm phần tử ảnh chính
    const mainImage = document.querySelector('.img-main img');

    // Cập nhật ảnh chính với đường dẫn mới
    if (mainImage) {
        mainImage.src = newImageSrc;
    } else {
        console.error('Không tìm thấy phần tử ảnh chính!');
    }
}

