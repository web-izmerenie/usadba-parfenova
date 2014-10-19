<?
define("ERROR_404", "Y");
define("PAGE_TITLE", "Y");
CHTTP::SetStatus("404 Not Found");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>
<div class="error_404_msg">
	Введен неверный адрес, или такой страницы больше нет.<br/>
	Вернитесь на <a href="/">главную</a>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
