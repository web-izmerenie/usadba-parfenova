<?
define("HOMESTEAD_PAGE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Усадьба");
?>

<section class="homestead">
	<nav class="rooms">
		<a href="#">
			<img alt="" src="/tmp/homestead/01.png" width="96" height="96" />
			<span><span>Каминный зал</span></span>
		</a>
		<a href="#">
			<img alt="" src="/tmp/homestead/02.png" width="96" height="96" />
			<span><span>Номер «Стандарт»</span></span>
		</a>
		<a href="#">
			<img alt="" src="/tmp/homestead/03.png" width="96" height="96" />
			<span><span>Номер «Стандарт&nbsp;Плюс»</span></span>
		</a>
		<a href="#">
			<img alt="" src="/tmp/homestead/04.png" width="96" height="96" />
			<span><span>Бильярд</span></span>
		</a>
		<a href="#">
			<img alt="" src="/tmp/homestead/05.png" width="96" height="96" />
			<span><span>Баня с&nbsp;бассейном</span></span>
		</a>
	</nav>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
