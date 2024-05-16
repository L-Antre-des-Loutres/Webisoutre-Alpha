document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');

    menuBtn.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        content.classList.toggle('active');
    });
});
