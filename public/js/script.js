// Menu burger
let menuToggled = false;
let divCtn = document.querySelector('.nav-div-container');
document.querySelector('.menu-burger').addEventListener('click', function(event) {
    if(menuToggled === false) {
        divCtn.style.left = "0";
        menuToggled = true;
    } else if (menuToggled) {
        divCtn.style.left = "-" + window.innerWidth;
        menuToggled = false;
    }
})