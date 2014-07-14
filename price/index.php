<?
define("PAGE_TITLE", "Y");
define("CONTENT_PAGE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Цены");
?>
<?$APPLICATION->IncludeFile(
    "inc/tmpl/price.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
