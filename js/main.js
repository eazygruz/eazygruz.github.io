$(document).ready(function(){

    if( !(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
        niceScrollInit();

        $('*[data-appear="fade-in"]').each(function () {

            var appearDelay = $(this).data('appear-delay') || 0;
            var appearDirection = $(this).data('appear-direction') || 'none';


            $(this).css({ opacity: '0', 'visibility': 'hidden' });
            if ($(this).css('position') == 'absolute') {
                switch (appearDirection) {
                    case 'top': $(this).css({ top: -$(this).height() / 2 + 'px' }); break;
                    case 'right': $(this).css({ right: -$(this).width() / 2 + 'px' }); break;
                    case 'bottom': $(this).css({ bottom: -$(this).height() / 2 + 'px' }); break;
                    case 'left': $(this).css({ left: -$(this).width() / 2 + 'px' }); break;
                }
            } else {
                switch (appearDirection) {
                    case 'top': $(this).css({ position: 'relative', top: -$(this).height() / 2 + 'px' }); break;
                    case 'right': $(this).css({ position: 'relative', right: -$(this).width() / 2 + 'px' }); break;
                    case 'bottom': $(this).css({ position: 'relative', bottom: -$(this).height() / 2 + 'px' }); break;
                    case 'left': $(this).css({ position: 'relative', left: -$(this).width() / 2 + 'px' }); break;
                }
            }



            $(this).waypoint(function (direction) {
                $(this).css({ 'visibility': 'visible' });

                if (direction == 'down') {
                    switch (appearDirection) {
                        case 'top': $(this).delay(appearDelay).animate({ 'opacity': 1, 'top': 0 }, 800); break;
                        case 'right': $(this).delay(appearDelay).animate({ 'opacity': 1, 'right': 0 }, 800); break;
                        case 'bottom': $(this).delay(appearDelay).animate({ 'opacity': 1, 'bottom': 0 }, 800); break;
                        case 'left': $(this).delay(appearDelay).animate({ 'opacity': 1, 'left': 0 }, 800); break;
                        default: $(this).delay(appearDelay).animate({ 'opacity': 1 }, 800);
                    }
                    $(this).waypoint('destroy');
                }
            }, {
                offset: function () {
                    switch (appearDirection) {
                        case 'top': return $.waypoints('viewportHeight') - $(this).height(); break;
                        case 'bottom': return $.waypoints('viewportHeight'); break;
                        default: return $.waypoints('viewportHeight') - Math.min($(this).height() / 2, 150); break;
                    }
                }
            });
        });
    }

    $('input[name="from"]').placeholder();
    $('input[name="to"]').placeholder();
    $('input[name="name"]').placeholder();
    $('input[name="email"]').placeholder();
    $('textarea[name="message"]').placeholder();
    $('input[name="phone"]').inputmask({'mask' : '+7(999) 999-99-99', 'placeholder' : '_'});
    $('input[name="date1"]').inputmask({'mask' : '99-99-2014', 'placeholder' : '_'});
    $('input[name="date2"]').inputmask({'mask' : '99-99-2014', 'placeholder' : '_'});

    $('.call-back').click(function(){
        $('.popup-form.call-back-popup').show();
        $('.popup-form.call-back-popup').on('click', function(event){
            if (!$(event.target).closest('.popup-wrap-form').length) {
                $('.popup-form').hide();
            }
        });
    });
    $('.price, .to-know-price').click(function(){
        $('.popup-form.price-popup').show();
        $('.popup-form.price-popup').on('click', function(event){
            if (!$(event.target).closest('.popup-wrap-form').length) {
                $('.popup-form').hide();
            }
        });
    });

   /* $('.to-order-service').click(function(){
        $('.popup-form.popup-order').show();
        $('.popup-form.popup-order').on('click', function(event){
            if (!$(event.target).closest('.popup-wrap-form').length) {
                $('.popup-form').hide();
            }
        });
    });
*/
    var inputBlock = $('#file-inputs');

    $('#file-button').on('click', function(){
        $('input:last', inputBlock).click();
    });
    inputBlock.on('change', 'input',function(){
        var _this = $(this);
        var file = this.files[0];
        var errors = validateFile(file);

        if(errors.length > 0)
        {
            alert(errors[0]);
            _this.val('');
        }
        else
        {
            var lastInput = $('input:last', inputBlock);
            var lastInputNum = parseInt(lastInput.data('num'));
            inputBlock.append('<input type="file" data-num="' + (1+lastInputNum) + '" name="file' + (1+lastInputNum) + '"/>');
            filesList();
        }
    });
    function filesList()
    {
        var inputBlock = $('#file-inputs');
        var inputs = $('input', inputBlock);
        var text = '';
        inputs.each(function(i){
//                        console.log(this.files[0].name);
            if(this.files.length > 0)
                text += '<span></span> ' + this.files[0].name + '<br/>';
        });
        $('#upl-files').html(text);
        $('#file-button').hide();
    }
    function validateFile(file)
    {
        var errors = [];
        var maxSize = 3000000;
        var ext = ['gif', 'doc', 'docx', 'txt', 'png', 'pdf', 'jpg'];
        var nameArr = file.name.split('.');
        var fileExt = nameArr[nameArr.length - 1];

        if(maxSize < file.size)
            errors.push('Слишком большой файл');

        if(ext.indexOf(fileExt) === -1)
            errors.push('Расширение не поддерживается');

        return errors;
    }
    $('.clients-slider ul').bxSlider({
        speed: 700,
        mode: 'horizontal',
        pager: false,
        prevSelector: '#clients-left-arrow',
        nextSelector: '#clients-right-arrow',
        nextText: '',
        prevText: '',
        infiniteLoop: true,
        slideWidth: 120,
        minSlides: 0,
        maxSlides: 6,
        moveSlides: 1,
        slideMargin: 35
    });
    $('.certificates-slider ul').bxSlider({
        speed: 700,
        mode: 'horizontal',
        pager: false,
        prevSelector: '#certificates-left-arrow',
        nextSelector: '#certificates-right-arrow',
        nextText: '',
        prevText: '',
        infiniteLoop: true,
        slideWidth: 235,
        minSlides: 0,
        maxSlides: 4,
        moveSlides: 1,
        slideMargin: 32
    });
//    $('.call-back').click(function(){
//        var text = $(this).data('text');
//        $('.popup-form h2').html(text);
//        $('.popup-form').show();
//        $('.popup-form').on('click', function(event){
//            if (!$(event.target).closest('.popup-wrap-form').length) {
//                $('.popup-form').hide();
//            }
//        });
//    });
    $('.top-menu').localScroll({
        hash: true
    });
    $('.popup-form .close').click(function(){
        $('.popup-form').hide();
    });
    $('.popup-conf .close').click(function(){
        $('.popup-conf').hide();
    });
    $('.popup-order .close').click(function(){
        $('.popup-order').hide();
    });

    $('.popup-form-thank .close, .thank-ok').click(function(){
        $('.popup-form-thank').hide();
    });

    $('.send').click(function(){
        $(this).parents('form').submit();
    });

    $('.call-back-order').click(function(){
        $(this).parents('form').submit();
    });

    $('.put-order').click(function(){
        $(this).parents('form').submit();
    });

    $('.send-data').click(function(){
        $(this).parents('form').submit();
    });

    $('.send-quest').click(function(){
        $(this).parents('form').submit();
    });

    $('form').submit(function() {
        $(this).isCorrectRequest();
        return false;
    });
    var body = $('body');
    body.on('mouseenter','.incorrect',function(){
       $(this).removeClass('incorrect');
       $(this).siblings().remove();
    });
    body.on('keyup','.incorrect',function(){
        $(this).removeClass('incorrect');
        $(this).siblings().remove();
    });

    function showService(obj,show){
        if(show.hasClass('active')) {
            $('.changed').removeClass('changed');
            show.slideUp('slow');
            $('.services .active').removeClass('active');
        }
        else{
            $('.services .active').removeClass('active');
            show.addClass('active');
            show.slideDown("slow");
        }
    }
    var serviceFlag = false;
    body.on('click','.services > div > ul > li > a',function(){
        if (serviceFlag) return;
        $('.changed').removeClass('changed');
        $(this).parent().addClass('changed');
        var num = $(this).parent().index();
        var obj = $(this).parent().parent().parent();
        var showTop = $('.show'+num);
        var showBottom = $('.show'+(num+3));
        if ($('.services > div').hasClass('active')){
            $('.services .active').slideUp("slow", function(){
                if (obj.hasClass('top')){
                    showService(obj,showTop);
                }
                else{
                    showService(obj,showBottom);
                }

            });
        }
        else{
            if (obj.hasClass('top')){
                showService(obj,showTop);
            }
            else{
                showService(obj,showBottom);
            }
        }
        serviceFlag = true;
        setTimeout(function(){
            serviceFlag = false;
        },700);
    });
    body.on('click','.answer a',function(){
        if(!$(this).hasClass('close-link')){
            var answer = $(this).parent();
            answer.find('p span').hide();
            answer.find('a').hide();
            answer.find('.close-link').show();
            answer.find('.hidden').show(200);
        }

    });

    body.on('click','.answer a.close-link',function(){
        var answer = $(this).parent();
        answer.find('p span').show();
        answer.find('a').show();
        answer.find('.close-link').hide();
        answer.find('.hidden').hide(200);
    });
    body.on('click','.condition',function(e){
        $(this).closest('.popup-form').addClass('showBefore');
        $('.popup-form').hide();
        $('.popup-conf').height(body.height()+ 900);
        $('.popup-wrap-conf').css('top',(e.pageY-400)+'px');
        $('.popup-conf').show();
    });
    body.on('click','.accept',function(e){
        $('.popup-conf').hide();
        $('.popup-form.showBefore').show();
        $('.popup-form.showBefore').removeClass('showBefore');
//        console.log(body.height());
    });
});




(function($) {
    $.fn.isCorrectRequest = function() {

        var nameLimit = 64;
        var telephoneLimit = 32;
        var nameInput = $(this).find('[name = name]');
        var emailInput = $(this).find('[name = email]');
        var telephoneInput = $(this).find('[name = phone]');

        if(nameInput.val()!=null){

            if(nameInput.val().length === 0 || nameInput.val()=='Ваше имя')
            {
                this.find('input[type=text]').removeClass('correct incorrect');
                nameInput.addClass('incorrect');
//                nameInput.parent().prepend(
//                    '<div class="error">Это поле необходимо заполнить<span></span></div>'
//                );
                nameInput.focus();
                return false;
            }

            if(nameInput.val().length > nameLimit)
            {
                this.find('input[type=text]').removeClass('correct incorrect');
                nameInput.addClass('incorrect');
                nameInput.focus();
                return false;
            }
        }else{
        }




        if(telephoneInput.val()!=null){
            if(telephoneInput.val().length === 0 || nameInput.val()=='Ваш телефон')
            {
                this.find('input[type=text]').removeClass('correct incorrect');
                telephoneInput.addClass('incorrect');
//                telephoneInput.parent().prepend(
//                    '<div class="error">Это поле необходимо заполнить<span></span></div>'
//                );
                telephoneInput.focus();
                return false;
            }

            if(telephoneInput.val().length > telephoneLimit)
            {
                this.find('input[type=text]').removeClass('correct incorrect');
                telephoneInput.addClass('incorrect');
                telephoneInput.focus();
                return false;
            }
        }else{

        }

        if(emailInput.val()!=null){
            if(emailInput.val().length === 0 || emailInput.val()=='Введите e-mail (для отправки предложения)')
            {
                this.find('input[type=text]').removeClass('correct incorrect');
                emailInput.addClass('incorrect');
//                emailInput.parent().prepend(
//                    '<div class="error">Это поле необходимо заполнить<span></span></div>'
//                );
                emailInput.focus();
                return false;
            }
        }else{
        }

        var form = $(this);

        var attr = $(this).attr('enctype');
        if (typeof attr !== typeof undefined && attr !== false) {
           /* var formData = new FormData(this);*/
        }else{
            var formData = form.serialize();
        }



        var url = form.attr('action');
        $('.services .active').each(function(){
           if ($(this).hasClass('show0')) form.find('input[name = service]').val('Составление технического плана');
           if ($(this).hasClass('show1')) form.find('input[name = service]').val('Получение кадастрового паспорта');
           if ($(this).hasClass('show2')) form.find('input[name = service]').val('Получение справки о площади');
           if ($(this).hasClass('show3')) form.find('input[name = service]').val('Составление поэтажного плана');
           if ($(this).hasClass('show4')) form.find('input[name = service]').val('Адресация и переадресация объектов');
           if ($(this).hasClass('show5')) form.find('input[name = service]').val('Межевание земельных участков');
        });


        if (typeof attr !== typeof undefined && attr !== false) {
            console.log("yeah");
            $.ajax({
                type: 'POST',
                url: url,
                data: new FormData(this),
                success: function(data)
                {
                    $('.popup-form').hide();
                    $('.popup-order').hide();
                    $('form').find('input[type=text]').each(function(){
                        $(this).val($(this).attr("data-placeholder"));
                    });
                    $('form').find('input[type=text]').removeClass('correct incorrect');
                    $('.popup-form-thank').show();
                    $('.popup-form-thank').on('click', function(event){
                        if (!$(event.target).closest('.popup-wrap-thank').length) {
                            $('.popup-form-thank').hide();
                        }
                    });
                },
                error: function(answer)
                {

                }
            });
        }else{
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(data)
                {
                    $('.popup-form').hide();
                    $('.popup-order').hide();
                    $('form').find('input[type=text]').each(function(){
                        $(this).val($(this).attr("data-placeholder"));
                    });
                    $('form').find('input[type=text]').removeClass('correct incorrect');
                    $('.popup-form-thank').show();
                    $('.popup-form-thank').on('click', function(event){
                        if (!$(event.target).closest('.popup-wrap-thank').length) {
                            $('.popup-form-thank').hide();
                        }
                    });
                },
                error: function(answer)
                {

                }
            });
        }



        $(this).find('input').prop('disabled', false);
        return false;
    };
})(jQuery);

function niceScrollInit(){
    $("html").niceScroll({
        scrollspeed: 60,
        mousescrollstep: 35,
        cursorwidth: 10,
        cursorborder: 0,
        cursorcolor: '#2D3032',
        cursorborderradius: 2,
        autohidemode: true,
        horizrailenabled: false
    });

    $('html').addClass('no-overflow-y');
}



