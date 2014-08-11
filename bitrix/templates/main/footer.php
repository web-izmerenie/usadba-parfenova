        <?if (defined("CONTENT_PAGE")) {?></section><?}?>
        <?if (!defined("NO_MAIN_WRAPPER")) {?></main><?}?>
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
    </div><!--.top_side-->
    <footer>
        <div class="contacts">
            <?$APPLICATION->IncludeFile(
                "inc/tmpl/footer_contacts_".LANGUAGE_ID.".php",
                array(),
                array(
                    "SHOW_BORDER" => false
                )
            );?>
        </div>
        <div class="developer">
            <?=GetMessage("TMPL_CREATED_BY")?>
        </div>
    </footer><?
        $APPLICATION->IncludeFile(
            "inc/tmpl/counter.php",
            array(),
            array(
                "SHOW_BORDER" => false
            )
        );
    ?>
</body>
</html>
