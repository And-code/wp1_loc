<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */



// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp1_loc' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'wp1_loc' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'wp1_loc' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7MKIy,*>80e-5uFC~gD)E7vzzuzYqGa,N<:i|xkRi m$z;8<&4e awi|@K/5?|VL' );
define( 'SECURE_AUTH_KEY',  '`f )$`88vyten+q@zMeN%SKUvJR~9!8c!a}JU>17GtZ!br+opQ&>QmYg2E@k#dl#' );
define( 'LOGGED_IN_KEY',    'T=U2r-E0rcP2_hb9N0P@(uTMM:<G1Az(M><oG<21e$SFLCyC1S]xkv(wjm<>Co]A' );
define( 'NONCE_KEY',        'QCZMSR|G<v}sH],mv)d$;7%nrWam+?OXs;BM MM|$Dsp&ydj>4IS^;OyX 9?i84u' );
define( 'AUTH_SALT',        'OB(8b^?uc,Thf}82iOHHxm)%M9{%oDRXk+aM>-AgjQJaraE#hWs`Oz<$&ky7e<2e' );
define( 'SECURE_AUTH_SALT', '|Sg&>XQrGmiQ_5YQN3Vd3mf%7:/yYwH7qtr({<K0axP)uk2-8s,7_du%I8efzSMs' );
define( 'LOGGED_IN_SALT',   'ADPtg%kW{qUuT8a(;L$[wVs<MvDD*R?$9]m^%Lv.J|I1EII#th}P|bU!xCX!2)7O' );
define( 'NONCE_SALT',       '.<%E4AoSYk5&,gS@L-GH^8Q)Qr^}Y7 }-7n(dRLnV<&y*]DjXo{6vXVdUcWUU1e[' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp1_loc_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

define('FS_METHOD', 'direct');

//if(is_admin()) {
//    add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
//    define( 'FS_CHMOD_DIR', 0751 );
//}

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

