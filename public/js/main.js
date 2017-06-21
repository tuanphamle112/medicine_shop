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

    $('#attachfile').click(function () {
    $("#edit_photo").trigger('click'); // or triggerHandler or click()
    });

    // preview images
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $('#image_target').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#edit_photo").change(function(){
        readURL(this);
    });
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
$(document).on('click', '.user-change-password', function(){
    var dataParam = {};
    dataParam.old_password = $('.data-old-password').val();
    dataParam.new_password = $('.data-new-password').val();
    dataParam.confirm_password = $('.data-confirm-password').val();

    var tokenParam = $('meta[name=_token]').attr('content');
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : tokenParam }
    });
    $.ajax({
        url : window.location.origin + '/user/change-password',
        type : 'post',
        data: dataParam,
        success : function (result){
            if (result.error.status) {
                $('.noti-old-password').text(result.error.old_password);
                $('.noti-new-password').text(result.error.new_password);
                $('.noti-confirm-password').text(result.error.confirm_password);
                $('.change-password-notification').removeClass('alert alert-success alert-dismissible')
            } else {
                $('.noti-old-password').text('');
                $('.noti-new-password').text('');
                $('.noti-confirm-password').text('');
                $('.change-password-notification').addClass('alert alert-success alert-dismissible')
                $('.change-password-notification').text(result.message);
            }
        },
        error : function (result){
            var errors = result.responseJSON;
        }

    });
});
// slide product
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 4000
    })
});
$(document).on('click', '.login', function(){
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
            $(".span-heart").html(result);
        }
    });
});
$(document).on('click', '.notlogin', function(){
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
            $(".modal-body p").text('You have to login to mark medicines');
        }
    });
});

