<?
define("DBPersistent", false);
require $_SERVER["DOCUMENT_ROOT"]."/dbconfig.php";
$DBType = "mysql";
$DBHost = $DB_CFG_HOST;
$DBLogin = $DB_CFG_USER;
$DBPassword = $DB_CFG_PASS;
$DBName = $DB_CFG_NAME;
$DBDebug = false;
$DBDebugToFile = false;

define("DELAY_DB_CONNECT", true);
define("CACHED_b_file", 3600);
define("CACHED_b_file_bucket_size", 10);
define("CACHED_b_lang", 3600);
define("CACHED_b_option", 3600);
define("CACHED_b_lang_domain", 3600);
define("CACHED_b_site_template", 3600);
define("CACHED_b_event", 3600);
define("CACHED_b_agent", 3660);
define("CACHED_menu", 3600);

define("BX_UTF", true);
define("BX_FILE_PERMISSIONS", 0600);
define("BX_DIR_PERMISSIONS", 0700);
@umask(~BX_DIR_PERMISSIONS);
define("BX_DISABLE_INDEX_PAGE", true);
