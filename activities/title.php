<?
define("ACTIVITIES_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Активный отдых");
?>
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
        <div class="right_block"><main>
            <section class="activities">
				<a href="<?=$fields["DETAIL_PAGE_URL"]?>details/" class="more">
					<figure><?
                        $thumb = CFile::ResizeImageGet($fields["PREVIEW_PICTURE"], array("width" => "131", "height" => "131"), BX_RESIZE_IMAGE_EXACT);
                    ?>
						<p><img alt="<?=$fields["NAME"]?>" src="<?=$thumb["src"]?>" width="131" height="131" /></p>
						<figcaption><?=GetMessage("SHOW_MORE")?></figcaption>
					</figure>
				</a>
            </section>
        </main></div><!--.right_block-->
    </div><!--.columns-->
</div><!--.section_wrap-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
