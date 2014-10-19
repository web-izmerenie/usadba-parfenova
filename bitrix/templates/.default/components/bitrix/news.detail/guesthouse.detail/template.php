<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

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
					</span>
				<?}else{?>
					<a href="<?=$arRes["DETAIL_PAGE_URL"]?>">
						<img alt="<?=$arRes["NAME"]?>" src="<?=$thumb?>" />
						<span><span><?=$arRes["NAME"]?></span></span>
					</a>
				<?}
			}
		?>
		</nav>
	</div>
	<div class="head">
		<h1><?=$arResult["NAME"]?></h1>
	</div>
	<main>
		<?if($arResult["DETAIL_PICTURE"]){?>
			<div class="panorama" data-texture="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"></div>
		<?}?>
		<?if($arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"]){?>
			<?$thumb = CFile::ResizeImageGet(
				$arResult["DISPLAY_PROPERTIES"]["ALT_PHOTO"]["VALUE"],
				array(
					"width" => "1200",
					"height" => "1200"
				),
				BX_RESIZE_IMAGE_PROPORTIONAL
			);?>
			<div class="detail_picture"><img alt="" src="<?=$thumb["src"]?>" /></div>
		<?}?>
		<?if($arResult["DETAIL_TEXT"]){?>
			<div class="notation_block">
				<?=$arResult["DETAIL_TEXT"]?>
			</div>
		<?}?>
		<?if($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"]){?>
			<div class="photogallery">
				<div class="new_gallery_big">
					<a class="prev"></a>
					<a class="next"></a>
					<div class="slider"></div>
				</div>
				<ul class="new_gallery_list">
					<?foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VALUE"] as $image){?>
						<?$thumb = CFile::ResizeImageGet($image, array("width" => "57", "height" => "57"), BX_RESIZE_IMAGE_EXACT);?>
						<?$origin = CFile::ResizeImageGet($image, array("width" => "940", "height" => "454"), BX_RESIZE_IMAGE_EXACT);?>
						<li><a href="<?=$origin["src"]?>" target="_blank"><img alt="" src="<?=$thumb["src"]?>" /></a></li>
					<?}?>
				</ul>
			</div>
		<?}?>
		<div class="prices">
			<?foreach($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"] as $key => $price){?>
				<?$desc_count = explode(":", $arResult["DISPLAY_PROPERTIES"]["PRICE"]["DESCRIPTION"][$key]);?>
				<dl>
					<dt><?=$desc_count[0]?></dt>
					<?if(!strlen($desc_count[0])){?>
						<dt><?=GetMessage("COST")?></dt>
					<?}?>
					<dd>
						<?if(strlen($desc_count[1])){?>
							<span class="quantity">
								<?for($i = 1; $i <= $desc_count[1]; $i++){?>
									<span class="unit"></span>
								<?}?>
								<span class="fill"></span>
							</span>
						<?}?>
						<span class="price_block">
							<span class="price"><?=number_format($price, 0, "", " ")?></span>
							<span class="currency">
								<?if($arResult["DISPLAY_PROPERTIES"]["PRICE_CHECK"]["VALUE"]){?>
									<?=GetMessage("RUB_HOUR")?>
								<?}else{?>
									<?=GetMessage("RUB_DAY")?>
								<?}?>
							</span>
						</span>
					</dd>
				</dl>
			<?}?>
		</div><!--.prices-->
		<?
		$iblockType = 'ru';
		$iblockId = 23;
		$housesIblockType = 'ru';
		$housesIblockId = 1;
		$res = CIBlockElement::GetList(
			array('SORT'=>'ASC'),
			array(
				"ACTIVE" => "Y",
				"IBLOCK_TYPE" => $iblockType,
				"IBLOCK_ID" => $iblockId,
			),
			false,
			array("nPageSize" => 10000),
			array("ID", "NAME"));
		$found = false;
		$list = array();
		while ($arItem = $res->Fetch()) {
			$propRes = CIBlockElement::GetProperty(
				$iblockId,
				$arItem['ID'],
				array('SORT' => 'ASC'),
				array('CODE' => 'house_id'));
			$arProp = $propRes->Fetch();
			$houseId = $arProp['VALUE'];

			$peopleCountText = array();
			$propRes = CIBlockElement::GetProperty(
				$iblockId,
				$arItem['ID'],
				array('SORT' => 'ASC'),
				array('CODE' => 'people_count'));
			while ($arProp = $propRes->Fetch()) {
				$peopleCountText[] = $arProp['VALUE'];
			}

			$newItem = array();
			$newItem['people_count'] = array();

			$housePrices = CIBlockElement::GetProperty(
				$housesIblockId,
				$houseId,
				array('SORT' => 'ASC'),
				array('CODE' => 'PRICE'));
			$i = 0;
			while ($arProp = $housePrices->Fetch()) {
				$d = explode(':', $arProp['DESCRIPTION']);
				$newArr = array();
				$newArr['hidden_text'] = $d[0].' ('.$arProp['VALUE'].')';
				$newArr['public_text'] = $peopleCountText[$i];
				$newItem['people_count'][] = $newArr;
				$i++;
			}

			$newItem['house_id'] = $houseId;
			if ($houseId == $arResult['ID']) {
				$newItem['active'] = true;
				$found = true;
			} else {
				$newItem['active'] = false;
			}

			$houseRes = CIBlockElement::GetList(
				array('SORT'=>'ASC'),
				array(
					"IBLOCK_TYPE" => $housesIblockType,
					"IBLOCK_ID" => $housesIblockId,
					"ID" => $houseId,
				),
				false,
				array("nPageSize" => 10000),
				array("ID", "NAME"));
			$arHouse = $houseRes->Fetch();
			$newItem['house_name'] = $arHouse['NAME'];

			$list[] = $newItem;
		}
		?>
		<?if($found):?>
		<div class="reservation">
			<a class="reserve"><?=GetMessage('RESERVE')?></a>
			<form class="reservation_form" action="/ajax/handler.php" method="post">
				<h2><?=GetMessage("RESERVE")?></h2>
				<ul class="houses_list">
					<?foreach($list as $arHouse):?>
						<li<?=($arHouse['active']) ? ' class="active"' : ''?>>
							<div class="id"><?=$arHouse['house_id']?></div>
							<div class="name"><?=$arHouse['house_name']?></div>
							<ul class="people_count">
								<?foreach($arHouse['people_count'] as $arPrice):?>
									<li>
										<div class="public"><?=$arPrice['public_text']?></div>
										<div class="hidden"><?=$arPrice['hidden_text']?></div>
									</li>
								<?endforeach?>
							</ul>
						</li>
					<?endforeach?>
				</ul>
				<label class="choose required">
					<span><?=GetMessage("RESERVE_FORM_HOUSE")?></span>
					<input type="text" name="house_name" value="" readonly="readonly"/>
				</label>
				<input type="hidden" name="house_id" value=""/>
				<label class="choose required">
					<span><?=GetMessage("RESERVE_FORM_PEOPLE_COUNT")?></span>
					<input type="text" name="people_count" value="" readonly="readonly"/>
				</label>
				<input type="hidden" name="hidden_people_count" value="" />
				<label class="date required">
					<span><?=GetMessage("RESERVE_FORM_IN_DATE")?></span>
					<input type="date" name="in_date" value=""/>
				</label>
				<label class="date required">
					<span><?=GetMessage("RESERVE_FORM_OUT_DATE")?></span>
					<input type="date" name="out_date" value=""/>
				</label>
				<label class="text required">
					<span><?=GetMessage("RESERVE_FORM_NAME")?></span>
					<input type="text" name="name" value=""/>
				</label>
				<label class="text required">
					<span><?=GetMessage("RESERVE_FORM_LAST_NAME")?></span>
					<input type="text" name="last_name" value=""/>
				</label>
				<label class="text required">
					<span><?=GetMessage("RESERVE_FORM_PHONE")?></span>
					<input type="text" name="phone" value=""/>
				</label>
				<label class="submit">
					<span><?=GetMessage("RESERVE_FORM_SEND")?></span>
					<input type="submit" value="<?=GetMessage("RESERVE_FORM_SEND")?>" />
				</label>
			</form>
		</div><!--.reservation-->
		<?endif?>
	</main>
</div><!--.section_wrap-->
