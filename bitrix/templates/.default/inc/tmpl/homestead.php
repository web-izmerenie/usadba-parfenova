<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section_wrap">
	<div class="head">
		<h1><?$APPLICATION->ShowTitle()?></h1>
	</div>
	<div class="columns">
		<div class="left_block">
			<div class="bg"></div>
			<div class="blur_back_bg"></div>
			<nav class="left_submenu"><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu.left",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(""),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu.left",
	Array(
		"ROOT_MENU_TYPE" => "left_bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(""),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?>
			</nav>
		</div><!--.left_block-->
		<div class="right_block">
			<section class="homestead">
				<nav class="rooms"><?
                    $GLOBALS["arrFilter"] = array(
                        "SECTION_CODE" => $arParams["SECTION_CODE"]
                    );
                ?><?$APPLICATION->IncludeComponent("bitrix:news", "homestead", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => "",
	"IBLOCK_CODE" => $arParams["IBLOCK_CODE"],
	"NEWS_COUNT" => "20",
	"USE_SEARCH" => "N",
	"USE_RSS" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_REVIEW" => "N",
	"USE_FILTER" => "Y",
	"FILTER_NAME" => "arrFilter",
	"FILTER_FIELD_CODE" => array(
		0 => "ID",
		1 => "CODE",
		2 => "XML_ID",
		3 => "NAME",
		4 => "TAGS",
		5 => "SORT",
		6 => "PREVIEW_TEXT",
		7 => "PREVIEW_PICTURE",
		8 => "DETAIL_TEXT",
		9 => "DETAIL_PICTURE",
		10 => "DATE_ACTIVE_FROM",
		11 => "ACTIVE_FROM",
		12 => "DATE_ACTIVE_TO",
		13 => "ACTIVE_TO",
		14 => "SHOW_COUNTER",
		15 => "SHOW_COUNTER_START",
		16 => "IBLOCK_TYPE_ID",
		17 => "IBLOCK_ID",
		18 => "IBLOCK_CODE",
		19 => "IBLOCK_NAME",
		20 => "IBLOCK_EXTERNAL_ID",
		21 => "DATE_CREATE",
		22 => "CREATED_BY",
		23 => "CREATED_USER_NAME",
		24 => "TIMESTAMP_X",
		25 => "MODIFIED_BY",
		26 => "USER_NAME",
		27 => "",
	),
	"FILTER_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"CHECK_DATES" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/homestead/guesthouse/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "7200",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"ADD_ELEMENT_CHAIN" => "N",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "",
	"LIST_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"DETAIL_ACTIVE_DATE_FORMAT" => "",
	"DETAIL_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
	"DETAIL_PAGER_TITLE" => "Страница",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "N",
	"PAGER_TEMPLATE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_CODE#/",
	)
	),
	false,
    array(
        "HIDE_ICONS"=>"Y"
    )
);?>
				</nav>
			</section>
		</div><!--.right_block-->
	</div><!--.columns-->
</div><!--.section_wrap-->
<main></main>