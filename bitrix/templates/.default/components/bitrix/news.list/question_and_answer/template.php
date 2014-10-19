<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="question_and_answer">
	<a class="ask_a_question"><?=GetMessage("ASK_QUESTION")?></a>
	<form class="add_question" action="/ajax/handler.php" method="post">
		<h2><?=GetMessage("ASK_QUESTION")?></h2>
		<label class="text required">
			<span><?=GetMessage("NAME")?></span>
			<input type="text" name="name" value=""/>
		</label>
		<label class="text">
			<span><?=GetMessage("EMAIL")?></span>
			<input type="text" name="email" value=""/>
		</label>
		<label class="text required">
			<span><?=GetMessage("PHONE")?></span>
			<input type="text" name="phone" value=""/>
		</label>
		<label class="textarea required">
			<span><?=GetMessage("QUESTION")?></span>
			<textarea name="question_text"></textarea>
		</label>
		<label class="submit">
			<span><?=GetMessage("SEND")?></span>
			<input type="submit" value="<?=GetMessage("SEND")?>" />
		</label>
	</form>
	<ul>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<li>
				<dl>
					<dt><?=$arItem['PREVIEW_TEXT']?></dt>
					<dd><?=$arItem['DETAIL_TEXT']?></dd>
				</dl>
			</li>
		<?endforeach?>
	</ul>
	<div class="pagination"><?=$arResult["NAV_STRING"]?></div>
</section>
