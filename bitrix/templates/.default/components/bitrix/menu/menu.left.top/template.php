<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<a href="<?=SITE_DIR?>homestead/"><?=GetMessage("HOMESTEAD")?></a>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
        <?
            $path = $arItem["LINK"];
            $page = $APPLICATION->GetCurPage();
        ?>
        <?if($path == $page):?>
            <span><?=$arItem["TEXT"]?></span>
        <?else:?>
            <a class="active" target="<?=$target?>" href="<?=$path?>"><?=$arItem["TEXT"]?></a>
        <?endif;?>
	<?else:?>
		<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
<?endforeach?>

<?endif?>