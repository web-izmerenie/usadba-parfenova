<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/homestead/([a-zA-Z]+)/([a-zA-Z]+)/#",
		"RULE" => "ELEMENT_CODE=\$2",
		"ID" => "bitrix:news.detail",
		"PATH" => "/homestead/detail.php",
	)
);

?>