    // slide
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");

    let currentIndex = 0;

    // Hàm hiển thị slide
    function showSlide(index) {
        // Đảm bảo chỉ số luôn trong giới hạn
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }
        // Cập nhật chỉ số hiện tại
        currentIndex = index;
        // Xóa lớp active khỏi tất cả các slide và nút
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            dots[i].classList.remove("active");
        });
        // Thêm lớp active vào slide và nút hiện tại
        slides[currentIndex].classList.add("active");
        dots[currentIndex].classList.add("active");
    }
    // Chuyển sang slide tiếp theo
    function nextSlide() {
        showSlide(currentIndex + 1);
    }
    // Chuyển về slide trước đó
    function prevSlide() {
        showSlide(currentIndex - 1);
    }
    // Lắng nghe sự kiện click vào nút Next và Back
    nextButton.addEventListener("click", nextSlide);
    prevButton.addEventListener("click", prevSlide);
    // Lắng nghe sự kiện click vào các nút chấm (dots)
    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            showSlide(index);
        });
    });
    // Tự động chuyển slide sau mỗi 4 giây
    setInterval(nextSlide, 4000);





    // animation
    // Lấy tất cả các phần tử có lớp "hidden"
    const hiddenElements = document.querySelectorAll('.hidden');
    function checkVisibility() {
        hiddenElements.forEach((element) => {
            const rect = element.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            // Kiểm tra nếu phần tử nằm trong vùng nhìn thấy của trình duyệt
            if (rect.top < windowHeight - 100) { // Điều chỉnh giá trị -100 theo ý muốn
                element.classList.add('show');
            } else {
                element.classList.remove('show'); // Tùy chọn: Ẩn lại khi cuộn ngược
            }
        });
    }
    // Lắng nghe sự kiện cuộn trang
    window.addEventListener('scroll', checkVisibility);
    // Gọi hàm một lần khi tải trang
    checkVisibility();


    //Product
        document.addEventListener("DOMContentLoaded", function () {
        const prevBtn = document.querySelector(".prev-btn");
        const nextBtn = document.querySelector(".next-btn");
        const productWrapper = document.querySelector(".product-wrapper");
        const productItems = document.querySelectorAll(".product-container .pro-item");
        const totalVisibleProducts = 4;  // Số sản phẩm hiển thị mỗi lần
        let productIndex = 0;  // Chỉ số hiện tại của sản phẩm

        // Cập nhật slide sản phẩm
        function updateSlide() {
            const productWidth = productItems[0].offsetWidth;  // Lấy chiều rộng của sản phẩm đầu tiên
            const totalProducts = productItems.length;

            // Đảm bảo chỉ mục không vượt qua giới hạn
            if (productIndex < 0) {
                productIndex = 0;
            } else if (productIndex > totalProducts - totalVisibleProducts) {
                productIndex = totalProducts - totalVisibleProducts;  // Không vượt qua sản phẩm cuối
            }

            // Áp dụng hiệu ứng trượt cho phần tử product-wrapper
            productWrapper.style.transition = "transform 0.5s ease";  // Thêm hiệu ứng trượt mượt mà
            productWrapper.style.transform = `translateX(-${productIndex * productWidth}px)`;  // Dịch chuyển wrapper

            // Cập nhật trạng thái của các nút (disable khi đến cuối hoặc đầu danh sách)
            prevBtn.disabled = productIndex === 0;
            nextBtn.disabled = productIndex >= totalProducts - totalVisibleProducts;
        }

        // Lắng nghe sự kiện click vào nút "Next"
        nextBtn.addEventListener("click", () => {
            const totalProducts = productItems.length;
            if (productIndex < totalProducts - totalVisibleProducts) {  // Kiểm tra nếu không đến cuối sản phẩm
                productIndex++;  // Tăng chỉ số sản phẩm
                updateSlide();
            }
        });

        // Lắng nghe sự kiện click vào nút "Prev"
        prevBtn.addEventListener("click", () => {
            if (productIndex > 0) {
                productIndex--;  // Giảm chỉ số sản phẩm
                updateSlide();
            }
        });

        // Gọi hàm updateSlide lần đầu để hiển thị sản phẩm đầu tiên
        updateSlide();
    });



    // product-hot
        document.addEventListener("DOMContentLoaded", function () {
        const prevBtnHot = document.querySelector(".prev-btn-hot");
        const nextBtnHot = document.querySelector(".next-btn-hot");
        const productWrapperHot = document.querySelector(".product-wrapper-hot");
        const productItemsHot = document.querySelectorAll(".product-container-hot .pro-item");
        const totalVisibleProductsHot = 4; // Số sản phẩm hiển thị mỗi lần
        let productIndexHot = 0;

        // Cập nhật slide sản phẩm
        function updateSlideHot() {
            const productWidthHot = productItemsHot[0].offsetWidth; // Lấy chiều rộng của sản phẩm đầu tiên
            const totalProductsHot = productItemsHot.length;

            // Đảm bảo chỉ mục không vượt qua giới hạn
            if (productIndexHot < 0) {
                productIndexHot = 0;
            } else if (productIndexHot > totalProductsHot - totalVisibleProductsHot) {
                productIndexHot = totalProductsHot - totalVisibleProductsHot;
            }

            // Áp dụng hiệu ứng trượt cho phần tử product-wrapper-hot
            productWrapperHot.style.transition = "transform 0.5s ease";
            productWrapperHot.style.transform = `translateX(-${productIndexHot * productWidthHot}px)`;

            // Cập nhật trạng thái của các nút
            prevBtnHot.disabled = productIndexHot === 0;
            nextBtnHot.disabled = productIndexHot >= totalProductsHot - totalVisibleProductsHot;
        }

        // Lắng nghe sự kiện click vào nút "Next"
        nextBtnHot.addEventListener("click", () => {
            const totalProductsHot = productItemsHot.length;
            if (productIndexHot < totalProductsHot - totalVisibleProductsHot) {
                productIndexHot++;
                updateSlideHot();
            }
        });

        // Lắng nghe sự kiện click vào nút "Prev"
        prevBtnHot.addEventListener("click", () => {
            if (productIndexHot > 0) {
                productIndexHot--;
                updateSlideHot();
            }
        });

        // Gọi hàm updateSlideHot lần đầu để hiển thị sản phẩm đầu tiên
        updateSlideHot();
    });

    // hiệu ứng login
    // Hiển thị dropdown khi nhấn vào icon
    const dropdownIcon = document.querySelector('.dropdown-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle menu khi click vào icon
    dropdownIcon.addEventListener('click', (e) => {
        e.stopPropagation(); // Ngăn click lan ra ngoài
        const isHidden = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '';
        dropdownMenu.style.display = isHidden ? 'block' : 'none';
    });

    // Ẩn menu khi click ra ngoài
    document.addEventListener('click', () => {
        dropdownMenu.style.display = 'none';
    });