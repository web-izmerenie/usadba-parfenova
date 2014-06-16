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
                    CModule::IncludeModule("iblock");
                    $res = CIBlockElement::GetList(
                        array(
                            "SORT" => "asc"
                        ),
                        array(
                            "ACTIVE" => "Y",
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_CODE" => $arParams["IBLOCK_CODE"],
                            "SECTION_CODE" => $arParams["SECTION_CODE"]
                        ),
                        false,
                        false,
                        array()
                    );
                    while($arRes = $res->GetNext()){
                        $thumb = CFile::GetPath($arRes["PREVIEW_PICTURE"]);?>
                        <a href="<?=$arRes["DETAIL_PAGE_URL"]?>">
                            <img alt="<?=$arRes["NAME"]?>" src="<?=$thumb?>" />
                            <span><span><?=$arRes["NAME"]?></span></span>
                        </a><?
                    }
                ?>
				</nav>
			</section>
		</div><!--.right_block-->
	</div><!--.columns-->
</div><!--.section_wrap-->
<main></main>