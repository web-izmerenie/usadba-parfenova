<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="workshop">
	<?if($arResult["DETAIL_PICTURE"]){?>
		<div class="panorama" data-texture="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"></div>
	<?}?>
	<?if($arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"]){?>
		<?$thumb = CFile::ResizeImageGet(
			$arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"],
			array(
				"width" => "1200",
				"height" => "1200"
			),
			BX_RESIZE_IMAGE_PROPORTIONAL
		);?>
		<div class="detail_picture"><img alt="" src="<?=$thumb["src"]?>" /></div>
	<?}?>
	<div class="notation_block">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>

	<div class="photogallery">
		<div class="new_gallery_big">
			<a class="prev"></a>
			<a class="next"></a>
			<div class="slider"></div>
		</div>
		<ul class="new_gallery_list">
			<?foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"] as $image){?>
				<?$thumb = CFile::ResizeImageGet($image, array("width" => "57", "height" => "57"), BX_RESIZE_IMAGE_EXACT);?>
				<?$origin = CFile::ResizeImageGet($image, array("width" => "940", "height" => "454"), BX_RESIZE_IMAGE_EXACT);?>
				<li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li>
			<?}?>
		</ul>
	</div>
</section>
