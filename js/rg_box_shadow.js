;(function($){

    $.rg_box_shadow = function(options, elem){
        var settings = $.extend(true, {
            showbutton: '',
            closeWindow: $('.close', elem),
            showCallbackFunc: '',
            showFunc: null,
            position: {
                position: 'fixed',
                left: '50%',
                top: '50%',
                zIndex: '9010',
                marginLeft: '-' + elem.outerWidth(true)/2 + 'px',
                marginTop: '-' + elem.outerHeight(true)/2 + 'px'
            }
        }, options);

        elem.hide().addClass('rg-form');

        $('.pop-bg').on('click', function(){
            hideWindow();
        });
        $(settings.closeWindow).on('click', function(){
            hideWindow();
        });


        $(settings.showbutton).each(function(i){
            $(this).on('click', function(event){
                event.preventDefault();
                showWindow();
                if('function' === typeof(options.showCallbackFunc))
                {
                    this.rg_show_func = options.showCallbackFunc;
                    this.rg_show_func(elem);
                }
            });

        });
        function hideWindow()
        {
            elem.fadeOut(200);
            setTimeout(function(){
                $('.pop-bg').fadeOut(200);
            }, 200);

        }
        function showWindow()
        {
            $('.pop-bg').fadeIn(200);
            $('.rg-form').fadeOut(200);
            setTimeout(function(){
                elem.css(settings.position).fadeIn(200);
            }, 200);

        }

        if(options.showFunc){
            window[options.showFunc] = function(){
                showWindow();
                if(arguments[0])
                {
                    setTimeout(function(){
                      hideWindow();
                    }, arguments[0])
                }
            }
        }
    }

    $.fn.rg_box_shadow = function(options) {

        var pop_bg = $('.pop-bg');
        if(pop_bg.length == 0 )
        {
            $('body').append('<div class="pop-bg"/>');
            $('.pop-bg').css({
                backgroundColor: 'hsl(0, 0%, 0%)',
                cursor: 'pointer',
                display: 'none',
                left: '0%',
                top:'0',
                position: 'fixed',
                opacity: '0.8',
                zIndex: '9000',
                height: '100%',
                width: '100%'
            });

        }
        return this.each(function(i){
            new $.rg_box_shadow(options, $(this));
        });
    };
})(jQuery);





