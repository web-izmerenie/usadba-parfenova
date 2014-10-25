<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="workshop">
	<?$APPLICATION->IncludeFile(
		"inc/tmpl/new_gallery.php",
		array('photos' => $arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"]),
		array("SHOW_BORDER" => false)
	);?>

	<div class="notation_block">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
</section>
