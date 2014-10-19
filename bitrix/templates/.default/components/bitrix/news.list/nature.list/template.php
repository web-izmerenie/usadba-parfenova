<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="nature">
	<ul class="list">		
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <li>
			<dl>
				<dt><img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" /></dt>
				<dd>
					<div class="nature_detail">
						<div class="center_wrap_1">
						<div class="center_wrap_2">
							<img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" class="detail_pic" />
							<div class="detail_text">
								<h3><?=$arItem["NAME"]?></h3>
								<div class="text">
									<?=$arItem["DETAIL_TEXT"]?>
								</div>
							</div>
						</div><!--.center_wrap_2-->
						</div><!--.center_wrap_1-->
					</div><!--.nature_detail-->
				</dd>
			</dl>
		</li>
        
    <?endforeach;?>
    </ul>
</section>
