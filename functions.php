<?php

if (!function_exists('toka_branding_setup')) :
    function toka_branding_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('woocommerce');
    }
endif;
add_action('after_setup_theme', 'toka_branding_setup');


// Register our customizers
function toka_branding_register_customizers($wp_customize)
{
    // Add site logo to the site identity customizer
    $wp_customize->add_setting(
        "site_logo",
        array(
            'title' => __('Site Logo', 'toka_branding_customizer_site_identity_site_logo'),
            'type' => 'theme_mod',
            'default' => '',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        "site_logo",
        array(
            "label" => __("Site Logo", "toka_branding_customizer_site_identity_site_logo_label"),
            "section" => "title_tagline",
            "settings" => "site_logo",
            "priority" => "10",
            "description" => __("Upload the site logo here. Probably keep it rectangley, since if it's too tall it'll increase the height of the main nav bar a bunch and it won't look very good. Maybe like around a 4:3 ratio"),
            "mime_type" => "image",
        )
    ));

    // Add site logo height to the site identity customizer
    $wp_customize->add_setting(
        "site_logo_height",
        array(
            'title' => __('Site Logo Height', 'toka_branding_customizer_site_identity_site_logo_height'),
            'type' => 'theme_mod',
            'default' => '60',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "site_logo_height",
        array(
            "label" => __("Enter the Site Logo Height"),
            "description" => __("Enter in the height you want your site logo to be. Bigger may pull down the nav bar a bunch, which not look the best"),
            "section" => "title_tagline",
            "settings" => "site_logo_height",
            "priority" => "11",
            "type" => "text",
        )
    ));



    // Colors section
    $wp_customize->add_section(
        'colors',
        array(
            'title' => __('Colors', 'toka_branding_customizer_colors_section'),
            'priority' => 30
        )
    );

    // Add primary color to the colors customizer
    $wp_customize->add_setting("primary_color", array(
        'title' => __('Primary Color', 'toka_branding_customizer_colors_primary_color'),
        'type' => 'theme_mod',
        'default' => '#2d2d2d',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        "primary_color",
        array(
            'label' => __('Primary Color'),
            'description' => __('Enter in the primary color, applies to like h1s and stuff'),
            'section' => 'colors',
            'priority' => '1',
        )
    ));

    // Add secondary color to the colors customizer
    $wp_customize->add_setting(
        "secondary_color",
        array(
            'title' => __('Secondary Color', 'toka_branding_customizer_colors_secondary_color'),
            'type' => 'theme_mod',
            'default' => '#535353',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        "secondary_color",
        array(
            'label' => __('Secondary Color'),
            'description' => __('applies to p tags i think i havent figured out colors yet'),
            'section' => 'colors',
            'priority' => '2',
        )
    ));

    // Add special top nav to the colors customizer
    $wp_customize->add_setting(
        "special_color",
        array(
            'title' => __('Special Top Nav Color', 'toka_branding_customizer_colors_special_color'),
            'type' => 'theme_mod',
            'default' => '#39ADDC',
            'transport' => 'refresh',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        "special_color",
        array(
            "label" => __("Special Top Nav Color"),
            "description" => __("color for the special top bar nav"),
            "section" => "colors",
            "priority" => "3"
        )
    ));
}
add_action('customize_register', 'toka_branding_register_customizers');






// Register our menus
function toka_branding_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'special' => __('Special Notice Menu')
    ));
}
add_action('init', 'toka_branding_register_menus');

// add class to li of menu
function toka_branding_add_menu_class($classes, $item, $args)
{
    if ($args->theme_location == 'primary') {
        $classes[] = 'nav-item primary-menu-nav-item';
    }
    if ($args->theme_location == 'special') {
        $classes[] = 'nav-item special-menu-nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'toka_branding_add_menu_class', 1, 3);

// add class to a tag of li of menu
function toka_branding_add_menu_class_a($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link ml-2"', $ulclass);
}
add_filter('wp_nav_menu', 'toka_branding_add_menu_class_a');











// Enqueue the stuff we need
function toka_branding_scripts()
{
    // enqueue bootstrap css
    wp_enqueue_style('toka_branding_bootstrap_styles', get_template_directory_uri() . '/bootstrap.min.css');
    // enqueue bootstrap js
    wp_enqueue_script('toka_branding_bootstrap_scripts', get_template_directory_uri() . '/bootstrap.min.js');
    // enqueue google fonts
    wp_enqueue_style('toka_branding_google_fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap');
    // enqueue main styles
    wp_enqueue_style('toka_branding_styles', get_template_directory_uri() . '/style.css');

    wp_enqueue_script('toka_branding_app', get_template_directory_uri() . '/app.js');

    // enqueue swiper css for hero image
    wp_enqueue_style('toka_branding_swiper_style', 'https://unpkg.com/swiper/css/swiper.min.css');
    // enqueue swiper js for hero image
    wp_enqueue_script('toka_branding_swiper_script', 'https://unpkg.com/swiper/js/swiper.min.js');
}
add_action('wp_enqueue_scripts', 'toka_branding_scripts');









// Product thumbnail functions 
function toka_branding_product_thumbnails($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    $p_t_atts = shortcode_atts(
        ['product_id' => null, ],
        $atts,
        $tag
    );

    $product = wc_get_product($p_t_atts['product_id']);
    $product_name = $product->get_name();
    $product_main_img = wp_get_attachment_url($product->get_image_id());
    $product_price = $product->get_price();
    $product_rating = $product->get_average_rating();
    $product_url = get_permalink( $p_t_atts['product_id'] );

    $output = "<div>";
    $output .=  $product_name;
    $output .=  $product_main_img;
    $output .=  $product_price;
    $output .= "</div>";

    wp_enqueue_script( 'toka-branding-product-thumbnail-react-script', get_template_directory_uri() . '/product_thumbnails/dist/product_thumbnail.bundle.js' );

    return $output;
}
function toka_branding_product_thumbnails_init()
{
    add_shortcode('toka_branding_product_thumbnails', 'toka_branding_product_thumbnails');
}

add_action('init', 'toka_branding_product_thumbnails_init');

/* function artificial_scarcity($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    $as_atts = shortcode_atts([
        'color_theme' => 'color',
        'layout' => 'days,hours,minutes,seconds',
        'timeline' => 'day'
    ], $atts, $tag);

    wp_enqueue_script('artificial_scarcity_script', plugins_url() . '/artificial-scarcity/dist/app.bundle.js');

    $as_output = '';
    $as_output .= "<div id=\"artificial-scarcity-root\" ";
    $as_output .= "data-color_theme=\"" . $as_atts['color_theme'] . "\" ";
    $as_output .= "data-layout=\"" . $as_atts['layout'] . "\" ";
    $as_output .= "data-timeline=\"" . $as_atts['timeline'] . "\" ";
    $as_output .= "></div>";

    return $as_output;
}

function artificial_scarcity_shortcodes_init()
{
    add_shortcode('artificial_scarcity', 'artificial_scarcity');
}

add_action('init', 'artificial_scarcity_shortcodes_init');
 */