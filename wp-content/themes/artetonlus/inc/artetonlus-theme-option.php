<?php
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */
function artet_settings_init()
{
    // register a new setting for "artet" page
    register_setting('artet', 'artet_options');

    // register a new section in the "artet" page
    add_settings_section(
        'artet_section_developers_it',
        '',
        'artet_section_developers_cb_it',
        'artet'
    );

    add_settings_section(
        'artet_section_developers_en',
        '',
        'artet_section_developers_cb_en',
        'artet'
    );

    /* CAMPI ITALIANO: percentuale */
    add_settings_field(
        'artet_percentuale_testo_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale: Testo', 'artetonlus'),
        'artet_percentuale_testo_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_testo_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    /* CAMPI ITALIANO: percentuale */
    add_settings_field(
        'artet_percentuale_testo_it_mob', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale: Testo Mobile', 'artetonlus'),
        'artet_percentuale_testo_it_mob',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_testo_it_mob',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    add_settings_field(
        'artet_percentuale_1_numero_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 1: numero', 'artetonlus'),
        'artet_percentuale_1_numero_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_1_numero_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_1_testo_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 1: testo', 'artetonlus'),
        'artet_percentuale_1_testo_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_1_testo_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_2_numero_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 2: numero', 'artetonlus'),
        'artet_percentuale_2_numero_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_2_numero_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_2_testo_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 2: testo', 'artetonlus'),
        'artet_percentuale_2_testo_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_2_testo_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_3_numero_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 3: numero', 'artetonlus'),
        'artet_percentuale_3_numero_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_3_numero_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_3_testo_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 3: testo', 'artetonlus'),
        'artet_percentuale_3_testo_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_percentuale_3_testo_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    /* CAMPI ITALIANO: SOSTIENI */
    add_settings_field(
        'artet_sostienici_bb_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Sostienici: Bonifico Bancario', 'artetonlus'),
        'artet_sostienici_bb_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_sostienici_bb_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_sostienici_5x1000_it', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Sostienici: 5x1000', 'artetonlus'),
        'artet_sostienici_5x1000_it',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_sostienici_5x1000_it',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    /* CAMPI INGLESE: percentuale */
    add_settings_field(
        'artet_percentuale_testo_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale: Testo', 'artetonlus'),
        'artet_percentuale_testo_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_testo_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_testo_en_mob', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale: Testo Mobile', 'artetonlus'),
        'artet_percentuale_testo_en_mob',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_testo_en_mob',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    add_settings_field(
        'artet_percentuale_1_numero_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 1: numero', 'artetonlus'),
        'artet_percentuale_1_numero_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_1_numero_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_1_testo_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 1: testo', 'artetonlus'),
        'artet_percentuale_1_testo_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_1_testo_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_2_numero_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 2: numero', 'artetonlus'),
        'artet_percentuale_2_numero_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_2_numero_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_2_testo_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 2: testo', 'artetonlus'),
        'artet_percentuale_2_testo_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_2_testo_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_3_numero_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 3: numero', 'artetonlus'),
        'artet_percentuale_3_numero_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_3_numero_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_percentuale_3_testo_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Percentuale 3: testo', 'artetonlus'),
        'artet_percentuale_3_testo_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_percentuale_3_testo_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    /* CAMPI INGLESE: SOSTIENI */
    add_settings_field(
        'artet_sostienici_bb_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Sostienici: Bonifico Bancario', 'artetonlus'),
        'artet_sostienici_bb_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_sostienici_bb_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    add_settings_field(
        'artet_sostienici_5x1000_en', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Sostienici: 5x1000', 'artetonlus'),
        'artet_sostienici_5x1000_en',
        'artet',
        'artet_section_developers_en',
        [
            'label_for' => 'artet_sostienici_5x1000_en',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );

    // register a new field in the "artet_section_developers_it" section, inside the "artet" page
    /* CAMPO IMMAGINE
    add_settings_field(
        'artet_default_header_image', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Default Header Image', 'artet'),
        'artet_default_header_image',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_default_header_image',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    */

    /*
    add_settings_field(
        'artet_footer_disclaimer', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __('Footer Disclaimer', 'artet'),
        'artet_footer_disclaimer',
        'artet',
        'artet_section_developers_it',
        [
            'label_for' => 'artet_footer_disclaimer',
            'class' => '',
            'artet_custom_data' => '',
        ]
    );
    */
}

/**
 * register our artet_settings_init to the admin_init action hook
 */
add_action('admin_init', 'artet_settings_init');

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb

function artet_section_developers_cb_it($args)
{
    ?>
    <h2 id="artet_section_developers_it" style="color: #ed3954;margin-bottom: 0;font-size: 2em;">ITALIANO</h2>
    <hr style="border-top: 1px solid #ed3954 ">
    <?php
}

