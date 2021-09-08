/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function ($) {
    //Check home
    if (
        $('body.page-template-template-page-nostro-impegno').length ||
        $('body.page-template-template-page-a-fasce').length ||
        $('body.page-template-template-page-a-fasce-senza-titolo').length
    ) {
        $.each(
            $('.entry-content > .vc_row'),
            function (i, e) {
                $(e)
                    .addClass('vc_row-i-'+i)
                    .addClass('vc_row-mod-'+(i%2));
            }
        );
    } else if ( $('body.page-template-template-struttura-organizzativa').length) {
        $.each(
            $('.entry-content > .vc_row'),
            function (i, e) {
                var ii = i + 1;
                $(e)
                    .addClass('vc_row-i-'+ii)
                    .addClass('vc_row-mod-'+(ii%2));
            }
        );
    }

})(jQuery);
