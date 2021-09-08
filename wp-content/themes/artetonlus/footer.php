<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

//$options = get_option('artet_options');
//$footer_discalimer = isset($options['artet_footer_disclaimer']) ? $options['artet_footer_disclaimer'] : '';
$language_url = (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE . '/' : '');
?>

</div><!-- .site-content -->

</div><!-- .site-inner -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-row-i footer-row-1">
        <div class="site-inner">
            <div class="site-footer-container">
                <div class="footer-left">
                    <div class="footer-logo-artet">
                        <img src="/wp-content/themes/artetonlus/images/header-img/artet-white-rosso-1.svg" alt="Fondazione Artet">
                    </div>
                    <div class="footer-dati-artet">FONDAZIONE ARTET ONLUS<br>
                        <!--Ricerca su trombosi emostasi e tumori<br>-->
                        <br> Via Angelo Mai, 10 - 24121 Bergamo<br> segreteriagenerale@fondazioneartet.it<br> Info: +39 349 4009164
                    </div>
                </div>
                <div class="footer-right">
                    <div class="content-area">
                        <div class="footer-polistudium-logo">
                            <a href="http://www.polistudium.it/" target="_blank" title="Polistudium" referrerpolicy="origin"><img src="/wp-content/themes/artetonlus/images/footer-logo-polistudium-150x84.png" alt="logo polistudium"></a>
                        </div>

                        <div class="footer-polistudium-text-container">
                            <div class="footer-polistudium-text">
                                <div class="footer-polistudium-name">
                                    Designed by Polistudium s.r.l.
                                </div>
                                <div class="footer-polistudium-address">
                                    Via Anfossi 36, 20135 Milan, Italy<br>
                                    <a href="mailto:info@polistudium.it">info@polistudium.it</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-row-i footer-row-2">
        <div class="site-inner">
            <div class="site-footer-container">
                <div class="footer-left">
                    <a href="/<?php echo $language_url; ?>privacy-policy/">Privacy Policy</a>
                </div>
                <div class="footer-right">
                    <div class="content-area">
                        <div>
                            &copy; COPYRIGHT <?php echo date('Y') ?> Artet onlus
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>
<!-- -->

<div id="dialog-artet-newsletter-magazine" title="ARTET ONLUS Newsletter">
    <div>By registering to the newsletter, the User’s email address will be added to the contact list of Artet onlus, in order to receive email messages concerning the content published in Artet onlus and related promotional content/activities. Your email address may also be added to this list as a result of signing up to this Website. Personal Data collected: email address, first name, last name, profession.</div>
</div>

<div id="dialog-artet-newsletter-conference" title="ARTET CONFERENCE Newsletter">
    <div>ARTET CONFERENCE Newsletter By registering to the newsletter, the User’s email address will be added to the contact list of ARTET, in order to receive newsletters concerning the conference, such as Save the date, information about the meeting venue, the publication of the program, registration fees and deadline, abstract submission deadline and oral communication/poster instructions, hotel booking availability and deadline, social program for accompanying persons, the publication of speakers slides, photo/videogallery of the last edition and information about future editions of the conference. Your email address may also be added to this list as a result of signing up to this Website.</div>
</div>
<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
    <?php

    if (is_active_sidebar('pre-header')) : ?>

            <?php dynamic_sidebar('pre-header'); ?>

    <?php endif;
    ?>
    <!--a href="#" rel="modal:close">Close</a-->
</div>

<!-- Link to open the modal -->

</body>
</html>
