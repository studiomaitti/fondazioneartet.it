/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function ($) {
    //Check home
    if ($('body.home')) {
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Animazione in hom page delle percentuali
        // https://codepen.io/psrdotcom/pen/VJvBKq

        var canvasSize = 150;
        var canvasSize = $('.graph').width();

        var strokeWidth = 8,
            strokeColor = 'rgba(63,73,69,1)',
            centre = canvasSize / 2,
            radius = Math.floor((canvasSize - strokeWidth) / 2),
            startY = centre - radius;
        var i = 1;

        var s1 = Snap('.svg-1');
        var path1 = "";
        var arc1 = s1.path(path1);

        var s2 = Snap('.svg-2');
        var path2 = "";
        var arc2 = s2.path(path2);

        var s3 = Snap('.svg-3');
        var path3 = "";
        var arc3 = s3.path(path3);

        var anim_perc_started = false;
        if (anim_perc_started === false) {
            anim_perc_started = true;
            run_perc();
        }

        $(window).on('resize', function(){
            var win = $(this); //this = window
            if($('.graph').width() != canvasSize){
                canvasSize = $('.graph').width();
                centre = canvasSize / 2;
                radius = Math.floor((canvasSize - strokeWidth) / 2);
                run_perc();
            }
            if (win.height() >= 768) { /* ... */ }
            if (win.height() >= 992) { /* ... */ }
            if (win.width() >= 1200) { /* ... */ }
            if (win.width() >= 1320) { /* ... */ }
        });
        $('.percentuale-i').bind('inview', function (event, visible, topOrBottomOrBoth) {
            //Parte l'animazione delle percentuali
            if (anim_perc_started === false) {
                anim_perc_started = true;
                run_perc();
            }

            if (visible == true) {
                if (topOrBottomOrBoth == 'top') {
                }

                // element is now visible in the viewport
                if (topOrBottomOrBoth == 'top') {
                    // top part of element is visible
                } else if (topOrBottomOrBoth == 'bottom') {
                    // bottom part of element is visible
                } else {
                    // whole part of element is visible
                }
            } else {
                // element has gone out of viewport
            }
        });
    }

    function run_perc() {
        var i = $(element).data('i');
        var element = $('.percentuale-1');
        setTimeout(showCircle(element), 100);
        setTimeout(runSvgAnimation1(element), 500);
        setTimeout(runSvgAnimation2(element), 500);
        setTimeout(runSvgAnimation3(element), 500);
    }

    function showCircle(element) {
        $('.percentuale-i .svg').attr('class', 'show-circle');
    }

    function runSvgAnimation1() {
        var element = $('.percentuale-1');
        var percent = parseInt($(element).data('perc'));
        var percDiv = $(element).find('.percent');

        if (percent > 0) {
            var endpoint = (percent / 100) * 360;
            Snap.animate(0, endpoint, function (val) {
                arc1.remove();

                var d = val,
                    dr = d - 90;
                radians = Math.PI * (dr) / 180,
                    endx = centre + radius * Math.cos(radians),
                    endy = centre + radius * Math.sin(radians),
                    largeArc = d > 180 ? 1 : 0;
                path1 = "M" + centre + "," + startY + " A" + radius + "," + radius + " 0 " + largeArc + ",1 " + endx + "," + endy;

                arc1 = s1.path(path1);
                arc1.attr({
                    stroke: strokeColor,
                    fill: 'none',
                    strokeWidth: strokeWidth
                });

                percDiv.text(Math.ceil(((val / 360) * 100)) + '%');

            }, 2000, mina.easeinout);
        }
    }

    function runSvgAnimation2() {
        var element = $('.percentuale-2');
        var percent = parseInt($(element).data('perc'));
        var percDiv = $(element).find('.percent');

        if (percent > 0) {
            var endpoint = (percent / 100) * 360;
            Snap.animate(0, endpoint, function (val) {
                arc2.remove();

                var d = val,
                    dr = d - 90;
                radians = Math.PI * (dr) / 180,
                    endx = centre + radius * Math.cos(radians),
                    endy = centre + radius * Math.sin(radians),
                    largeArc = d > 180 ? 1 : 0;
                path2 = "M" + centre + "," + startY + " A" + radius + "," + radius + " 0 " + largeArc + ",1 " + endx + "," + endy;

                arc2 = s2.path(path2);
                arc2.attr({
                    stroke: strokeColor,
                    fill: 'none',
                    strokeWidth: strokeWidth
                });

                percDiv.text(Math.ceil(((val / 360) * 100)) + '%');
                //percDiv.text(Math.ceil(val));

            }, 2000, mina.easeinout);
        }
    }

    function runSvgAnimation3() {
        var element = $('.percentuale-3');
        var percent = parseInt($(element).data('perc'));
        var percDiv = $(element).find('.percent');

        if (percent > 0) {
            var endpoint = (percent / 100) * 360;
            Snap.animate(0, endpoint, function (val) {
                arc3.remove();

                var d = val,
                    dr = d - 90;
                radians = Math.PI * (dr) / 180,
                    endx = centre + radius * Math.cos(radians),
                    endy = centre + radius * Math.sin(radians),
                    largeArc = d > 180 ? 1 : 0;
                path3 = "M" + centre + "," + startY + " A" + radius + "," + radius + " 0 " + largeArc + ",1 " + endx + "," + endy;

                arc3 = s3.path(path3);
                arc3.attr({
                    stroke: strokeColor,
                    fill: 'none',
                    strokeWidth: strokeWidth
                });

                percDiv.text(Math.ceil(((val / 360) * 100)) + '%');
            }, 2000, mina.easeinout);
        }
    }
})(jQuery);
