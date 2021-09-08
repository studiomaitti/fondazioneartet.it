/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function ($) {
    var body, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //MENU CON #
    $('.primary-menu a[href="#"]').on('click', function (e) {
        e.preventDefault();
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Scrivo la data odierna
    if(artetonlus.language == 'it'){
        var days = ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'];
        var months = ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'];
    } else {
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        var months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
    }

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var day_to_show = days[today.getDay()] + ' ' + dd + ' ' + months[today.getMonth()] + ' ' + yyyy;
    var top_small_menu = $('#giorno-js span');
    if (top_small_menu.length) {
        top_small_menu.html(day_to_show);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function initMainNavigation(container) {

        // Add dropdown toggle that displays child menu items.
        var dropdownToggle = $('<button />', {
            'class': 'dropdown-toggle',
            'aria-expanded': false
        }).append($('<span />', {
            'class': 'screen-reader-text',
            text: screenReaderText.expand
        }));

        container.find('.menu-item-has-children > a').after(dropdownToggle);

        // Toggle buttons and submenu items with active children menu items.
        container.find('.current-menu-ancestor > button').addClass('toggled-on');
        container.find('.current-menu-ancestor > .sub-menu').addClass('toggled-on');

        // Add menu items with submenus to aria-haspopup="true".
        container.find('.menu-item-has-children').attr('aria-haspopup', 'true');

        container.find('.dropdown-toggle').click(function (e) {
            var _this = $(this),
                screenReaderSpan = _this.find('.screen-reader-text');

            e.preventDefault();
            _this.toggleClass('toggled-on');
            _this.next('.children, .sub-menu').toggleClass('toggled-on');

            // jscs:disable
            _this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable
            screenReaderSpan.text(screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand);
        });
    }

    initMainNavigation($('.main-navigation'));

    menuToggle = $('.menu-toggle');
    siteHeaderMenu = $('#site-header-menu');
    siteNavigation = $('#site-navigation');
    socialNavigation = $('#social-navigation');

    // Enable menuToggle.
    (function () {

        // Return early if menuToggle is missing.
        if (!menuToggle.length) {
            return;
        }

        // Add an initial values for the attribute.
        menuToggle.add(siteNavigation).add(socialNavigation).attr('aria-expanded', 'false');

        menuToggle.on('click.artetonlus', function () {
            $(this).add(siteHeaderMenu).toggleClass('toggled-on');

            //Controllo che ci sia il sotto menu delle icone se no lo sposto
            if ($('#site-header-menu .site-sub-header-menu').length == 0) {
                $('#site-sub-header-menu').appendTo('#site-header-menu');
            }

            // jscs:disable
            $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded', $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable
        });
    })();

    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
    (function () {
        if (!siteNavigation.length || !siteNavigation.children().length) {
            return;
        }

        // Toggle `focus` class to allow submenu access on tablets.
        function toggleFocusClassTouchScreen() {
            if (window.innerWidth >= 910) {
                $(document.body).on('touchstart.artetonlus', function (e) {
                    if (!$(e.target).closest('.main-navigation li').length) {
                        $('.main-navigation li').removeClass('focus');
                    }
                });
                siteNavigation.find('.menu-item-has-children > a').on('touchstart.artetonlus', function (e) {
                    var el = $(this).parent('li');

                    if (!el.hasClass('focus')) {
                        e.preventDefault();
                        el.toggleClass('focus');
                        el.siblings('.focus').removeClass('focus');
                    }
                });
            } else {
                siteNavigation.find('.menu-item-has-children > a').unbind('touchstart.artetonlus');
            }
        }

        if ('ontouchstart' in window) {
            $(window).on('resize.artetonlus', toggleFocusClassTouchScreen);
            toggleFocusClassTouchScreen();
        }

        siteNavigation.find('a').on('focus.artetonlus blur.artetonlus', function () {
            $(this).parents('.menu-item').toggleClass('focus');
        });
    })();

    // Add the default ARIA attributes for the menu toggle and the navigations.
    function onResizeARIA() {
        if (window.innerWidth < 910) {
            if (menuToggle.hasClass('toggled-on')) {
                menuToggle.attr('aria-expanded', 'true');
            } else {
                menuToggle.attr('aria-expanded', 'false');
            }

            if (siteHeaderMenu.hasClass('toggled-on')) {
                siteNavigation.attr('aria-expanded', 'true');
                socialNavigation.attr('aria-expanded', 'true');
            } else {
                siteNavigation.attr('aria-expanded', 'false');
                socialNavigation.attr('aria-expanded', 'false');
            }

            menuToggle.attr('aria-controls', 'site-navigation social-navigation');
        } else {
            menuToggle.removeAttr('aria-expanded');
            siteNavigation.removeAttr('aria-expanded');
            socialNavigation.removeAttr('aria-expanded');
            menuToggle.removeAttr('aria-controls');
        }
    }

    // Add 'below-entry-meta' class to elements.
    function belowEntryMetaClass(param) {
        if (body.hasClass('page') || body.hasClass('search') || body.hasClass('single-attachment') || body.hasClass('error404')) {
            return;
        }

        $('.entry-content').find(param).each(function () {
            var element = $(this),
                elementPos = element.offset(),
                elementPosTop = elementPos.top,
                entryFooter = element.closest('article').find('.entry-footer'),
                entryFooterPos = entryFooter.offset(),
                entryFooterPosBottom = entryFooterPos.top + (entryFooter.height() + 28),
                caption = element.closest('figure'),
                figcaption = element.next('figcaption'),
                newImg;

            // Add 'below-entry-meta' to elements below the entry meta.
            if (elementPosTop > entryFooterPosBottom) {

                // Check if full-size images and captions are larger than or equal to 840px.
                if ('img.size-full' === param || '.wp-block-image img' === param) {

                    // Create an image to find native image width of resized images (i.e. max-width: 100%).
                    newImg = new Image();
                    newImg.src = element.attr('src');

                    $(newImg).on('load.artetonlus', function () {
                        if (newImg.width >= 840) {

                            // Check if an image in an image block has a width attribute; if its value is less than 840, return.
                            if ('.wp-block-image img' === param && element.is('[width]') && element.attr('width') < 840) {
                                return;
                            }

                            element.addClass('below-entry-meta');

                            if (caption.hasClass('wp-caption')) {
                                caption.addClass('below-entry-meta');
                                caption.removeAttr('style');
                            }

                            if (figcaption) {
                                figcaption.addClass('below-entry-meta');
                            }
                        }
                    });
                } else {
                    element.addClass('below-entry-meta');
                }
            } else {
                element.removeClass('below-entry-meta');
                caption.removeClass('below-entry-meta');
            }
        });
    }

    //##################################################################################################################
    $(document).ready(function () {
        body = $(document.body);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // TOOLTIPSTER
        $('.site-footer-container .tooltip').tooltipster({
            distance: 0,
            theme: 'tooltipster-light'
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //SISTEMO NELLE SINGLE GLI ALLINEAMENTI DELLE IMMAGINI CON LINK CHE HANNO COME LINK UN IMMAGINE
        if ($('body.single').length) {
            var img_link_fancy_box = $('a[data-rel*="lightbox-image"]');
            if (img_link_fancy_box.length) {
                $.each(
                    img_link_fancy_box,
                    function (i, e) {
                        var el = $(e);
                        var el_img = $(e).find('img');
                        if (el_img.hasClass('alignleft')) {
                            el_img.removeClass('alignleft');
                            el.addClass('alignleft');
                        } else if (el_img.hasClass('alignright')) {
                            el_img.removeClass('alignright');
                            el.addClass('alignright');
                        } else if (el_img.hasClass('alignnone')) {
                            el_img.removeClass('alignnone');
                            el.addClass('alignnone');
                        } else if (el_img.hasClass('aligncenter')) {
                            el_img.removeClass('aligncenter');
                            var sp = document.createElement('span');
                            //sp.classList.add('aligncenter')
                            el_img.appendTo(sp);
                            el.addClass('aligncenter');
                            el.append(sp);
                        } else {
                            el.addClass('align-lightbox');
                        }
                    }
                );
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MODAL - DIALOG
        var w = $(window).width();
        var dialog_width = (w < 410) ? 360 : 400;
        if ($('a.details-1').length) {
            $("#dialog-artet-newsletter-magazine").dialog({
                autoOpen: false,
                height: "auto",
                modal: true,
                resizable: false,
                width: dialog_width,
                open: function (event, ui) {
                },
                close: function () {
                },
                buttons: {
                    Close: function () {
                        $(this).dialog("close");
                    }
                }
            });

            $('a.details-1').on("click", function (e) {
                e.preventDefault();
                $("#dialog-artet-newsletter-magazine").dialog("open");
            });
        }
        if ($('a.details-2').length) {
            $("#dialog-artet-newsletter-conference").dialog({
                autoOpen: false,
                height: "auto",
                modal: true,
                resizable: false,
                width: dialog_width,
                open: function (event, ui) {
                },
                close: function () {
                },
                buttons: {
                    Close: function () {
                        $(this).dialog("close");
                    }
                }
            });

            $('a.details-2').on("click", function (e) {
                e.preventDefault();
                $("#dialog-artet-newsletter-conference").dialog("open");
            });
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $(".owl-carousel").owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            items: 1
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // SECONDARY MENU
        var menu_2 = $('ul.secondary-menu');
        if (menu_2.length) {
            var li = menu_2.find(' > li');
            if (li.length) {
                menu_2.addClass('num-li-' + li.length);
                li.css('width', (100 / li.length) + '%');
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HOME PAGE
        if ($('body.home').length){
            var win = $(this); //this = window
            if(win.width()>767){
                setTimeout(function () {
                    var hMain = $('.site-main').height();
                    $('#secondary').height(hMain - 15);
                }, 500);
            }
        }

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // BOX TESTO VIDEO
        if ($('#main article').length && $('#main article').hasClass('category-video')) {
            $('#main article .entry-content').removeClass('collapsed');
            $('.collaps-command').hide();
        } else {
            $("body").on("click", ".altro", function (e) {
                e.preventDefault();
                $(".entry-content").removeClass("collapsed");
                $(this).hide();
                $(".meno").show();
            });

            $("body").on("click", ".meno", function (e) {
                e.preventDefault();
                $(".entry-content").addClass("collapsed");
                $(this).hide();
                $(".altro").show();
            });

        }

        $(window)
            .on('load.artetonlus', onResizeARIA)
            .on('resize.artetonlus', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    belowEntryMetaClass('img.size-full');
                    belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');
                    belowEntryMetaClass('.wp-block-image img');
                }, 300);
                onResizeARIA();
            });

        belowEntryMetaClass('img.size-full');
        belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');
        belowEntryMetaClass('.wp-block-image img');
    });

    //##################################################################################################################
    //RESIZE DELLA FINESTRA
    $(window).resize(function () {
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function set_Elements_Same_MinHeight(el, minWidth) {
        var minWidth = typeof minWidth !== 'undefined' ? minWidth : 768;
        var maxHeight = 0;
        if (jQuery(window).width() > minWidth) {
            window.setTimeout(function () {
                $.each(
                    el,
                    function (i, e) {
                        var tmpHeight = $(e).innerHeight();
                        if (tmpHeight > maxHeight) {
                            maxHeight = tmpHeight + 1;
                        }
                    }
                );

                $(el).css('min-height', maxHeight);

            }, 200)
        } else {
            $(el).css('min-height', 'unset');
        }
    }
})(jQuery);
