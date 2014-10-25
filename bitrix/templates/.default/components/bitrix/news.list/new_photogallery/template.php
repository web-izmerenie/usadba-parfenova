<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$photos = array();
foreach ($arResult["ITEMS"] as $arItem) {
	$photos[] = $arItem["DETAIL_PICTURE"];
}
?>

<?$APPLICATION->IncludeFile(
	"inc/tmpl/new_gallery.php",
	array('photos' => $photos),
	array("SHOW_BORDER" => false)
);?>
