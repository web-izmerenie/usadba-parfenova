<?
define("PAGE_TITLE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>

<section class="reviews">
	<ul class="reviews_book">
		<li>
			<p>«Очень понравился отдых в усадьбе, отдыхала с ребенком, цены
			соответствуют сервису. Но главный плюс усадьбы — это, конечно же,
			сама природа и воздух. Целыми днями катались на велосипедах
			и уезжать не хотелось.»</p>
			<div class="signature"><p>9 декабря 2012 г.<br/>Марина, Ставрополь</p></div>
		</li>
		<li>
			<p>«Спасибо персоналу за приветливость и жизнерадостность.
			До сих пор под впечатлением от езды на квадроцикле — такой кайф
			я давно не получал!»</p>
			<div class="signature"><p>29 ноября 2012 г.<br/>Дмитрий, Аксай</p></div>
		</li>
	</ul>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
