<?
define("HOMESTEAD_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Усадьба");
?>

<div class="section_wrap">
	<div class="head">
		<h1><?$APPLICATION->ShowTitle()?></h1>
	</div>
	<div class="columns">
		<div class="left_block">
			<div class="bg"></div>
			<div class="blur_back_bg"></div>
			<nav class="left_submenu">
				<a href="#">Гостевой дом</a>
				<span>Главный корпус</span>
				<a href="#">Административный корпус</a>
				<a href="#">Спорт и отдых</a>
				<a href="#">Дары природы</a>
				<a href="#">Багетная мастерская</a>
			</nav>
		</div><!--.left_block-->
		<div class="right_block">
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
		</div><!--.right_block-->
	</div><!--.columns-->
</div><!--.section_wrap-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
