<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
CModule::IncludeModule("iblock");
?>

<h2><?=GetMessage("PRICE_MAIN_TITLE")?></h2><?
$iblock  =CIBlock::GetList(
    array(),
    array(
        "TYPE" => LANGUAGE_ID,
        "CODE" => "price"
    ),
    false
);
$arIBlock = $iblock->Fetch();
$section = CIBlockSection::GetList(
    array(
        "SORT" => "asc"
    ),
    array(
        "IBLOCK_TYPE" => LANGUAGE_ID,
        "IBLOCK_CODE" => "price",
        "IBLOCK_ID" => $arIBlock["ID"]
    ),
    false,
    array("UF_*"),
    false
);
while($arSection = $section->GetNext()){?>
    <h3><?=$arSection["NAME"]?></h3><?
    $res = CIBlockElement::GetList(
        array(
            "SORT" => "asc"
        ),
        array(
            "ACTIVE" => "Y",
            "IBLOCK_TYPE" => LANGUAGE_ID,
            "IBLOCK_CODE" => "price",
            "IBLOCK_ID" => $arIBlock["ID"],
            "SECTION_ID" => $arSection["ID"]
        ),
        false,
        false,
        array()
    );
    if(!$arSection["UF_ADDITIONAL"]){?>
        <table class="centered_cells">
            <tr>
                <th>№</th>
                <th><?=GetMessage("CATEGORY")?></th>
                <th><?=GetMessage("NUM_DESC")?></th><?
                for($i = 1; $i <= $arSection["UF_PLACES_MAX"]; $i++){?>
                <th><?=GetMessage("PLACE_COUNT_".$i)?></th><?
                }?>
            </tr><?
            while($arRes = $res->GetNextElement()){
            $fields = $arRes->GetFields();
            $props = $arRes->GetProperties();?>
            <tr>
                <td><?=$fields["SORT"]?></td>
                <td><?=$fields["NAME"]?></td>
                <td><?=$props["DESC"]["VALUE"]?></td><?
                for($i = 1; $i <= $arSection["UF_PLACES_MAX"]; $i++){?>
                <td><?=$props["PLACES_".$i]["VALUE"]?></td><?
                }?>
            </tr>
            <?}?>
        </table><?
    }else{?>
        <table class="fixed_cells_3">
            <tr>
                <th><?=GetMessage("SERVICE_NAME")?></th>
                <th><?=GetMessage("PRICE")?></th>
                <th><?=GetMessage("WORKTIME")?></th>
            </tr><?
            while($arRes = $res->GetNextElement()){
            $fields = $arRes->GetFields();
            $props = $arRes->GetProperties();?>
            <tr>
                <td><?=$fields["NAME"]?></td>
                <td class="centered"><?=$props["PRICES_ADD"]["~VALUE"]?></td>
                <td class="centered"><?=$props["WORKTIME"]["~VALUE"] ? $props["WORKTIME"]["~VALUE"] : "-"?></td>
            </tr><?
            }?>
        </table><?
    }
    echo $arSection["DESCRIPTION"];
}?>