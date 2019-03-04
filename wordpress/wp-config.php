<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'iniHuanG.');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd 8paPF,mp ~_-+;9J9){v>:.j*6WFuBS3JAP)?=<al8P{j+3qenw8!U.s+Fv{q9');
define('SECURE_AUTH_KEY',  'b`5<9$@n]wD 3$iYeI]nLd)vVY&RoigXfVbj/NKHV8.7c18WvyjRXa![W.aw}4HQ');
define('LOGGED_IN_KEY',    '5Mv*#en.%d32ff=k&4DB;!r/2Xe9N5`6$??#6P0TV`2Uf[H=sWolsv?y9Mrk(7%[');
define('NONCE_KEY',        '#T@e2od~9j2:}w@f8U!YX<.i~vn~yijBK#Yob9MDy6aWrP1Drs*d.A8~1QK_GEO}');
define('AUTH_SALT',        'o-<|Mj62n^WXk)3^hL/jP|(UR}m3FDV*VHL$1|jySXRDwPcNtvM_d5CJBrD)rYkl');
define('SECURE_AUTH_SALT', '|V,ySCD?8Vko]]f>g]Y;T]lyvx-)p5PviuhUf3^L0~_.dc+Wupu-MTF9 R=[SMq<');
define('LOGGED_IN_SALT',   'wVT?/!Qn]WyN|,x| 3>Z|N4ElYj#@%}kTp?eM2b^K,lLcZkBU-1Cyhcg+%mzR4/K');
define('NONCE_SALT',       't9p(0il5#euu` xZgcCcy89XH/AQ~5=UJn*^7LfKhdfr_]_v!X oIH}m,pLg>f{B');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');

define("FS_METHOD", "direct");

define("FS_CHMOD_DIR", 0777);

define("FS_CHMOD_FILE", 0777);  