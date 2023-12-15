window.$ = jQuery;
jQuery(function () {
    var windowWidth = $(window).width();
    var navLinks = $('.nav-link');

    function toggleDropdown() {
        if (windowWidth <= 992) {
            // Якщо ширина вікна менше або дорівнює 992, використовуйте клік
            navLinks.each(function(){
                $(this).find('.dropdown-menu').toggleClass('active');
            });
        } else {
            // Якщо ширина вікна більше 992, використовуйте наведення
            navLinks.hover(
                function() {
                    $(this).find('.drop-menu').addClass('active');
                },
                function() {
                    $(this).find('.drop-menu').removeClass('active');
                }
            );
        }
    }

    // Ініціалізація при завантаженні сторінки
    toggleDropdown();
    // var screenHeight = $('#headerModal').height();
    //
    // // Отримати висоту елемента з класом modal-dialog
    // var modalHeight = $('header #headerModal .modal-content').height();
    // var distance = (screenHeight - modalHeight) / 2;
    //
    // // Оновлення при зміні розміру вікна
    // $(window).resize(function(){
    //     windowWidth = $(window).width();
    //     toggleDropdown();
    //
    //
    //
    //     // Розрахунок половини різниці
    //     $('#headerModal .modal-dialog').css('margin-top', distance + 'px');
    //
    // });
    // $(window).on('load', function() {
    //     $('#headerModal .modal-dialog').css('margin-top', distance + 'px');
    //
    // });

    jQuery('.open-search').on('click', function(){
       jQuery('#search-modal').slideToggle();
    });
    jQuery('.search-close-button').on('click', function(){
        jQuery('#search-modal').hide();
    });
    jQuery(".js-ml-stack-nav").mlStackNav({
        navToggleSelector: ".ml-stack-nav-toggle",
        openClass: "is-open",
        activeClass: "is-active",
        zIndexValue: 900
    });
});

