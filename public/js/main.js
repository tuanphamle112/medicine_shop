$(document).ready(function(){
    $('.carousel-product').slick({
        variableWidth: true,
        infinite:true,
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 1200,
    });
    $("header").sticky({
        zIndex:1
    });
});

