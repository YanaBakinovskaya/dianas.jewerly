$('.btn-add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function () {
            // $('.ico-products').html();
            $('.menu-quantity').html(+$('.menu-quantity').html() + 1);
            $('.menu-sum').html();
        },
        error: function () {
            alert('error');
        }
    })
})

$('#wrapper').on('click', '.delete', function (event) {
    event.preventDefault();
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            $('#wrapper').html(res);
            if ($('.total-Q').html()) {
                $test = $('.menu-quantity').html($('.total-Q').html());
                $sum = $('.menu-sum').html($('.total-S').html());
            } else {
                $('.menu-quantity').html('0');
                $('.menu-sum').html('0');
            }

        },
        error: function () {
            alert('error');
        }
    })
});

$('.btn-grey').on('click', function () {
    $.ajax({
        url: '/cart/index',
        type: 'GET',
        success: function (res) {
            console.log(res);

        },
        error: function () {
            alert('error');
        }
    })
});