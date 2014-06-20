<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="contacts">
	<div class="contact_unit"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/contacts/block1.php"
	)
);?>
	</div>

	<h2><?=GetMessage("TRANSFER")?></h2>

	<div class="way_icons">
		<span class="icon-airplane" title="Самолетом"></span>
		<span class="icon-train" title="Поездом"></span>
		<span class="icon-bus" title="Автобусом"></span>
		<span class="icon-car" title="На машине"></span>
	</div>

	<div class="centering">
		<div class="notation">
			<?=GetMessage("TRANSFER_LONG")?>
		</div>
	</div><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/contacts/block2.php"
	)
);?>
<?
    CModule::IncludeModule("iblock");
    $map = CIBlockElement::GetList(
        array(
            "SORT" => "asc"
        ),
        array(
            "ACTIVE" => "Y",
            "IBLOCK_TYPE" => LANGUAGE_ID,
            "IBLOCK_CODE" => "maps"
        ),
        false,
        false,
        array()
    );
    while($arMap = $map->GetNext()){?>
        <h2><?=$arMap["NAME"]?></h2>
        <div class="interactive_map" data-center-x="40.118114" data-center-y="45.845907" data-zoom="6" data-route='[[ { "type": "wayPoint", "point": "Ростов-на-Дону" }, { "type": "wayPoint", "point": "Республика Адыгея, Майкопский район, пос. Каменномостский, ул. Чайковского, д. 23" } ]]'><div class="map"></div></div><?
    }
?>
</section>
