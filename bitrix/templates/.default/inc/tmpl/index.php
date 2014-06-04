<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="main_page">
    <section class="card card_1">
        <div class="logo_wrap">
            <span class="helper"></span>
            <img alt="Усадьба Парфенова" src="/bitrix/templates/main/images/logo_2.png" width="304" height="157" class="logo_2" />
        </div>
        <a class="scroll_down"></a>
    </section>
    <section class="card card_2">
        <div class="background"></div>
        <div class="text"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/index/card_2.php"
	)
);?>
        </div>
    </section>
    <section class="card card_3">
        <div class="background"></div>
        <div class="text"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/index/card_3.php"
	)
);?>            
        </div>
    </section>
    <section class="card card_4">
        <div class="background"></div>
        <div class="text"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/index/card_4.php"
	)
);?>
        </div>
    </section>
    <section class="card card_5">
        <div class="background"></div>
        <div class="text"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/index/card_5.php"
	)
);?>
        </div>
    </section>
    <section class="card card_6">
        <div class="background"></div>
        <div class="text"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/index/card_6.php"
	)
);?>
        </div>
    </section>
</section>