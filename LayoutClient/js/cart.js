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