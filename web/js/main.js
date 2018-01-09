(function() {

    $(function() {
        var _dropdown;
        var settings = {autoReinitialise: true};
        $('.styler, select').styler({
            selectSearch: false,
            onFormStyled: function(){
                _dropdown = $('.jq-selectbox__dropdown');
                _dropdown.find('ul').wrap('<div class="scroll-pane" />');
            },
            onSelectOpened: function(){
                var _ul = $(this).find('.jq-selectbox__dropdown ul');
                var height = _ul.height();
                var _srollPane = _dropdown.find('.scroll-pane');
                _srollPane.height(height);
                _ul.css('max-height', 'none');
                $(".scroll-pane").mCustomScrollbar({
                    scrollInertia:400
                });
            }
        });
    });

    $(window).on("load",function(){
        $(".typical_scroll").mCustomScrollbar({
            scrollInertia:400
        });
    });
    // Swiper
    var swiper = new Swiper('.swiper_main', {
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: '.sw_pag_1',
        paginationClickable: true,
        loop: true,
        autoplay: 8000,
        autoplayDisableOnInteraction:true,
        effect: 'fade',
        speed: 3000
    });
    
    var swiper = new Swiper('.profile_slider_main', {
        slidesPerView: 6,
        spaceBetween: 7,
        nextButton: '.sw_next_1'
    });
    
    
    $(document).ready(function(){
        let mainInLoad = false;
        $('.wall_comments_more').click(function () {
            if (mainInLoad === true || typeof(enable_scroll_loading) === 'undefined')
                return;

            var currentPage = $('#currentPage').val();
            var lastPage = $('#lastPage').val();
            if (parseInt(currentPage) >= parseInt(lastPage)) {
                return;
            }
            var loadPage = parseInt(currentPage) + 1;
            $('#currentPage').val(loadPage);
            mainInLoad = true;
            $('.wall_comments_more').hide();
            $.get(
                '/profile/load-comment',
                {
                    page: loadPage,
                    _csrf: $('[name="_csrf"]').val()
                },
                function (response) {
                    mainInLoad = false;
                    if (parseInt(loadPage) < parseInt(lastPage)) {
                        $('.wall_comments_more').show();
                    }

                    $('.comments-pull').append(response);
                }
            ).fail(function () {
                mainInLoad = false;
                $('.wall_comments_more').show();
            });
        });

        $(document).on('click', '.typical_link.answer', function () {
            $(this).hide().parent().find('.wall_comment_item.answer').toggle();
        });
        // pull
        $('.birth_date_pull').click(function(){
            $(this).parents('.typical_birth_date').find('.birth_date_hidden').fadeToggle(400);
            $(this).parents('.typical_birth_date').find('.birth_date_pull').toggleClass('birth_date_pull_is_open');
            $('.typical_birth_date').toggleClass('typical_birth_date_is_open');
            $(".typical_scroll").mCustomScrollbar({
                scrollInertia:400
            });


        });
        
        $('.birth_date_hidden input.styler').change(function(){
            if (($('input[name=b_day]:checked').val() != null)&&($('input[name=b_month]:checked').val() != null)&&($('input[name=b_year]:checked').val() != null)) {
                var txt = '';
                $(".birth_date_hidden .checked").each(function(){
                    txt += $(this).parent().find('span').text() + ' ';
                });
                $('.birth_date_pull').text(txt);
                $('[name="RegisterForm[birthday]"]').val(txt);

                $('.birth_date_hidden').fadeToggle(400);  
                
                $('.birth_date_chosen .jq-radio').toggleClass('checked');  
                $(this).parents('.birth_date_chosen_wrap').find('.birth_date_chosen2 .jq-radio').removeClass('checked'); 
            };
        });
        // pull
        $('.foot_input').click(function(){
            $(this).parents('.form_foot').find('.foot_capcha').fadeIn(400);  
            $(this).parents('.form_foot').find('.foot_capcha').addClass('foot_capcha_is_open');
        });

        // pull
        $('.more_gr_tags').click(function(){
            $(this).parents('.recent_search_item_tags').find('.hidden_gr_tags').fadeToggle(400);  
            $(this).parents('.recent_search_item_tags').find('.more_gr_tags').toggleClass('more_gr_tags_is_open');
        });
        
        // pull
        $('.more_gr_tags').click(function(){
            $(this).parents('.companies_recomandations_item_tags').find('.hidden_gr_tags').fadeToggle(400);  
            $(this).parents('.companies_recomandations_item_tags').find('.more_gr_tags').toggleClass('more_gr_tags_is_open');
        });
        
        // pull
        $('.filter_chbx_green_pull').click(function(){
            $(this).parents('.wrap_filter_chbx_green').find('.filter_chbx_green_hidden').fadeToggle(400);  
            $(this).parents('.wrap_filter_chbx_green').find('.filter_chbx_green_pull').toggleClass('filter_chbx_green_pull_is_open');
        });

        // pull
        $('.hidden_filter_pull').click(function(){
            $(this).parents('.hidden_filter_block').find('.hidden_filter').fadeToggle(400);  
            $(this).parents('.hidden_filter_block').find('.hidden_filter_pull').toggleClass('hidden_filter_pull_is_open');
        });
        
        // pull
        $('.hidden_filter_pull').click(function(){
            $(this).parents('.search_page').find('.search_page_filter').slideToggle(400);  
            $(this).parents('.search_page').find('.hidden_filter_pull').toggleClass('hidden_filter_pull_is_open');
        });
        
        // pull
        $('.white_tags_pull').click(function(){
            $(this).parents('.tags_block').find('.tags_block_hidden').fadeToggle(400);  
            $(this).parents('.tags_block').find('.white_tags_pull').toggleClass('white_tags_pull_is_open');
            $('.tags_block').toggleClass('tags_block_is_open');
        });
        
        $('.white_input').click(function () {
            $(this).parents('.main_search').find('.search_hidden').fadeToggle(400);  
            $(this).parents('.main_search').find('.white_input').toggleClass('white_input_is_open');
        });
        
        $('.basket_btn_close').click(function () {
            $(this).parents('.wrap_pay_line').find('.pay_line_to_delete').fadeToggle(400);  
        });
        
        
        $('.language-select').click(function(){
            $(this).toggleClass('open');
        })

        $('.language-select li').click(function(){
            var setLang = $('.language-select').data('location'),
                dataLangSelect = $(this).data('lang')
            $('.language-select').data('location', dataLangSelect);
            $('.language-select li').removeClass('active');
            $(this).toggleClass('active');
        })
        
        $(document).mouseup(function (e) {
            var container = $(".popup_password");
            if (container.has(e.target).length === 0){
                container.hide();
            }
        });
        
        $(document).keydown(function(e) {
            // ESCAPE key pressed
            if (e.keyCode == 27) {
                $(".popup_password").hide();
            }
        });

        $('.head_form_link').click(function(){
            $('.popup_password_main').fadeToggle(400);  
        });
        
        $('.close_password').click(function(){
            $('.popup_password').hide();  
        });
        
        $('.popup_pass_mist_pull').click(function(){
            $('.popup_password_mistake').fadeToggle(400);  
        });
        
        $('.popup_pass_res_pull').click(function(){
            $('.popup_password_result').fadeToggle(400);  
        });
        
        
        $('div.tabs').on('click', 'span:not(.current)', function() {  
            $(this).addClass('current').siblings().removeClass('current')  
                .parents('div.profile_settings_tabs').find('div.box').eq($(this).index()).fadeIn(400).siblings('div.box').hide();  
        });
        
        $('div.tabs').on('click', 'span:not(.current)', function() {  
            $(this).addClass('current').siblings().removeClass('current')  
                .parents('div.participants_tabs').find('div.box').eq($(this).index()).fadeIn(400).siblings('div.box').hide();  
        });
        
        $('.profile_photo_item_visible').click(function(e){
            e.preventDefault();
            $(this).parent().find('.profile_photo_mod').arcticmodal();
        });
        
        $('.raise_link').click(function(e){
            e.preventDefault();
            $(this).parent().find('.announcement_mod').arcticmodal();
        });
        
        $('.wall_post_img_link').click(function(e){
            e.preventDefault();
            $(this).parent().find('.wall_post_mod').arcticmodal();
        });
        
        $('.avatar_mod_link').click(function(e){
            e.preventDefault();
            $(this).parent().find('.avatar_mod').arcticmodal();
        });
        

        // pull
        $('.categories_list_pull_1').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_1').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_1').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_2').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_2').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_2').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_3').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_3').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_3').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_4').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_4').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_4').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_5').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_5').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_5').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_6').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_6').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_6').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_7').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_7').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_7').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_8').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_8').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_8').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_9').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_9').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_9').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_10').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_10').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_10').toggleClass('categories_list_pull_is_open');
        });
        
        $('.categories_list_pull_11').click(function(){
            $(this).parents('.wrap_categories').find('.category_item_11').fadeToggle(400);  
            $(this).parents('.wrap_categories').find('.categories_list_pull_11').toggleClass('categories_list_pull_is_open');
        });

    });

    $(document).click( function(){
        if( $(event.target).closest(".main_search").length ) 
            return;
        $(".search_hidden").fadeOut(400);

    });
    

    $(document).click( function(){
        if( $(event.target).closest(".form_foot").length ) 
            return;
        $(".foot_capcha").fadeOut(400);
        $('.foot_capcha').removeClass('foot_capcha_is_open');
    });
    
    addEventListener('DOMContentLoaded', function () {
        pickmeup('.calendar_input', {
            position       : 'left',
            hide_on_select : true,
            mode : 'range',
            locale : 'ru',
            default_date : false,
            locales : {
                ru : {
                    days        : ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                    daysShort   : ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                    daysMin     : ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                    months      : ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                    monthsShort : ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"]
                }
            },
        });
    });
    
