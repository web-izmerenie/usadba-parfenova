<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="reviews">
	<a class="write_a_review"><?=GetMessage("MAKE_REVIEW")?></a>
    <form class="add_review" action="/ajax/handler.php" method="post">
		<h2><?=GetMessage("MAKE_REVIEW")?></h2>
		<label class="text required">
			<span><?=GetMessage("NAME")?></span>
			<input type="text" name="name" value=""/>
		</label>
        <label class="text">
			<span><?=GetMessage("CITY_LOCATION")?></span>
			<input type="text" name="location" value=""/>
		</label>
		<label class="text">
			<span><?=GetMessage("EMAIL")?></span>
			<input type="text" name="email" value=""/>
		</label>
		<label class="textarea required">
			<span><?=GetMessage("YOUR_REVIEW")?></span>
			<textarea name="review_text"></textarea>
		</label>
		<label class="submit">
			<span><?=GetMessage("SEND")?></span>
			<input type="submit" value="<?=GetMessage("SEND")?>" />
		</label>
	</form>
	<ul class="reviews_book">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li><?
        if($arItem["PREVIEW_TEXT_TYPE"] == "text"){
            $replace = preg_split("/[\n\r]+/", $arItem["~PREVIEW_TEXT"]);
            $arItem["PREVIEW_TEXT"] = "";
            foreach($replace as $string){
                $string = trim($string);
                if($string)
                    $arItem["PREVIEW_TEXT"] .= "<p>".$string."</p>";
            }
        }?>
        <?=$arItem["PREVIEW_TEXT"]?>
        <div class="signature"><p><?=$arItem["DISPLAY_ACTIVE_FROM"]?><br/><?=$arItem["NAME"]?></p></div>
    </li>
<?endforeach;?>
    </ul>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</section>
