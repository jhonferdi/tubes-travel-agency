$(window).scroll(function() {
    var wScroll = $(this).scrollTop();

    $('section.konten div.bgImg img').css({
        'transform' : 'translate(0px, '+ wScroll/20 +'%)'
    });
    
    $('section#konten1 div h1').css({
        'transform' : 'translate(0px, '+ wScroll/20 +'%)'
    });

    $('section#konten1 div p').css({
        'transform' : 'translate(0px, '+ wScroll/10 +'%)'
    });
    $('section#konten2 div h1').css({
        'transform' : 'translate(0px, '+ wScroll/40 +'%)'
    });

    $('section#konten2 div p').css({
        'transform' : 'translate(0px, '+ wScroll/25 +'%)'
    });

});

var counter = 1;
setInterval(function(){
    document.getElementById(`radio` + counter).checked = true;
    counter++;
    if (counter>3){
        counter=1;
    }
},5000);

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}
const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}