<?php

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets' );

add_filter( 'document_title_separator', 'set_title_sep' );
add_filter('the_content', 'set_content_end');

// мой новый action.
add_action('my_action', 'my_action_function');

add_shortcode('my_shortcode', 'my_shortcode_function');

function my_shortcode_function() {
    return "Я шорткод!";
}

// условно определяемая функция для ее переопределения в дочерней теме
if (!function_exists('my_action_function')) {
    function my_action_function() {
        echo "Я тут!";
    }
}


function set_title_sep( $sep ){
    $sep = ' | ';

    return $sep;
}

function set_content_end($content) {
    $content .= "Спасибо за прочтение!";
    return $content;
}


function register_my_widgets(){
    register_sidebar( array(
        'name'          => "Правый сайдбар",
        'id'            => "right-sidebar",
        'description'   => 'Описание нашего сайдбара',
        'class'         => '',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => "</h5>\n",
    ) );
}


function theme_register_nav_menu() {
    register_nav_menu( 'top', 'Меню в шапке' );
    register_nav_menu( 'footer', 'Меню в футере' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array( 'post' , 'portfolio') );          // Только для post

    add_theme_support( 'post-formats', array( 'video', 'aside' ) );

    add_image_size( 'my_post_thumb', 1300, 500, true );

    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ){
        /*
        Вид базового шаблона:
        <nav class="navigation %1$s" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>
        */

        return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
    }
}

function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'default', get_template_directory_uri() .  "/assets/css/default.css");
    wp_enqueue_style( 'layout', get_template_directory_uri() .  "/assets/css/layout.css");
    wp_enqueue_style( 'fonts', get_template_directory_uri() .  "/assets/css/fonts.css");
}

function scripts_theme() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('jquery-migrate', get_template_directory_uri(). "/assets/js/jquery-migrate-1.2.1.min.js");
    wp_enqueue_script('flexslider', get_template_directory_uri(). "/assets/js/jquery.flexslider.js", ['jquery'], null, true);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri(). "/assets/js/doubletaptogo.js", ['jquery'], null, true);
    wp_enqueue_script('init', get_template_directory_uri(). "/assets/js/init.js", ['jquery'], null, true);

    wp_enqueue_script('modernizr', get_template_directory_uri() . "/assets/js/modernizr.js", null, null, false);

    wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", ['jquery'], null, true);

}

add_shortcode( 'iframe', 'Generate_iframe' );

function Generate_iframe( $atts ) {
    $atts = shortcode_atts( array(
        'href'   => 'http://wp1.loc',
        'height' => '550px',
        'width'  => '600px',
    ), $atts );

    return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}
// использование:
// [iframe href="http://www.exmaple.com" height="480" width="640"]


// регистрация нового типа поста
add_action( 'init', 'register_post_types' );
function register_post_types(){
    register_post_type( 'portfolio', [
        'label'  => null,
        'labels' => [
            'name'               => 'Портфолио', // основное название для типа записи
            'singular_name'      => 'Портфолио', // название для одной записи этого типа
            'add_new'            => 'Добавить работу', // для добавления новой записи
            'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование работы', // для редактирования типа записи
            'new_item'           => 'Новая работа', // текст новой записи
            'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
            'search_items'       => 'Искать работу в портфолио', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Портфолио', // название меню
        ],
        'description'         => 'Это наши работы для портфолио',
        'public'              => true,
         'publicly_queryable'  => true, // зависит от public
         'exclude_from_search' => true, // зависит от public
         'show_ui'             => true, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
         'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-format-gallery',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author','thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['skills'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    register_taxonomy( 'skills', [ 'portfolio' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Навыки',
            'singular_name'     => 'Навык',
            'search_items'      => 'Найти навык',
            'all_items'         => 'Все навыки',
            'view_item '        => 'Посмотреть навык',
            'parent_item'       => 'Родительский навык',
            'parent_item_colon' => 'Родительский навык:',
            'edit_item'         => 'Изменить навык',
            'update_item'       => 'Обновить навык',
            'add_new_item'      => 'Добавить новый навык',
            'new_item_name'     => 'Название нового навыка',
            'menu_name'         => 'Навыки',
        ],
        'description'           => 'Навыки, которые использовались в работе над проектом', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
}

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');// для неавторизованных пользователей

function send_mail() {
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $contactSubject = $_POST['contactSubject'];
    $contactMessage = $_POST['contactMessage'];


    // подразумевается что $to, $subject, $message уже определены...

    $to = get_option('admin_email');

// удалим фильтры, которые могут изменять заголовок $headers
 remove_all_filters( 'wp_mail_from' );
 remove_all_filters( 'wp_mail_from_name' );

    $headers = array(
        'From: Me Myself <me@example.net>',
        'content-type: text/html',
//        'Cc: John Q Codex <jqc@wordpress.org>',
//        'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
    );

    wp_mail( $to, $contactSubject, $contactMessage, $headers );
    wp_die();
}

