$('[action="/ajax/restore"]').on('beforeSubmit', function () {
    var form = $(this);

    $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        dataType: 'json'
    }).done(function(response) {
        $('.restore-customer-email').text(response.email);
        $('.popup_password_main').hide();
        $('.popup_password_result').fadeToggle(400);
    });
   return false;
});
// Выбор языков
$('.language-selector').on('change', function () {
    var element = $(this),
        value = element.find('option:selected').val(),
        text = element.find('option:selected').text();

    element.find('option:selected').remove();

    $('.language-selector-block > .language-selector-li').before(
        '<li class="selected-language">' +
        '<a href="javascript:void(0);" data-id="'+value+'">'+text+'</a>' +
        '</li>'
    );

    element.trigger('refresh');
});

// Убрать выбраный язык
$('.language-selector-block').on('click', 'a', function () {
    var element = $(this),
        selector = $('.language-selector');

    selector.append(
        '<option value="'+element.data('id')+'">'+element.text()+'</option>'
    );

    element.parent().remove();
    selector.trigger('refresh');
});

// Отправка формы второго шага.
$('#step-two-form').on('submit', function () {
    $('input[name="languages[]"]').remove();
    $('.selected-language a').each(function(i,param){
        console.log(param);
        $('<input />').attr('type', 'hidden')
            .attr('name', 'languages[]')
            .attr('value', $(param).data('id'))
            .appendTo('#step-two-form');
    });
});

// Поиск по интересам.
$('.interest-search').on('input', function () {
    var element = $(this);

    $.ajax({
        url: '/ajax/interest-search',
        type: 'post',
        data: {
            search: element.val()
        },
        dataType: 'json'
    }).done(function(response) {
        $('.search_hidden_line_interest.list').empty();
        $.each(response, function (f, element) {
            $('.search_hidden_line_interest.list').append('<div class="search_hidden_line_interest">' +
                '<button class="add_interest"><i class="flaticon-cross"></i></button>' +
                '<a href="javascript:void(0)" class="search_hidden_txt" data-id="'+element.id+'" data-cid="'+element.cid+'">'+element.name+'</a>' +
                '</div>');
            $('.search_hidden').show();
        });
    });
});

$('.search_hidden_line_interest.list').on('click', '.search_hidden_txt', function () {
    var element = $(this);

    if (!$('.categories_list_pull_' + element.data('cid')).hasClass('categories_list_pull_is_open')) {
        $('.categories_list_pull_' + element.data('cid')).trigger('click');
    }
    $('.interest-label.item-' + element.data('id')).trigger('click');
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