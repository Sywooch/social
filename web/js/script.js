// Окошко выбора города.
$('.city-selector').on('change', function () {
    if ($(this).val() == 'else') {
        $('.city_modal').arcticmodal();
    }
});

// Отправка сообщения с публичной странички пользователя.
$('.user-send-message').on('click', function () {
    var textField = $('.user-send-message-field');
    if (textField.is(':visible')) {
        $('#profile-message-form').submit();
    }
    if (textField.is(':hidden')) {
        textField.show();
    }
});

$('.ads-invite').on('click', function () {

});

// Действие добавления в друзья.
$('.add_friend_link').click(function(e){
    var link = $(this),
        customerID = link.data('customerid'),
        friendID = link.data('friendid');
    e.preventDefault();

    $.ajax({
        url: '/ajax/friend-invite',
        type: 'post',
        data: {
            customerID: customerID,
            friendID: friendID
        },
        dataType: "json",
        success: function (response) {
            link.hide();
            link.parent().find('.add_friend_mod').arcticmodal();
        }
    });
});