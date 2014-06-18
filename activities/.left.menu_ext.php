<?
$aMenuLinks = array();
$aMenuLinksExt = array();
CModule::IncludeModule("iblock");
$menu = CIBlockElement::GetList(
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
while($arMenu = $menu->GetNext()){
    $aMenuLinksExt[] = array(
        $arMenu["NAME"], 
        $arMenu["DETAIL_PAGE_URL"], 
        array(), 
        Array(), 
        "" 
    );
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>