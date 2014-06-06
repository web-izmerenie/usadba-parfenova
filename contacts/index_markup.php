<?
define("PAGE_TITLE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<section class="contacts">
	<div class="contact_unit">
		<h2>Гостевой дом «Усадьба Парфенова»</h2>
		<address>Адрес: 385750, Республика Адыгея, Майкопский район, пос. Каменномостский, ул. Чайковского, д. 23</address>
		<div class="phones">Телефоны: +7 (87777) 5-34-65, моб.: +7 (988) 483-72-00</div>
		<div class="email"><a href="mailto:info@usadba-parfenova.ru">info@usadba-parfenova.ru</a></div>
	</div>

	<h2>Как добраться</h2>

	<div class="way_icons">
		<span class="icon_airplane" title="Самолетом"></span>
		<span class="icon_train" title="Поездом"></span>
		<span class="icon_bus" title="Автобусом"></span>
		<span class="icon_car" title="На машине"></span>
	</div>

	<div class="centering">
		<div class="notation">
			Усадьба организует трансфер из Краснодара в гостевой дом
		</div>
	</div>

	<ul>
		<li>Самолетом до&nbsp;г.&nbsp;Краснодар, далее автобусом до&nbsp;г.&nbsp;Майкопа
		и&nbsp;п.&nbsp;Каменномостского или&nbsp;воспользоваться услугами гостевого
		дома, трансфер <span class="non_break">аэропорт-гостиница</span> (доп.&nbsp;плата);</li>
		<li>Поездом до&nbsp;г.&nbsp;Краснодара или&nbsp;ст.&nbsp;Белореченской, далее
		автобусом до&nbsp;г.&nbsp;Майкопа и&nbsp;п.&nbsp;Каменномостского или&nbsp;воспользоваться
		услугами гостевого дома, трансфер <span class="non_break">ж/д</span>&nbsp;вокзал&nbsp;&ndash;
		гостиница&nbsp;(доп.&nbsp;плата);</li>
		<li>Автобусом до&nbsp;г.&nbsp;Краснодара, ст.&nbsp;Белореченской, г.&nbsp;Майкопа,
		далее до&nbsp;п.&nbsp;Каменномостского автобусом, маршрутным такси, или&nbsp;электричкой.</li>
	</ul>

	<h2>Из Ростова-на-Дону</h2>
	<div class="map"></div>

	<h2>Из Краснодара</h2>
	<div class="map"></div>

	<h2>Из Майкопа</h2>
	<div class="map"></div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
