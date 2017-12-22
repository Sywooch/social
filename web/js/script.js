$('.city-selector').on('change', function () {
    if ($(this).val() == 'else') {
        $('.city_modal').arcticmodal();
    }
});