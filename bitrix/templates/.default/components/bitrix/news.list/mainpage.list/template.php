<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="main_page">
    <?
    foreach($arResult["ITEMS"] as $Item){
        if(!$counter){?>
            <section class="card <?=$Item["CODE"]?>">
                <img alt="Фоновый пейзаж" src="<?=$Item["PREVIEW_PICTURE"]["SRC"]?>" class="background" />
				<video autoplay="autoplay" loop="loop">
					<source src="/upload/main_page_video/usadba_parfenova.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"' />
					<source src="/upload/main_page_video/usadba_parfenova.ogv" type='video/ogg; codecs="theora, vorbis"' />
					<source src="/upload/main_page_video/usadba_parfenova.webm" type='video/webm; codecs="vp8.0, vorbis"' />
				</video>
                <div class="logo_wrap">
                    <span class="helper"></span>
                    <img alt="Логотип «Усадьба Парфенова»" src="/bitrix/templates/main/images/logo_2.png" width="320" height="167" class="logo_2" />
                </div>
                <a class="scroll_down"></a>
            </section><?
        }else{?>
            <section class="card <?=$Item["CODE"]?>">
                <div class="background">
                    <img src="<?=$Item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$Item["DISPLAY_PROPERTIES"]["NAME_VIEWED"]["VALUE"]?>" />
                </div>
                <div class="text"><?
                    if($Item["DISPLAY_PROPERTIES"]["NAME_VIEWED"]["VALUE"]){?>
                        <h2><?=$Item["DISPLAY_PROPERTIES"]["NAME_VIEWED"]["VALUE"]?></h2><?
                    }?>
                    <?=$Item["PREVIEW_TEXT"]?>
                </div>
            </section><?
        }
        $counter++;
    }?> 
</section>
