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

        // Tự động chuyển slide sau mỗi 3 giây
        setInterval(nextSlide, 5000);