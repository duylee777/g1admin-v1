
jQuery.fn.extend({
    setMenu:function () {
        return this.each(function() {
            var containermenu = $(this);

            var itemmenu = containermenu.find('.dropdown-btn');
            itemmenu.click(function () {
                var submenuitem = containermenu.find('.dropdown-menu');
                submenuitem.slideToggle(500);

            });

            $(document).click(function (e) {
                if (!containermenu.is(e.target) &&
                    containermenu.has(e.target).length === 0) {
                     var isopened =
                        containermenu.find('.dropdown-menu').css("display");

                     if (isopened == 'block') {
                         containermenu.find('.dropdown-menu').slideToggle(500);
                     }
                }
            });



        });
    },

});
$('.dropdown').setMenu();

$('#toggleMenuBtn').click(function(){
    $('.product-portfolio-toggle').slideToggle(500);
})
$('#toggleMenuMobileBtn').click(function(){
    $('.m-product-portfolio-toggle').slideToggle(500);
})
$('.m-product__btn-toggle').click(function(){
    var index = $('.m-product__btn-toggle').index(this);
    console.log(index)
    $('.m-sub-product-portfolio').eq(index).slideToggle(500);
})


$(function() {
    $(window).scroll(function() {
        var maskTop = $('.mask__top').height();
        if($(this).scrollTop() >= maskTop) {
            $('.mask__top').addClass('mask--fixed');
        }
        else {
            $('.mask__top').removeClass('mask--fixed');
        }
    });
});

var isNone = $('.homebanner').length;
if(isNone == 0) {
    $('.header-area').addClass('no-video');
    $('.category-info').css('background-color','var(--bg__black)');
    if(screen.width >= 577) {
        $('.cushion-layer').height($('.header-area').height()+32);
    }
}
$(window).resize(function(){
    if(screen.width >= 577) {
        $('.cushion-layer').height($('.header-area').height()+32);
    }
    else {
        $('.cushion-layer').height(0);
    }
})
