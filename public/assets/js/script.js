let menu =document.querySelector('#menu-icon');
let navbar =document.querySelector('.navigation');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('nav-open')
}



