<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

?>
<section class="workshop"><?
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
    }?>
	<div class="notation_block">
		<?=$arResult["DETAIL_TEXT"]?>
	</div><?
    ?>
	<ul class="photos"><?
        foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"] as $item){
            $thumb = CFile::ResizeImageGet($item, array("width" => "295", "height" => "195"), BX_RESIZE_IMAGE_PROPORTIONAL);
            $origin = CFile::ResizeImageGet($item, array("width" => "1200", "height" => "800"), BX_RESIZE_IMAGE_PROPORTIONAL);?>
            <li>
                <a href="<?=$origin["src"]?>" target="_blank">
                    <img alt="" src="<?=$thumb["src"]?>" />
                </a>
            </li><?
        }?>		
	</ul>
</section>

