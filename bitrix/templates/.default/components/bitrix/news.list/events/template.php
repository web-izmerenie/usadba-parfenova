<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="events_list">
	<ul>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<li>
				<h3>
					<?if(!empty($arItem['DETAIL_TEXT'])):?>
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
					<?else:?>
						<?=$arItem['NAME']?>
					<?endif?>
				</h3>
				<div class="date">
					<?
						$date = explode(' ', $arItem['DISPLAY_ACTIVE_FROM']);
						echo $date[0].' '.$date[1];
						if ($date[2] != date('Y')) echo ' '.$date[2];
					?>
				</div>
				<?$picture = null?>
				<?if(!empty($arItem['PREVIEW_PICTURE'])):?>
					<?$picture = $arItem['PREVIEW_PICTURE']?>
				<?elseif(!empty($arItem['DETAIL_PICTURE'])):?>
					<?$picture = $arItem['DETAIL_PICTURE']?>
				<?endif?>
				<?if($picture):?>
					<?$thumb = CFile::ResizeImageGet($picture, array("width" => "401", "height" => "193"), BX_RESIZE_IMAGE_EXACT);?>
					<img alt="<?=$picture['DESCRIPTION']?>" src="<?=$thumb['src']?>" />
				<?endif?>
				<?if(!empty($arItem['PREVIEW_TEXT'])):?>
					<div class="text">
						<?=$arItem['PREVIEW_TEXT']?>
					</div>
				<?endif?>
			</li>
		<?endforeach?>
	</ul>
	<div class="pagination">
		<div class="ajax_page_loader" data-count="<?=$arParams['NEWS_COUNT']?>"></div>
		<noscript><?=$arResult["NAV_STRING"]?></noscript>
	</div>
</div>
