<?
define("error_404", "Y");
CHTTP::SetStatus("404 Not Found");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Усадьба Парфёнова");
?>404 Страница не найдена<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
