<?php
/**
 * Template for displaying search forms in Artet onlus
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'artetonlus' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here &hellip;', 'placeholder', 'artetonlus' ); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'artetonlus' ); ?></span>
    </button>
</form>
