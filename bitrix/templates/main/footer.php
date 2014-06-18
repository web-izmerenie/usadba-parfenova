        <?if (!defined("NO_MAIN_WRAPPER")) {?></main><?}?>
		<form class="add_question" action="/ajax/add_question.php" method="post">
			<h2>Задать вопрос</h2>
			<label class="text required">
				<span>Имя</span>
				<input type="text" name="name" value=""/>
			</label>
			<label class="text">
				<span>E-mail</span>
				<input type="text" name="email" value=""/>
			</label>
			<label class="text required">
				<span>Телефон</span>
				<input type="text" name="phone" value=""/>
			</label>
			<label class="textarea required">
				<span>Ваш отзыв</span>
				<textarea name="review_text"></textarea>
			</label>
			<label class="submit">
				<span>Отправить</span>
				<input type="submit" value="Отправить" />
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
    </footer>
</body>
</html>
