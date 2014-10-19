<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="events_detail">
	<div class="back_to_events_list">
		<nav>
			<a href="<?=$arResult['IBLOCK']['LIST_PAGE_URL']?>"><?=GetMessage('BACK_TO_EVENTS')?></a>
		</nav>
	</div>

	<h1><?=$arResult['NAME']?></h1>
	<div class="date">
		<?
			$date = explode(' ', $arResult['DISPLAY_ACTIVE_FROM']);
			echo $date[0].' '.$date[1];
			if ($date[2] != date('Y')) echo ' '.$date[2];
		?>
	</div>
	<?if(!empty($arResult['DETAIL_TEXT'])):?>
		<div class="text"><?=$arResult['DETAIL_TEXT']?></div>
	<?elseif(!empty($arResult['PREVIEW_TEXT'])):?>
		<div class="text"><?=$arResult['PREVIEW_TEXT']?></div>
	<?endif?>

	<?$photos = $arResult['DISPLAY_PROPERTIES']['photogallery']['VALUE']?>
	<?if(!empty($photos)):?>
		<div class="photogallery">
			<div class="new_gallery_big">
				<a class="prev"></a>
				<a class="next"></a>
				<div class="slider"></div>
			</div>
			<ul class="new_gallery_list">
				<?foreach($photos as $item){?>
					<?$thumb = CFile::ResizeImageGet($item, array("width" => "57", "height" => "57"), BX_RESIZE_IMAGE_EXACT);?>
					<?$origin = CFile::ResizeImageGet($item, array("width" => "940", "height" => "454"), BX_RESIZE_IMAGE_EXACT);?>
					<li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li>
				<?}?>
			</ul>
		</div>
	<?endif?>
</div>
