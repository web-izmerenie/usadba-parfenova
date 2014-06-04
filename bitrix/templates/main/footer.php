        </main>
    </div>
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
