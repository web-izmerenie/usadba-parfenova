<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

?>
<div class="section_wrap">
    <nav class="top_menu"><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu.left.top",
	Array(
		"ROOT_MENU_TYPE" => "left_bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(""),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?>
    </nav>
    <div class="sub_menu_line">
        <nav class="sub_menu"><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu.left.inside",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(""),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?>
        </nav>
        <nav class="rooms"><?
            $res = CIBlockElement::GetList(
                array(
                    "SORT" => "asc"
                ),
                array(
                    "ACTIVE" => "Y",
                    "IBLOCK_TYPE" => LANGUAGE_ID,
                    "IBLOCK_CODE" => "homestead",
                    "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"]
                ),
                false,
                false,
                array()
            );
            while($arRes = $res->GetNext()){
                $thumb = "";
                if($arRes["PREVIEW_PICTURE"]){
                    $thumb = CFile::GetPath($arRes["PREVIEW_PICTURE"]);
                }
                if($arRes["ID"] == $arResult["ID"]){?>
                    <span>
                        <img alt="<?=$arRes["NAME"]?>" src="<?=$thumb?>" />
                        <span><span><?=$arRes["NAME"]?></span></span>
                    </span><?
                }else{?>
                    <a href="<?=$arRes["DETAIL_PAGE_URL"]?>">
                        <img alt="<?=$arRes["NAME"]?>" src="<?=$thumb?>" />
                        <span><span><?=$arRes["NAME"]?></span></span>
                    </a><?
                }
            }
        ?>            
        </nav>
    </div>
    <div class="head">
        <h1><?=$arResult["NAME"]?></h1>
    </div>
    <main><?
        if($arResult["DETAIL_PICTURE"]){?>
			<div class="panorama" data-texture="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"></div><?
        }
		if($arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"]){
			$thumb = CFile::ResizeImageGet(
				$arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"], 
				array(
					"width" => "1200", 
					"height" => "1200"
				), 
				BX_RESIZE_IMAGE_PROPORTIONAL
			);?>
			<div class="detail_picture"><img alt="" src="<?=$thumb["src"]?>" /></div><?
		}
        if($arResult["DETAIL_TEXT"]){?>
            <div class="notation_block">
                <?=$arResult["DETAIL_TEXT"]?>
            </div><?
        }
        if($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"]){?>
        <ul class="photos"><?
            foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"] as $image){
                $thumb = CFile::ResizeImageGet($image, array("width" => "295", "height" => "195"), BX_RESIZE_IMAGE_EXACT);
                $origin = CFile::ResizeImageGet($image, array("width" => "1200", "height" => "1200"), BX_RESIZE_IMAGE_PROPORTIONAL);?>
                <li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li><?
            }
        ?>                       
        </ul><?
        }?>
        <div class="prices"><?            
            foreach($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"] as $key => $price){
                $desc_count = explode(":", $arResult["DISPLAY_PROPERTIES"]["PRICE"]["DESCRIPTION"][$key]);?>
                <dl>
                    <dt><?=$desc_count[0]?></dt><?
                    if(!strlen($desc_count[0])){?>
                        <dt><?=GetMessage("COST")?></dt><?
                    }?>
                    <dd><?
                        if(strlen($desc_count[1])){?>
                        <span class="quantity"><?
                            for($i = 1; $i <= $desc_count[1]; $i++){?>
                            <span class="unit"></span><?
                            }?>
                            <span class="fill"></span>
                        </span><?
                        }?>
                        <span class="price_block">
                            <span class="price"><?=number_format($price, 0, "", " ")?></span>
                            <span class="currency"><?
                            if($arResult["DISPLAY_PROPERTIES"]["PRICE_CHECK"]["VALUE"]){?>
                                <?=GetMessage("RUB_HOUR")?><?
                            }else{?>                              
                                <?=GetMessage("RUB_DAY")?><?
                            }?>
                            </span>
                        </span>
                    </dd>
                </dl><?
            }
        ?>
        </div><!--.prices-->
    </main>
</div><!--.section_wrap-->
