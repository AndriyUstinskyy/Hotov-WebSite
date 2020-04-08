$(document).ready(function() {
    $('#form').submit(function() { 
        if (document.form.name.value == '' || document.form.phone.value == '' ) {
            valid = false;
            return valid;
        }
        $.ajax({
            type: "POST",
            url: "php/phpmailer.php",
            data: $(this).serialize()
        }).done(function() {
            $('.js-overlay-thank-you').fadeIn();
            $(this).find('input').val('');
            $('#form').trigger('reset');
        });
        return false;
    });
});

$('.js-close-thank-you').click(function() {
    $('.js-overlay-thank-you').fadeOut();
});

$(document).mouseup(function (e) {
    var popup = $('.popup');
    if (e.target!=popup[0]&&popup.has(e.target).length === 0){
        $('.js-overlay-thank-you').fadeOut();
    }
});

