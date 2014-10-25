<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/homestead/([a-z]+)/([a-z-_0-9]+)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$2",
		"ID" => "bitrix:news.detail",
		"PATH" => "/homestead/detail.php",
	),
	array(
		"CONDITION" => "#^/activities/([a-z]+)/details/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/activities/detail.php",
	),
	array(
		"CONDITION" => "#^/activities/([a-z-_]+)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/activities/title.php",
	),
	array(
		"CONDITION" => "#^/events/([0-9]+).html#",
		"RULE" => "ELEMENT_ID=\$1",
		"ID" => "",
		"PATH" => "/events/detail.php",
	),
	array(
		"CONDITION" => "#^/robots.txt(\\?|\$)#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/robots.php",
	),
);

?>