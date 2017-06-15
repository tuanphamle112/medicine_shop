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

    $('#input-quality').on('rating.change', function(event, value, caption) {        // return $medicine_name->name
        $('#hidden-quality').val(value);
    });

    $('#star-main').rating({ step: 0.1, stars: 5,showCaption:false, showClear:false,disabled: true});



});

$(document).on('click', '.add-to-box2', function(){
    $.ajax({
        url : window.location.origin + '/detail/add-to-box',
        type : "get",
        dateType:"text",
        context: this,
        data : {
            medicine_id: $(this).attr("medicine_id"),
            user_id: $(this).attr("user_id")
        },
        success : function (result){
            $(".modal-body p").text(result);
        }
    });
});
$(document).on('click', '.detail-link', function(){
    $.ajax({
        url : window.location.origin + '/detail/add-to-box',
        type : "get",
        dateType:"text",
        context: this,
        data : {
            medicine_id: $(this).attr("medicine_id"),
            user_id: $(this).attr("user_id")
        },
        success : function (result){
            $(".modal-body p").text(result);
        }
    });
});
// slide product
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 4000
    })
});
//ajax load subcate
// $(document).on('click', '#linkToSubcate', function(){
//     subcatelink = $(#subpassingName).val();
//     console.log(subcatelink);
//     parentcatelink = $(#parentpassingName).val();
//     $.ajax({
//         url : window.location.origin + '/'+ parentcatelink'/'+subcatelink,
//         type : "get"

//     });
// });
// $(document).ready(function(){
//     subcatelink = $("#subpassingName").val();
//     // document.getElementById("subpassingName");
// // $("#subpassingName").val();
//     parentcatelink = $("#parentpassingName").val();
//     $("#linkToSubcate").click(function(){
//         $.ajax({url: '/'+ parentcatelink+'/'+subcatelink, success: function(result){
//             alert(subcatelink);
//         }});
//     });
// });