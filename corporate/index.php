<?
define("PAGE_TITLE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корпоративным клиентам");
?>

<?$APPLICATION->IncludeFile(
	"inc/tmpl/corporate.php",
	array(),
	array("SHOW_BORDER" => false)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
