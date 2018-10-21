var obj = {};
var obj_names = ['Гараж (гаражный бокс)', 'Жилое помещение (квартира, комната)', 'Индивидуальный жилой дом (ИЖС)', 'Многоквартирный жилой дом',
'Нежилое помещение', 'Нежилое здание', 'Сооружение/конструкция', 'Присвоение адреса объекту капитального строительства, введенного в эксплуатацию',
'Присвоение адреса объекту капитального строительства на стадии ввода в эксплуатацию', 'Присвоение адреса объекту незавершенного строительства',
'Изменение адреса объекта', 'Аннулирование адреса объекта', 'Другой объект'];

var obj_field = [[1, 7, 8, 4, 5, 6], [1, 2, 3, 9, 10], [1, 11, 2, 7, 8, 12, 13, 14], [1, 11, 2, 7, 8, 12, 14],
    [1, 2, 3], [1, 4, 2, 7, 8, 12, 14], [11, 2, 8, 12, 16, 14], [11, 2, 8, 12, 16, 19, 14],
    [11, 2, 8, 12, 16, 19, 14], [11, 2, 8, 12, 16, 19, 14],
    [11, 2, 8, 12, 16, 19, 20, 14], [11, 2, 8, 12, 16, 19, 21, 14], [17, 18]];

$(function() {
    $('.custom-scroll').jScrollPane({autoReinitialise: true});

    $('.order-full-popup').rg_box_shadow({showFunc: '', showbutton: $('.to-order-service'), showCallbackFunc: function(elem){ }});



    $('#s2').on('change', function(){
        $(this).siblings('.show-after').find('.form-item').hide();
        $(this).siblings('.show-after').find('.form-item').removeClass('shown');
        switch($('#s2').val()){
            case '':
                break;
            case 'В офисе приема-выдачи документов':
                break;
            case 'Доставка':

                $(this).siblings('.show-after').find('.form-item').eq(0).show();
                $(this).siblings('.show-after').find('.form-item').eq(0).addClass('shown');
                break;
            case 'Почтой':
                $(this).siblings('.show-after').find('.form-item').eq(1).show();
                $(this).siblings('.show-after').find('.form-item').eq(1).addClass('shown');
                break;
        }
    });

    $('#s14').on('change', function(){
        $(this).siblings('.show-after').find('.form-item').hide();
        $(this).siblings('.show-after').find('.form-item').removeClass('shown');
        switch($('#s14').val()){
            case '':
                break;
            case 'Указать':
                $(this).siblings('.show-after').find('.form-item').show();
                $(this).siblings('.show-after').find('.form-item').addClass('shown');
                break;
            case 'Не знаю':
                break;
        }
    });

    $('#s15').on('change', function(){
        $(this).siblings('.show-after').find('.form-item').hide();
        $(this).siblings('.show-after').find('.form-item').removeClass('shown');
        switch($('#s15').val()){
            case '':
                break;
            case 'Одноквартирный':

                break;
            case 'Многоквартирный':
                $(this).siblings('.show-after').find('.form-item').show();
                $(this).siblings('.show-after').find('.form-item').addClass('shown');
                break;
        }
    });

    $('#s4').on('change', function(){
        $(this).siblings('.show-after').find('.form-item').hide();
        $(this).siblings('.show-after').find('.form-item').removeClass('shown');
        $(this).siblings('.show-after').find('.vl_fiz').hide();
        $(this).siblings('.show-after').find('.vl_ur').hide();
        switch($('#s4').val()){
            case '':
                break;
            case 'Физическое лицо':
                $(this).siblings('.show-after').find('.vl_fiz').show();
                $(this).siblings('.show-after').find('.vl_fiz').find('.form-item').show();
                $(this).siblings('.show-after').find('.vl_fiz').find('.form-item').addClass('shown');
                break;
            case 'Юридическое лицо':
                $(this).siblings('.show-after').find('.vl_ur').show();
                $(this).siblings('.show-after').find('.vl_ur').find('.form-item').show();
                $(this).siblings('.show-after').find('.vl_ur').find('.form-item').addClass('shown');
                break;
        }
    });


    $('.services_list li').on('click', function(e){
        if ( $(e.target).is('[type="checkbox"]') ) return;
        if ( $(e.target).is('label') ) return;
        $(this).find(':checkbox').click();
    });

    $('.services_list li :checkbox').on('change', function(){
        var c = this.checked ? '#f00' : '#09f';
        if(this.checked){
            $(this).parent().addClass('sl_checked');
        }
        else {
            $(this).parent().removeClass('sl_checked');
        }
    });

    $('.services_list li .radio-block').click(function(ev){
        ev.stopPropagation();
    });


    $(".services_list li input:radio").change(function(e){

        if($(this).hasClass('no_dep')==false){
            var unique_id = $(this).attr("unique_id");

            $("input:radio").each(function(){

                if($(this).hasClass('no_dep')==false){
                    if($(this).attr("unique_id") === unique_id){
                        this.checked = true;
                    } else {
                        this.checked = false;
                    }
                }

            });
        }

    });

    $('#step_1').on('click', function(){
        $('.step-3').hide();
        $('.step-3 .variants .form-item').removeClass('shown');
        if($(this).isCorrectRequestStep1()){
            $('.additional').hide();
            $('.services-list').empty();
            $('.additional-list').empty();
            $('.object .val').text(obj_names[obj[Object.keys(obj)[0]] - 1]);
            $.each(obj, function(index, value){

                $.each(obj_field[value - 1], function(ind_f, val_f){
                    $('.variants .form-item[data-shown=' + val_f + ']').addClass('shown');
                });

                var div = $('<div/>').addClass('val').text('→ ' + index);
                $('.services-list').append(div);
                if(value >= 7 && value < 12){
                    var div_ad = $('<div/>').addClass('val').text('→ ' + obj_names[value - 1]);
                    $('.additional-list').append(div_ad);
                    $('.additional').show();
                }
            });


            $('.step-2').show();
            $('.step-3').show();
            $('input[name="obj_address"]').focus();
        }



        return false;
    });

    $('#step_3').on('click', function(){
        if($(this).isCorrectRequestStep2()){

        }
    });

    $('form').submit(function() {

    });

});

