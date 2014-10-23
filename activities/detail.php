<?
define("ACTIVITIES_SUBPAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$ELEMENT_CODE = trim($_REQUEST["ELEMENT_CODE"]);

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

$APPLICATION->SetTitle($fields["NAME"]);
?>

<div class="section_wrap <?=$ELEMENT_CODE?>">
	<div class="activities_nav_block"><!-- {{{1 -->
		<a href="<?=SITE_DIR?>activities/" class="back_link"><?=GetMessage("ACTIVITIES")?></a>
		<nav class="activities_menu"><?
			$arNavigation = array();
			$nav = CIBlockElement::GetList(
				array(
					"SORT" => "asc"
				),
				array(
					"ACTIVE" => "Y",
					"IBLOCK_TYPE" => LANGUAGE_ID,
					"IBLOCK_CODE" => "activities"
				),
				false,
				false,
				array()
			);
			$index = 0;
			while($arNav = $nav->GetNext()){
				$arNavigation[$index]["DETAIL_PAGE_URL"] = $arNav["DETAIL_PAGE_URL"]."details/";
				$arNavigation[$index]["NAME"] = $arNav["NAME"];
				$arNavigation[$index]["PREVIEW_PICTURE"] =
					CFile::ResizeImageGet(
						$arNav["PREVIEW_PICTURE"],
						array("width" => "60", "height" => "60"),
						BX_RESIZE_IMAGE_EXACT);
				if($arNav["ID"] == $fields["ID"]){
					$arNavigation[$index]["CURRENT"] = "Y";
				}

				$index++;
			}
			foreach($arNavigation as $item){
				if($item["CURRENT"]){?>
					<span>
						<img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]['src']?>" />
						<span><span><?=$item["NAME"]?></span></span>
					</span><?
				}else{?>
					<a href="<?=$item["DETAIL_PAGE_URL"]?>">
						<img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]['src']?>" />
						<span><span><?=$item["NAME"]?></span></span>
					</a><?
				}
			}
		?>
		</nav>
	</div><!-- .activities_nav_block }}}1 -->
	<div class="head">
		<h1><?$APPLICATION->ShowTitle()?></h1>
	</div>
	<main>
		<?if($props["GALLERY"]["VALUE"]){?>
			<div class="photogallery">
				<div class="new_gallery_big">
					<a class="prev"></a>
					<a class="next"></a>
					<div class="slider"></div>
				</div>
				<ul class="new_gallery_list">
					<?foreach($props["GALLERY"]["VALUE"] as $image){?>
						<?$thumb = CFile::ResizeImageGet($image, array("width" => "57", "height" => "57"), BX_RESIZE_IMAGE_EXACT);?>
						<?$origin = CFile::ResizeImageGet($image, array("width" => "940", "height" => "454"), BX_RESIZE_IMAGE_EXACT);?>
						<li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li>
					<?}?>
				</ul>
			</div>
		<?}?>
		<?if($fields["PREVIEW_TEXT"]){?>
			<div class="general_description">
				<?=$fields["PREVIEW_TEXT"]?>
			</div><!--.general_description-->
		<?}?>
		<?if($fields["DETAIL_TEXT"]){//cirle_photo sticky left?>
			<div class="sticky_block">
				<?if($props["ROUNDPIC"]["VALUE"]){?>
					<?$rpic = CFile::ResizeImageGet($props["ROUNDPIC"]["VALUE"], array("width" => "212", "height" => "212"), BX_RESIZE_IMAGE_EXACT);?>
					<div class="photo">
						<img src="<?=$rpic["src"]?>" alt="<?=$fields["NAME"]?>" />
					</div>
				<?}?>
				<div class="text">
					<?=$fields["DETAIL_TEXT"]?>
				</div>
			</div><!--.sticky_block-->
		<?}?>
		<?=$props["INFO"]["~VALUE"]["TEXT"]?>
		<?if($props["ADDITIONAL"]["~VALUE"]["TEXT"]){?>
			<div class="additional_content">
				<?=$props["ADDITIONAL"]["~VALUE"]["TEXT"]?>
			</div><!--.additional_content-->
		<?}?>
	</main>
	<div class="activities_nav_block"><!-- {{{1 -->
		<a href="<?=SITE_DIR?>activities/" class="back_link"><?=GetMessage("ACTIVITIES")?></a>
		<nav class="activities_menu">
			<?foreach($arNavigation as $item){?>
				<?if($item["CURRENT"]){?>
					<span>
						<img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
						<span><span><?=$item["NAME"]?></span></span>
					</span>
				<?}else{?>
					<a href="<?=$item["DETAIL_PAGE_URL"]?>">
						<img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
						<span><span><?=$item["NAME"]?></span></span>
					</a>
				<?}?>
			<?}?>
		</nav>
	</div><!-- .activities_nav_block }}}1 -->
</div><!--.section_wrap-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
