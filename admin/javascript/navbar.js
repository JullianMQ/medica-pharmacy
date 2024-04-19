document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-btn");
    const menu = document.querySelector(".navbar .menu");

    menuBtn.addEventListener("click", function () {
        menu.classList.toggle("active");
        menuBtn.classList.toggle("active");
    });
});