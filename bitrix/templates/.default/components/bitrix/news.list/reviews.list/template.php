<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="reviews">
	<a class="write_a_review"><?=GetMessage("MAKE_REVIEW")?></a>
	<ul class="reviews_book">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li>
        <p><?=$arItem["PREVIEW_TEXT"]?></p>
        <div class="signature"><p><?=$arItem["DISPLAY_ACTIVE_FROM"]?><br/><?=$arItem["NAME"]?></p></div>
    </li>
<?endforeach;?>
    </ul>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</section>
