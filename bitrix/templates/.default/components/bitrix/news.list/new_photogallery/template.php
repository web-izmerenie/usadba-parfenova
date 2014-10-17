<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="photogallery">
	<div class="new_gallery_big">
		<a class="prev"></a>
		<a class="next"></a>
		<div class="slider"></div>
	</div>
	<ul class="new_gallery_list">
		<?foreach($arResult["ITEMS"] as $arItem){?>
			<?$thumb = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array("width" => "57", "height" => "57"), BX_RESIZE_IMAGE_EXACT);?>
			<?$origin = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array("width" => "940", "height" => "454"), BX_RESIZE_IMAGE_EXACT);?>
			<li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li>
		<?}?>
	</ul>
</div>
