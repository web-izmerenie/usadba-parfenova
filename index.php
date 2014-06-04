<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Усадьба Парфёнова");
?><?$APPLICATION->IncludeFile(
    "inc/tmpl/index.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>