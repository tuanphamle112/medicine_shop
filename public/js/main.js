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

    $('#input-reliable').on('rating.change', function(event, value, caption) {
        console.log(caption);
        $('#hidden-reliable').val(value);
    });

    $('#input-quality').on('rating.change', function(event, value, caption) {
        $('#hidden-quality').val(value);
    });
});

