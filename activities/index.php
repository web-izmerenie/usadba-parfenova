<?
define("ACTIVITIES_PAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отдых");
?><?
    CModule::IncludeModule("iblock");
    $res = CIBlockElement::GetList(
        array(
            "SORT" => "asc"
        ),
        array(
            "ACTIVE" => "Y",
            "IBLOCK_TYPE" => LANGUAGE_ID,
            "IBLOCK_CODE" => "activities"
        ),
        false,
        array(
            "nTopCount" => 1
        ),
        array()
    );
    $arRes = $res->GetNext();
    
    LocalRedirect($arRes["DETAIL_PAGE_URL"]);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>