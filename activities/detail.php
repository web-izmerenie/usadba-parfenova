<?
define("ACTIVITIES_SUBPAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$ELEMENT_CODE = trim($_REQUEST["ELEMENT_CODE"]);

CModule::IncludeModule("iblock");
$res = CIBlockElement::GetList(
    array(),
    array(
        "ACTIVE" => "Y",
        "IBLOCK_TYPE" => LANGUAGE_ID,
        "IBLOCK_CODE" => "activities",
        "CODE" => $ELEMENT_CODE
     ),
    false,
    false,
    array()
);
$arRes = $res->GetNextElement();
$fields = $arRes->GetFields();
$props = $arRes->GetProperties();

$APPLICATION->SetTitle($fields["NAME"]);
?>

<div class="section_wrap">
	<div class="activities_nav_block"><!-- {{{1 -->
		<a href="<?=SITE_DIR?>activities/" class="back_link"><?=GetMessage("ACTIVITIES")?></a>
		<nav class="activities_menu"><?
            $arNavigation = array();
            $nav = CIBlockElement::GetList(
                array(
                    "SORT" => "asc"
                ),
                array(
                    "ACTIVE" => "Y",
                    "IBLOCK_TYPE" => LANGUAGE_ID,
                    "IBLOCK_CODE" => "activities"
                ),
                false,
                false,
                array()
            );
            $index = 0;
            while($arNav = $nav->GetNext()){
                $arNavigation[$index]["DETAIL_PAGE_URL"] = $arNav["DETAIL_PAGE_URL"];
                $arNavigation[$index]["NAME"] = $arNav["NAME"];
                $arNavigation[$index]["PREVIEW_PICTURE"] = CFile::GetPath($arNav["PREVIEW_PICTURE"]);
                if($arNav["ID"] == $fields["ID"]){
                    $arNavigation[$index]["CURRENT"] = "Y";
                }
                
                $index++;
            }
            foreach($arNavigation as $item){
                if($item["CURRENT"]){?>
                    <span>
                        <img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
                        <span><span><?=$item["NAME"]?></span></span>
                    </span><?
                }else{?>
                    <a href="<?=$item["DETAIL_PAGE_URL"]?>">
                        <img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
                        <span><span><?=$item["NAME"]?></span></span>
                    </a><?
                }
            }
        ?>
		</nav>
	</div><!-- .activities_nav_block }}}1 -->
	<div class="head">
		<h1><?$APPLICATION->ShowTitle()?></h1>
	</div>
	<main><?
        $detail_pic = CFile::GetPath($fields["DETAIL_PICTURE"]);?>
		<img alt="<?=$fields["NAME"]?>" src="<?=$detail_pic?>" class="section_illustration" />
		<div class="general_description">
			<?=$fields["PREVIEW_TEXT"]?>
		</div><!--.general_description-->
		<div class="centered_content">
			<?=$fields["DETAIL_TEXT"]?>
		</div><!--.centered_content-->
        <?
            // TODO PROPERTY LIKE IN HOMESTEAD
        ?>
		<ul class="photos">
			<li><img alt="" src="/tmp/homestead/pic.png" /></li>
			<li><img alt="" src="/tmp/homestead/pic.png" /></li>
			<li><img alt="" src="/tmp/homestead/pic.png" /></li>
		</ul>
		<?=$props["INFO"]["~VALUE"]["TEXT"]?>
		<div class="additional_content">
			<?=$props["ADDITIONAL"]["~VALUE"]["TEXT"]?>
		</div><!--.additional_content-->
	</main>
	<div class="activities_nav_block"><!-- {{{1 -->
		<a href="<?=SITE_DIR?>activities/" class="back_link"><?=GetMessage("ACTIVITIES")?></a>
		<nav class="activities_menu"><?
            foreach($arNavigation as $item){
                if($item["CURRENT"]){?>
                    <span>
                        <img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
                        <span><span><?=$item["NAME"]?></span></span>
                    </span><?
                }else{?>
                    <a href="<?=$item["DETAIL_PAGE_URL"]?>">
                        <img alt="<?=$item["NAME"]?>" src="<?=$item["PREVIEW_PICTURE"]?>" />
                        <span><span><?=$item["NAME"]?></span></span>
                    </a><?
                }
            }?>
		</nav>
	</div><!-- .activities_nav_block }}}1 -->
</div><!--.section_wrap-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
