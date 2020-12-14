
(function ($) {
    "use strict";



  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    

})(jQuery);


(function ($) {
    // USE STRICT
    "use strict";

    $(".form-radio .radio-item").click(function(){
        //Spot switcher:
        $(this).parent().find(".radio-item").removeClass("active");
        $(this).addClass("active");
    });
  
    $('#time').parent().append('<ul class="list-item" id="newtime" name="time"></ul>');
    $('#time option').each(function(){
        $('#newtime').append('<li value="' + $(this).val() + '">'+$(this)()+'</li>');
    });
    $('#time').remove();
    $('#newtime').attr('id', 'time');
    $('#time li').first().addClass('init');
    $("#time").on("click", ".init", function() {
        $(this).closest("#time").children('li:not(.init)').toggle();
    });

    $('#food').parent().append('<ul class="list-item" id="newfood" name="food"></ul>');
    $('#food option').each(function(){
        $('#newfood').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#food').remove();
    $('#newfood').attr('id', 'food');
    $('#food li').first().addClass('init');
    $("#food").on("click", ".init", function() {
        $(this).closest("#food").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#time").children('li:not(.init)');
    $("#time").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#time").children('.init').html($(this).html());
        allOptions.toggle();
    });

    var FoodOptions = $("#food").children('li:not(.init)');
    $("#food").on("click", "li:not(.init)", function() {
        FoodOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#food").children('.init').html($(this).html());
        FoodOptions.toggle();
    });
})(jQuery);