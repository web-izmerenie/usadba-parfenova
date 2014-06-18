<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$ELEMENT_CODE = trim($_REQUEST["ELEMENT_CODE"]);
?><?
CModule::IncludeModule("iblock");
$res = CIBlockElement::GetList(
    array(),
    array(
        "ACTIVE" => "Y",
        "IBLOCK_TYPE" => LANGUAGE_ID,
        "IBLOCK_CODE" => "activities",
        "CODE" => $ELEMENT_CODE
     ),
    false,
    false,
    array()
);
$arRes = $res->GetNextElement();
$fields = $arRes->GetFields();
$props = $arRes->GetProperties();
$detail_pic = CFile::GetPath($fields["DETAIL_PICTURE"]);?>
<div class="section_wrap <?=$ELEMENT_CODE?>">
    <div class="head">
        <h1><?$APPLICATION->ShowTitle()?></h1>
    </div>
    <div class="columns" data-background="<?=$detail_pic?>">
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
);?>
            </nav>
        </div><!--.left_block-->
        <div class="right_block">
            <section class="activities">
				<div class="section_info">
					<h2><?=$fields["NAME"]?></h2>
					<?=$props["SHORTTEXT"]["~VALUE"]["TEXT"]?>
				</div>
				<a href="<?=$fields["DETAIL_PAGE_URL"]?>details/" class="more">
					<figure><?
                        $thumb = CFIle::GetPath($fields["PREVIEW_PICTURE"]);
                    ?>
						<p><img alt="<?=$fields["NAME"]?>" src="<?=$thumb?>" width="131" height="131" /></p>
						<figcaption><?=GetMessage("SHOW_MORE")?></figcaption>
					</figure>
				</a>
            </section>
        </div><!--.right_block-->
    </div><!--.columns-->
</div><!--.section_wrap-->
<main></main>