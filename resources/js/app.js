import './bootstrap';

import Alpine from 'alpinejs';

const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'vertical',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

var counterPlaceHolder = document.getElementById("counter-placeholder");
var btnIncrement = document.getElementById("btn-increment");
var btnDecrement = document.getElementById("btn-decrement");

var number = 1;

btnIncrement.addEventListener("click", function(){
    number++;
    counterPlaceHolder.value = number;
});

btnDecrement.addEventListener("click", function(){
    if(number > 1) {
        number--;
    }
    counterPlaceHolder.value = number;
});

window.Alpine = Alpine;

Alpine.start();
