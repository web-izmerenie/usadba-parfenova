<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="workshop">
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

	<div class="notation_block">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
</section>
