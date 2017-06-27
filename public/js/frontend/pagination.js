$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        console.log(page);
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getreviewInformation(page);
        }
    }
});

$(document).ready(function() {
    $(document).on('click', '#frontend-review-paginate .pagination a', function (e) {
        getreviewInformation($(this).attr('href').split('page=')[1]);
        $('#frontend-review-paginate .pagination').find('li').removeClass('active');
        $(this).parent().addClass('active');
        $('#frontend-review-indicator').removeClass('hide');
        e.preventDefault();
    });
});

function getreviewInformation(page) {
    $.ajax({
        url : '?page=' + page,
        dataType: 'json',
    }).done(function (data) {
        $('#frontend-area-review ul').html(data);
        $('.detail-rating').rating({ step: 1, stars: 5,showCaption:false, showClear:false});
        $('#frontend-review-indicator').addClass('hide');
    }).fail(function () {
        $('#frontend-review-indicator').addClass('hide');
        alert('Posts could not be loaded.');
    });
}
