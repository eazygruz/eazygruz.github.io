;(function($){

    $.placeholder = function(element){
            if(element.val() == '')
            {
                element.val(element.attr("data-placeholder"));
            }

            element.focus(function(){

                if(element.val() == element.attr("data-placeholder")){
                    element.val('');
                }
            });

            element.focusout(function(){
                if(!element.val()){
                    element.val(element.attr("data-placeholder"));
                }
            });
    };
    $.fn.placeholder = function() {
        return this.each(function(i){
            new $.placeholder($(this));
        });
    };



})($);