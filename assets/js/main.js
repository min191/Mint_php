const menuButton = document.querySelector('.menu-toggle');
const mainMenu = document.querySelector('.nav-links');

if (menuButton && mainMenu) {
    menuButton.addEventListener('click', function () {
        const isOpen = mainMenu.classList.toggle('open');
        menuButton.setAttribute('aria-expanded', String(isOpen));
    });
}
