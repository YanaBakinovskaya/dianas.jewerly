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
            $('.menu-quantity').html();
            $('.menu-sum').html();
        },
        error: function () {
            alert('error');
        }
    })
})

$('.delete').on('click', function (event) {
    event.preventDefault();
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function () {
            if ($('.total-quantity').html()) {
                $('.menu-quantity').html();
            } else {
                $('.menu-quantity').html('(0)');
                $('.menu-sum').html('(0)');
            }

        },
        error: function () {
            alert('error');
        }
    })
});
$('.btn-grey').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/cart/order',
        type: 'GET',
        success: function () {
            alert('success');
        },
        error: function () {
            alert('error');
        }
    })
});