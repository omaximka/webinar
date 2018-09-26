
$(document).ready(function() {
    history.replaceState(null,null,'/brokerige/thankyou/');
    var phonemask = '+7(999)999-99-99';
    $('input[type=tel]').mask(phonemask, {
        completed: function () {
            $(this).parent().removeClass('error');
        }
    });
    vPpreloaderComplete();
    start();
});

function vPpreloaderComplete() {
    $('.thank-text').addClass('view');
    setTimeout(function() { $('.thank-text').removeClass('view'); }, 2000);
    setTimeout(function() { $('.v-preloader-container').addClass('complete'); }, 3000);
}

function start() {
    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    if ( winX > 1100 ) {
        $('.thankyou-container').css('min-height', winY + 'px');
        $('.t-container').css('height', winY + 'px');
    } else {
        $('.thankyou-container').css('min-height', 'auto');
        $('.t-container').css('height', 'auto');
    }
}

$(document).on('click', '.goodwin-close', function() {
    $('.goodwin').removeClass('view');
});

$(window).resize(function(){ start(); });