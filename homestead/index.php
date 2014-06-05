<?
define("HOMESTEAD_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Усадьба");
?><?
    LocalRedirect("/homestead/guesthouse/");
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>