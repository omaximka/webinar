$(document).ready(function ($) {

    $('.thank-form').ajaxForm({
        success: function (html, status, xhr, myForm) {
            var data = $.parseJSON(html);
            $(".item-phone").each(function() { $(this).removeClass("error"); });
            if (data.res && data.res == 'errors') {
                for (i in data.errors) {
                    if ($('.' + i + ':visible').length) { $('.' + i + ':visible').parent().addClass('error'); }
                    if ($('label[rel=' + i + ']:visible').length) { $('label[rel=' + i + ']:visible').parent().addClass('error'); }
                    if ($('p[rel=' + i + ']:visible').length) { $('p[rel=' + i + ']:visible').parent().addClass('error'); }
                    else if ($('[name=' + i + ']:visible').length) { $('[name=' + i + ']:visible').parent().addClass('error'); }
                }
            } else if (data.res && data.res == 'ok') {
                myForm.resetForm();
                $('.goodwin').addClass('view');
            }
        }
    });

});