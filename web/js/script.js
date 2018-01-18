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

$('.company-invite').on('click', function () {
    var link = $(this),
        companyID = link.data('companyid'),
        participantID = link.data('participantid');

    $.ajax({
        url: '/ajax/company-invite',
        type: 'post',
        data: {
            companyID: companyID,
            participantID: participantID
        },
        dataType: "json",
        success: function () {
            location.reload();
        }
    });
});

// Подписка обьявы
$('.ads-invite').on('click', function () {
    var link = $(this),
        adsID = link.data('adsid'),
        participantID = link.data('participantid');

    $.ajax({
        url: '/ajax/ads-invite',
        type: 'post',
        data: {
            adsID: adsID,
            participantID: participantID
        },
        dataType: "json",
        success: function () {
            location.reload();
        }
    });
});

// Отписка от обьявы
$('.ads-unsubscribe').on('click', function () {
    var link = $(this),
        adsID = link.data('adsid'),
        participantID = link.data('participantid');

    $.ajax({
        url: '/ajax/ads-unsubscribe',
        type: 'post',
        data: {
            adsID: adsID,
            participantID: participantID
        },
        dataType: "json",
        success: function () {
            location.reload();
        }
    });
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

$('.white_tag').on('click', function () {
    if ($(this).hasClass('hovered')) {
        $(this).removeClass('hovered');
    } else {
        $(this).addClass('hovered');
    }
});

// Смена вкладок поиска.
$('.tab').on('click', function () {
    $('.tab').removeClass('current');
    $(this).addClass('current');

    $('.search_page_results').hide();
    $('.search_page_results.' + $(this).data('page')).show();
});

// Всплывающий список для строки поиска

/*
$('.white_input').click(function () {
    $(this).parents('.main_search').find('.search_hidden').fadeToggle(400);
    $(this).parents('.main_search').find('.white_input').toggleClass('white_input_is_open');
});
*/
$(document).click( function(){
    if( $(event.target).closest(".main_search").length )
        return;
    $(".search_hidden").fadeOut(400);
});

// Форма волшебного поиска
$('#magic-search-form').on('submit', function () {
    $('input[name="SearchForm[interest][]"]').remove();
    $('.white_tag.hovered').each(function(i,param){
        $('<input />').attr('type', 'hidden')
            .attr('name', 'SearchForm[interest][]')
            .attr('value', $(param).data('id'))
            .appendTo('#magic-search-form');
    });
});