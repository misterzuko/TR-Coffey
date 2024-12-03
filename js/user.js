document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.remove('navbar-transparent');
            navbar.classList.add('navbar-solid');
        } else {
            navbar.classList.remove('navbar-solid');
            navbar.classList.add('navbar-transparent');
        }
    });
});
const hamNav = document.querySelector('.ham-nav');
const navCol = document.querySelector('.collapse');
document.querySelector('#ham-bar').onclick = () => {
    hamNav.classList.toggle('active');
    navCol.classList.remove('collapse');
};

const burger = document.querySelector('#ham-bar');

document.addEventListener('click', function(e) {
    if (!burger.contains(e.target) && !navCol.contains(e.target)) {
        navCol.classList.remove('active');
    }
});
