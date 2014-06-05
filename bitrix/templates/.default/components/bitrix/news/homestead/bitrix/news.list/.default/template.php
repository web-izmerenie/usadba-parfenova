<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
        <img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" />
        <span><span><?=$arItem["NAME"]?></span></span>
    </a>
<?endforeach;?>

