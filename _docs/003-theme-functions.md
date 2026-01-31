# Theme functions

In our theme directory there have a file, name `functions.php`. The `functions.php` file behaves like a WordPress plugin, adding features and functionality to a WordPress site.

In our `functions.php` file, which functions can be added, [Documented Here officially](https://developer.wordpress.org/themes/basics/theme-functions/)

## After `functions.php` added, we need to add `wp_head()` & `wp_footer()` hooks

* If only `index.php` available on `theme directory`
After include `functions.php` file in theme directory, we need to add

`<?php wp_head(); ?>`

just before the closing of the `header` in `index.php`, and

`<?php wp_footer(); ?>`

just before the closing of the `footer` in `index.php`.

* If `header.php` & `footer.php` available on `theme directory`
After include `functions.php` file in theme directory, we need to add,

`<?php wp_head(); ?>`,

just before the closing of the `header.php`, and

`<?php wp_footer(); ?>`

just before the closing of the `footer.php`.

## Add functions

Now we can add functions in `functions.php` file. Like simply add,

`add_theme_support( 'title-tag' );`

for getting header tag in website frontend, instead of meta title static tag.

## Register CSS and JavaScript files in WordPress

Check [Including CSS & JavaScript](https://developer.wordpress.org/themes/basics/including-css-javascript/#enqueuing-scripts-and-styles)

Here is any ideal sample

```php

// Include theme scripts and styles
function mythemenew_public_assets(){
    
    // register styles
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '5.3.2', 'all');
    wp_register_style('css', get_template_directory_uri() . '/assets/css/main.css', array('bootstrap'), '0.1.0', 'all');

    // register scripts
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, '5.3.2', array('strategy'  => 'defer'));
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '0.1.0', array('strategy'  => 'defer'));

    //Enqueue styles & scripts
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'css' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'script' );
}
add_action( 'wp_enqueue_scripts', 'mythemenew_public_assets' );
```

## Register site logo function for WordPress Customize

```php

function mythemenew_customizer_register($wp_customize){
    $wp_customize->add_section('mythemenew_header_logo', array(
        'title' => __('Header Builder', 'mythemenew'),
        'priority' => 120,
        'description' => 'In the Header Builder, you can build header blocks such as logo and menu.'
    ));

    $wp_customize->add_setting('mythemenew_logo', array(
        'default' => get_bloginfo('template_directory') . 'assets/media/logo.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mythemenew_logo', array(
        'label' => __('Logo', 'your-theme-text-domain'),
        'section' => 'mythemenew_header_logo',
        'setting' => 'mythemenew_logo',
    )));
}
add_action('customize_register', 'mythemenew_customizer_register');
```

## Register menu and get a menu

First we need to register a menu in `functions.php` file

```php

// Register Site menu
register_nav_menus( 
    [
        'primary' => esc_html__( 'Header Menu', 'mythemenew' ),
    ]
);
```

Then we need to get this menu in `index.php` or any specific page

```html
<div class="col-md-9">
    <?php wp_nav_menu( array('theme_location' => 'primary', 'menu_id' => 'nav-menu')); ?>
</div>

```

As we already import WordPress demo data, we can get immediately this menu in website frontend
