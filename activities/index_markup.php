<?
define("ACTIVITIES_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Активный отдых");
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
                <a href="#">Квадроциклы</a>
                <a href="#">Горные велосипеды</a>
                <a href="#">Джиппинг</a>
                <a href="#">Треккинг</a>
                <span>Рафтинг</span>
                <a href="#">Каньонинг</a>
                <a href="#">Скалолазание</a>
                <a href="#">Спелеотуры</a>
                <a href="#">Конные прогулки</a>
                <a href="#">Веревочный парк</a>
            </nav>
        </div><!--.left_block-->
        <div class="right_block">
            <section class="activities">
				<div class="section_info">
					<h2>Рафтинг</h2>
					<p>Рафтинг&nbsp;— увлекательное путешествие&nbsp;— сплав по&nbsp;порогам
					горных рек на&nbsp;надувных судах&nbsp;(рафтах). Сплав по&nbsp;реке
					Белой на&nbsp;рафтах доступен каждому туристу, не&nbsp;смотря
					на&nbsp;его&nbsp;возраст и&nbsp;опыт водных походов.</p>
				</div>
				<a href="#" class="more">
					<figure>
						<p><img alt="Рафтинг" src="/upload/iblock/695/6956cbbaa812e61f15391ce593fe3f09.png" width="131" height="131" /></p>
						<figcaption>Узнать больше</figcaption>
					</figure>
				</a>
            </section>
        </div><!--.right_block-->
    </div><!--.columns-->
</div><!--.section_wrap-->
<main></main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
