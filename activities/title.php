<?
define("ACTIVITIES_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Активный отдых");
?><?$APPLICATION->IncludeFile(
    "inc/tmpl/activities.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>