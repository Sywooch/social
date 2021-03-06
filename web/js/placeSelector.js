var isMainSearch = false;

var placeSelector = function () {
    this.getJsonList = function (country, area, city, search, callback) {
        $.ajax({
            url: '/ajax/get-json-list',
            type: 'post',
            data: {
                search: search,
                country: country,
                area: area,
                city: city
            }
        }).done(function(html) {
            callback(html);
        });
    };

    this.setSelectorPlace = function (html) {
        $('.main-selector').html(html);
        $('.city_modal').arcticmodal();
    };
},
modalWindow = $('.main-selector');

// Окошко выбора города.
$('.city-selector').on('change', function () {
    isMainSearch = !!$(this).hasClass('main-search');
    console.log(isMainSearch);
    // if ($(this).hasClass('main-search')) {
    //
    // }
    //     isMainSearch = true;

    if ($(this).val() == 'else') {
        var selector = new placeSelector;

        selector.getJsonList(null, null, null, null, selector.setSelectorPlace);
    }
});

// Поиск по странам
modalWindow.on('input', '.selector-country-search', function () {
    var selector = new placeSelector;

    selector.getJsonList(null, null, null, $(this).val(), selector.setSelectorPlace);
});

// Клик выбора страны
modalWindow.on('click', '.select-country', function () {
    var selector = new placeSelector;

    selector.getJsonList($(this).data('id'), null, null, null, selector.setSelectorPlace);
});

// Смена страны
modalWindow.on('click', '.change-country', function () {
    var selector = new placeSelector;

    selector.getJsonList(null, null, null, null, selector.setSelectorPlace);
});

// Поиск по областям
modalWindow.on('input', '.selector-area-search', function () {
    var selector = new placeSelector;

    selector.getJsonList($(this).data('id'), null, null, $(this).val(), selector.setSelectorPlace);
});

// Клик выбора области
modalWindow.on('click', '.select-area', function () {
    var selector = new placeSelector;

    selector.getJsonList(null, $(this).data('id'), null, null, selector.setSelectorPlace);
});

// Смена области
modalWindow.on('click', '.change-area', function () {
    var selector = new placeSelector;

    selector.getJsonList($(this).data('id'), null, null, $(this).val(), selector.setSelectorPlace);
});

// Поиск по городам
modalWindow.on('input', '.selector-city-search', function () {
    var selector = new placeSelector;

    selector.getJsonList(null, $(this).data('id'), null, $(this).val(), selector.setSelectorPlace);
});

// Клик выбора города
modalWindow.on('click', '.select-city', function () {
    var element = $(this);
    // Добавляем позицию в селектор.
    $('.city-selector').find('option').each(function (f, e) {
        if (e.value != 'else') {
            e.remove();
        } else {
            $(e).before('<option value="'+element.data('id')+'" selected>'+element.data('country')+', '+element.text()+'</option>');
        }

    });

    $('select').trigger('refresh');
    $('.city_modal').arcticmodal('close');

    if (isMainSearch) {
        location.href = '?c=' + element.data('id');
    }

});