function artet_section_developers_cb_en($args)
{
    ?>
    <h2 id="artet_section_developers_it" style="color: #ed3954;margin-bottom: 0;font-size: 2em;">INGLESE</h2>
    <hr style="border-top: 1px solid #ed3954 ">
    <?php
}

// pill field cb

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function artet_default_header_image($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $image_attributes = wp_get_attachment_image_src($options[$name], 'full');
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = 'https://via.placeholder.com/955x320.png';
        $value = '';
    }
    // output the field
    ?>
    <style>
        .notice-internal {
            display: inline-block;
            line-height: 1.4;
            padding: 11px 15px;
            font-size: 14px;
            text-align: left;
            margin: 25px 20px 0 2px;
            background-color: #fff;
            border-left-width: 4px;
            border-left-style: solid;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        #artet_default_header_image_preview {
            height: 320px;
            width: 950px;
        }
    </style>
    <h4 style="margin-top: 7px;">Image size must be: 955x320px</h4>
    <div id="artet_default_header_image_builder">
        <img src="<?php echo $src; ?>" id="artet_default_header_image_preview"/>
        <div>
            <input id="<?php echo esc_attr($args['label_for']); ?>"
                   type="hidden"
                   name="artet_options[<?php echo $name; ?>]"
                   data-custom="<?php echo esc_attr($args['artet_custom_data']); ?>"
                   value="<?php echo $value; ?>"
            /> <input id="<?php echo $name; ?>_button"
                      class="button upload_image_button"
                      type="button"
                      value="Select Image"/>
        </div>
        <div class="upload_image_messages">
            <div class="notice-success notice-internal" style="display: none">
                <p>...</p>
            </div>
            <div class="notice-error notice-internal" style="display: none">
                <p>...</p>
            </div>
            <div class="update-nag notice-internal" style="display: none">
                <p>...</p>
            </div>
        </div>
    </div>
    <?php
}


function artet_sostienici_bb_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}
function artet_sostienici_bb_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}


function artet_percentuale_testo_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}
function artet_percentuale_testo_it_mob($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}

function artet_percentuale_testo_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}
function artet_percentuale_testo_en_mob($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_bb_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}

function artet_sostienici_5x1000_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_5x1000_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}
function artet_sostienici_5x1000_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="artet_sostienici_5x1000_it_builder">
        <div>
            <textarea style="width: 100%; max-width: 955px;" rows="3" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]"><?php echo $value; ?></textarea>
        </div>
    </div>
    <?php
}

function artet_percentuale_1_numero_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_2_numero_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_3_numero_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}

function artet_percentuale_1_testo_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_2_testo_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_3_testo_it($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}


function artet_percentuale_1_numero_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_2_numero_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_3_numero_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}

function artet_percentuale_1_testo_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_2_testo_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}
function artet_percentuale_3_testo_en($args)
{
    // get the value of the setting we've registered with register_setting()
    $options = get_option('artet_options');
    $name = $args['label_for'];
    if (!empty($options[$name])) {
        $value = $options[$name];
    } else {
        $value = '';
    }

    // output the field
    ?>
    <div id="">
        <input type="text" style="width: 100%; max-width: 955px;" id="<?php echo $name; ?>" name="artet_options[<?php echo $name; ?>]" value="<?php echo $value; ?>"/>
    </div>
    <?php
}


/**
 * top level menu
 */
function artet_options_page()
{
    // add top level menu page
    add_menu_page(
        'Artet Site Options',
        'Artet Site Options',
        'manage_options',
        'artet-theme-option',
        'artet_options_page_html',
        'dashicons-welcome-widgets-menus'
    );
}

/**
 * register our artet_options_page to the admin_menu action hook
 */
add_action('admin_menu', 'artet_options_page');

/**
 * top level menu:
 * callback functions
 */
function artet_options_page_html()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('artet_messages', 'artet_message', __('Settings Saved', 'artetonlus'), 'updated');
    }

    // show error/update messages
    settings_errors('artet_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "artet"
            settings_fields('artet');
            // output setting sections and their fields
            // (sections are registered for "artet", each field is registered to a specific section)
            do_settings_sections('artet');
            // output save settings button
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

function artet_theme_option_scripts($hook_suffix)
{
    if ($hook_suffix == 'toplevel_page_artet-theme-option') {
        wp_enqueue_media();
        wp_enqueue_script('artet_theme_option_scripts-js', get_template_directory_uri() . '/js/artet_theme_option_scripts.js', array('jquery'), '20181217');
        wp_enqueue_script('artet_theme_option_scripts-js');
    }
}

add_action('admin_enqueue_scripts', 'artet_theme_option_scripts');