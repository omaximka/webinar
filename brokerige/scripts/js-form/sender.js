$(document).ready(function ($) {

    function successMessage($msg) {
        $(".popup-sender").removeClass("popup-visible");
        $msg.addClass("visible");
    }

    $('.footer-form').ajaxForm({
        success: function (html, status, xhr, myForm) {
            var data = $.parseJSON(html);
            $(".ff-item").each(function() { $(this).removeClass("error"); });
            if (data.res && data.res == 'errors') {
                for (i in data.errors) {
                    if ($('.' + i + ':visible').length) { $('.' + i + ':visible').parent().addClass('error'); }
                    if ($('label[rel=' + i + ']:visible').length) { $('label[rel=' + i + ']:visible').parent().addClass('error'); }
                    if ($('p[rel=' + i + ']:visible').length) { $('p[rel=' + i + ']:visible').parent().addClass('error'); }
                    else if ($('[name=' + i + ']:visible').length) { $('[name=' + i + ']:visible').parent().addClass('error'); }
                }
            } else if (data.res && data.res == 'ok') {
                myForm.resetForm();

                yaCounter50236393.reachGoal('SEND_FORM_OK');
                $('.ajax-wait').addClass('start');
                setTimeout(function() { window.location = "/brokerige/thankyou?reg=true"; }, 2000);

            }
        }
    });

    $('.content-form').ajaxForm({
        success: function (html, status, xhr, myForm) {
            var data = $.parseJSON(html);
            $(".quest-form-item").each(function() { $(this).removeClass("error"); });
            if (data.res && data.res == 'errors') {
                for (i in data.errors) {

                    if ($('[name=' + i + ']:visible').length) { $('[name=' + i + ']:visible').parent().addClass('error'); }

                }
            } else if (data.res && data.res == 'ok') {
                myForm.resetForm();

                yaCounter50236393.reachGoal('SEND_FORM_OK');
                $('.ajax-wait').addClass('start');
                setTimeout(function() { window.location = "/brokerige/thankyou?reg=true"; }, 2000);

            }
        }
    });

    $('.pop-form').ajaxForm({
        success: function (html, status, xhr, myForm) {
            var data = $.parseJSON(html);
            $(".quest-form-item").each(function() { $(this).removeClass("error"); });
            if (data.res && data.res == 'errors') {
                for (i in data.errors) {

                    if ($('[name=' + i + ']:visible').length) { $('[name=' + i + ']:visible').parent().addClass('error'); }

                }
            } else if (data.res && data.res == 'ok') {
                myForm.resetForm();

                yaCounter50236393.reachGoal('SEND_FORM_OK');
                $('.ajax-wait').addClass('start');
                setTimeout(function() { window.location = "/brokerige/thankyou?reg=true"; }, 2000);

            }
        }
    });

});