//    в модалке
    
    window.addEventListener('DOMContentLoaded', function () {
        var image = document.getElementById('cropp_img1');
        var cropBoxData;
        var canvasData;
        var cropper;

        $('#crop_photo_link1').click(function(e){
            e.preventDefault();
            $(this).parent().find('#crop_photo_mod1').arcticmodal({
                afterClose: function(data, el) {
                    cropBoxData = cropper.getCropBoxData();
                    canvasData = cropper.getCanvasData();
                    cropper.destroy();
                }
            });
            cropper = new Cropper(image, {
                dragMode: 'move',
                                                            aspectRatio: 2 / 2,
                                                            autoCropArea: 0.5,
                                                            restore: true,
                                                            guides: false,
                                                            center: false,
                                                            highlight: false,
                                                            toggleDragModeOnDblclick: false,
                                                            viewMode: 3,
                ready: function () {
                    // Strict mode: set crop box data first
                    cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                }
            });
        });
    });
    
    window.addEventListener('DOMContentLoaded', function () {
        var image2 = document.getElementById('cropp_img2');
        var cropBoxData2;
        var canvasData2;
        var cropper2;

        $('#crop_photo_link2').click(function(e){
            e.preventDefault();
            $(this).parent().find('#crop_photo_mod2').arcticmodal({
                afterClose: function(data, el) {
                    cropBoxData2 = cropper2.getCropBoxData();
                    canvasData2 = cropper2.getCanvasData();
                    cropper2.destroy();
                }
            });
            cropper2 = new Cropper(image2, {
                dragMode: 'move',
                aspectRatio: 2 / 2,
                autoCropArea: 0.5,
                restore: true,
                guides: false,
                center: false,
                highlight: false,
                toggleDragModeOnDblclick: false,
                viewMode: 3,
                ready: function () {

                    // Strict mode: set crop box data first
                    cropper2.setCropBoxData(cropBoxData2).setCanvasData(canvasData2);
                }
            });
        });
    });

//    мое
    
//    window.addEventListener('DOMContentLoaded', function () {
//        var images = document.querySelectorAll('.cropp_img');
//        var length = images.length;
//        var croppers = [];
//        var i;
//
//        for (i = 0; i < length; i++) {
//            croppers.push(new Cropper(images[i], {
//                            dragMode: 'move',
//                            aspectRatio: 6 / 6,
//                            autoCropArea: 1,
//                            restore: true,
//                            guides: false,
//                            center: false,
//                            highlight: false,
//                            toggleDragModeOnDblclick: false,
//                            viewMode: 3
//            }));
//        }
//    });
//    
//
//    $('.crop_photo_link').click(function(e){
//        e.preventDefault();
//        
//        $(this).parent().find('.crop_photo_mod').arcticmodal();
//        
//    });
    


    
    var container = document.querySelector('.announcement_search_block');
    var $container = $('.announcement_search_block');
    // Инициализация Масонри, после загрузки изображений
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
            // Настройки
            itemSelector: '.announcement_search_item',
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            percentPosition: true
        });
    });
})(jQuery);

