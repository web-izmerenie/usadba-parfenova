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
            <!--<div class="detail_picture"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" /></div>-->
			<div class="panorama" data-texture="/upload/tmp/panorama1.jpg"></div><?
        }?><?
        if($arResult["DETAIL_TEXT"]){?>
            <div class="notation_block">
                <?=$arResult["DETAIL_TEXT"]?>
            </div><?
        }?>
        <ul class="photos"><?
            // TODO INSTALL DEFATOOLS AND MAKE MULTIPROPERTY FOR UPLOADING IMAGES
        ?>
            <li><img alt="" src="/upload/tmp/homestead_detail_photo1.jpg" /></li>
            <li><img alt="" src="/upload/tmp/homestead_detail_photo2.jpg" /></li>
            <li><img alt="" src="/upload/tmp/homestead_detail_photo3.jpg" /></li>
        </ul>
        <div class="prices"><?
            foreach($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"] as $key => $price){
                $desc_count = explode(":", $arResult["DISPLAY_PROPERTIES"]["PRICE"]["DESCRIPTION"][$key]);?>
                <dl>
                    <dt><?=$desc_count[0]?></dt>
                    <dd>
                        <span class="quantity"><?
                            for($i = 1; $i <= $desc_count[1]; $i++){?>
                            <span class="unit"></span><?
                            }?>
                            <span class="fill"></span>
                        </span>
                        <span class="price_block">
                            <span class="price"><?=number_format($price, 0, "", " ")?></span>
                            <span class="currency">
                                <?=GetMessage("RUB_DAY")?>
                            </span>
                        </span>
                    </dd>
                </dl><?
            }
        ?>
        </div><!--.prices-->
    </main>
</div><!--.section_wrap-->
