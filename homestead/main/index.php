<?
define("HOMESTEAD_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главный корпус");
?><?
    $APPLICATION->IncludeFile(
        "inc/tmpl/homestead.php",
        array(
            "IBLOCK_TYPE" => LANGUAGE_ID,
            "IBLOCK_CODE" => "homestead",
            "SECTION_CODE" => "main"
        ),
        array(
            "SHOW_BORDER" => false
        )
    );
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>