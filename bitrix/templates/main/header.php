<?
    $revision = 1;
    $devRevision = 1;

    // development revision
    if ($USER->IsAdmin()) $revision = $revision . "dev" . $devRevision;

    IncludeTemplateLangFile(__FILE__);
    
    $htmlClasses = array();
    if ($APPLICATION->GetCurPage() == SITE_DIR) $htmlClasses[] = "main_page";
    if (defined("ERROR_404")) $htmlClasses[] = "error_404";
    if (defined("HOMESTEAD_PAGE")) $htmlClasses[] = "homestead_page";
?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=implode(" ", $htmlClasses)?>">
<head>
    <meta charset="utf-8" />
    <title><?$APPLICATION->ShowTitle()?></title>

    <!--[if lt IE 8]>
        <meta http-equiv="refresh" content="0; url=/ie_old/<?=(LANGUAGE_ID=='ru')?'ru':'en'?>.html" />
        <style>.top_side, footer { display: none !important; }</style>
        <script>throw new Error('IE less than 8');</script>
    <![endif]-->

    <!--[if IE 8]>
        <script>document.getElementsByTagName('html')[0].className += ' ie8';</script>
    <![endif]-->

    <!-- Pulled from http://code.google.com/p/html5shiv/ -->
    <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/bitrix/templates/main/styles/build/build.css?v=<?=$revision?>" />

    <script src="/bitrix/templates/main/scripts/build/build.js?v=<?=$revision?>"></script>
    <script>
        //<![CDATA[
            require(['basics/get_val'], function (getVal) {

                getVal.set('lang', '<?=LANGUAGE_ID?>');
                getVal.set('revision', '<?=$revision?>');

                require(['main']);

            });
        //]]>
    </script>
    <?$APPLICATION->ShowHead()?>
</head>

<body><?$APPLICATION->ShowPanel()?>
    <div class="top_side">
        <header>
            <?if ($APPLICATION->GetCurPage() != SITE_DIR){?><a href="/" title="На главную"><?}?>
                <img alt="Усадьба Парфенова" src="/bitrix/templates/main/images/logo.png" width="167" height="80" class="logo" />
            <?if ($APPLICATION->GetCurPage() != SITE_DIR){?></a><?}?>
            <div class="first_line_wrap">
                <div class="first_line">
                    <div class="choose_lang">
                        <a href="#" title="English">En</a>
                        <span title="Русский">Ру</span>
                    </div>
                    <nav class="main_menu"><?$APPLICATION->IncludeComponent("bitrix:menu", "menu.top", Array(
    "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
    "MENU_CACHE_TYPE" => "A",    // Тип кеширования
    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
    "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
    "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
        0 => "",
    ),
    "MAX_LEVEL" => "1",    // Уровень вложенности меню
    "CHILD_MENU_TYPE" => "",    // Тип меню для остальных уровней
    "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
    "DELAY" => "N",    // Откладывать выполнение шаблона меню
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    ),
    false
);?>
                    </nav>
                </div>
            </div>
            <nav class="sub_menu"><?$APPLICATION->IncludeComponent("bitrix:menu", "menu.sub", Array(
    "ROOT_MENU_TYPE" => "sub",    // Тип меню для первого уровня
    "MENU_CACHE_TYPE" => "A",    // Тип кеширования
    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
    "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
    "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
        0 => "",
    ),
    "MAX_LEVEL" => "1",    // Уровень вложенности меню
    "CHILD_MENU_TYPE" => "",    // Тип меню для остальных уровней
    "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
    "DELAY" => "N",    // Откладывать выполнение шаблона меню
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    ),
    false
);?>
            </nav>
        </header>
        <?if (defined("HOMESTEAD_PAGE")) {?>
            <div class="section_wrap">
                <div class="head">
                    <h1><?$APPLICATION->ShowTitle()?></h1>
                </div>
                <div class="columns">
                    <div class="left_block">
                        <div class="bg"></div>
                        <div class="blur_back_bg"></div>
                        <nav class="left_submenu">
                            <a href="#">Гостевой дом</a>
                            <span>Главный корпус</span>
                            <a href="#">Административный корпус</a>
                            <a href="#">Спорт и отдых</a>
                            <a href="#">Дары природы</a>
                            <a href="#">Багетная мастерская</a>
                        </nav>
                    </div>
                    <main>
        <?} else {?>
            <main>
        <?}?>
