<?
define("PAGE_TITLE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><?$APPLICATION->IncludeFile(
    "inc/tmpl/contacts.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>