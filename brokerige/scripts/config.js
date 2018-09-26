
$(document).ready(function() {

    var phonemask = '+7(999)999-99-99';
    $('input[type=tel]').mask(phonemask, {
        completed: function () {
            $(this).parent().removeClass('error');
        }
    });

    vPpreloaderComplete();

});

function vPpreloaderComplete() {
    $('.v-preloader-container').addClass('v-start');
    setTimeout(function() { $('.v-preloader-container').addClass('complete'); }, 1500);
}

/**/

$(document).on('click', '.wf-button', function() { $('.pop-form-container').addClass('view'); });
$(document).on('click', '.close-pop', function() { $('.pop-form-container').removeClass('view'); });
$(document).on('click', '.label-pop-form', function() {
    if ( $(this).children('input').prop('checked') ) {
        $('.btn-pop-form').addClass('ok');
    } else { $('.btn-pop-form').removeClass('ok'); }
});
$(document).on('click', '.btn-pop-form', function() {
    if ( $(this).hasClass('ok') ) { return true; } else {
        $('.label-pop-form').addClass('error');
        setTimeout(function() { $('.label-pop-form').removeClass('error'); }, 500);
        return false;
    }
});

/**/

$(document).on('click', '.label-form-footer', function() {
    if ( $(this).children('input').prop('checked') ) {
        $('.btn-form-footer').addClass('ok');
    } else { $('.btn-form-footer').removeClass('ok'); }
});
$(document).on('click', '.btn-form-footer', function() {
    if ( $(this).hasClass('ok') ) { return true; } else {
        $('.label-form-footer').addClass('error');
        setTimeout(function() { $('.label-form-footer').removeClass('error'); }, 500);
        return false;
    }
});

/**/

$(document).on('click', '.label-form-content', function() {
    if ( $(this).children('input').prop('checked') ) {
        $('.btn-form-content').addClass('ok');
    } else { $('.btn-form-content').removeClass('ok'); }
});
$(document).on('click', '.btn-form-content', function() {
    if ( $(this).hasClass('ok') ) { return true; } else {
        $('.label-form-content').addClass('error');
        setTimeout(function() { $('.label-form-content').removeClass('error'); }, 500);
        return false;
    }
});