<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?
$counter = 0;
foreach($arResult as $arItem):
    $counter++;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
    <?if($counter > 1):?>
        <span class="separator"></span>
    <?endif;?>
	<?if($arItem["SELECTED"]):?>
        <?
            $path = $arItem["LINK"];
            $page = $APPLICATION->GetCurPage();
        ?>
        <?if($path == $page):?>
            <span class="active"><?=$arItem["TEXT"]?></span>
        <?else:?>
            <a class="active" href="<?=$path?>"><?=$arItem["TEXT"]?></a>
        <?endif;?>
	<?else:?>
		<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
<?endforeach?>

<?endif?>
