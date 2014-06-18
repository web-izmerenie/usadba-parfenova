<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<span><?=$arItem["TEXT"]?></span>
	<?else:?>
        <?if(stristr($arItem["LINK"], "ask")):?>
            <a class="ask_a_question"><?=$arItem["TEXT"]?></a>
        <?else:?>
            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        <?endif;?>
	<?endif?>
	
<?endforeach?>

<?endif?>