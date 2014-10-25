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

	<?$APPLICATION->IncludeFile(
		"inc/tmpl/new_gallery.php",
		array('photos' => $arResult['DISPLAY_PROPERTIES']['photogallery']['VALUE']),
		array("SHOW_BORDER" => false)
	);?>
</div>