(function($) {
    $.fn.isCorrectRequestStep1 = function() {
        obj = {};
        var next = false;
        $('.step-1 :checkbox').each(function(){
            if($(this).prop('checked')){
                var check = $(this).val();
                $(this).siblings('.radio-block').find('input:radio').each(function(){
                    if($(this).prop('checked')){
                            obj[check] = $(this).val();
                            next = true;
                        }
                    });
                //
            }
        });

        if(next){
            $('.mistake').hide();
            return true;
        }else{
            $('.mistake').text('Не выбран объект или услуга.');
            $('.mistake').show();
            return false;
        }
    };
})(jQuery);

(function($) {
    $.fn.isCorrectRequestStep2 = function() {
        var mist = false;

        $('.step-3').find('input[type=text]').removeClass('correct incorrect');
        $('.step-3').find('textarea').removeClass('correct incorrect');
        $('.step-3').find('select').removeClass('correct incorrect');

       $('.form-item.shown').each(function(){
           var field = $(this).find('[data-req="true"]');
           if(field.val() === ''){
               field.addClass('incorrect');
               mist = true;
           }

       });

        if(mist){
            return false;
        }

        var form = $('.order-full-form');
        var formData = form.serialize();
        var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            dataType: 'text',
            context: this,
            async: false,
            success: function(data)
            {
                $('.step-1').hide();
                $('.step-2').hide();
                $('.step-3').hide();
                $('.step-4').show();
                $('.main-form-title').text("Спасибо за заявку!");
            },
            error: function(answer)
            {
                alert('Техническая ошибка при отправке данных. Попробуйте позже.');

            }
        });
    };
})(jQuery);