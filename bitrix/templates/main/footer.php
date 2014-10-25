        <?if (defined("CONTENT_PAGE")) {?></section><?}?>
        <?if (!defined("NO_MAIN_WRAPPER")) {?></main><?}?>
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
    <?$APPLICATION->IncludeFile(
            "inc/tmpl/counter.php",
            array(),
            array(
                "SHOW_BORDER" => false
            )
    );?>
</body>
</html>
