<?php
$arUrlRewrite=array (
    array(
        "CONDITION" => "#^/homestead/([a-z]+)/([a-z]+)/(.*)#",
        "RULE" => "ELEMENT_CODE=$2",
        "ID" => "bitrix:news.detail",
        "PATH" => "/homestead/detail.php",
    ),
    array(
        "CONDITION" => "#^/activities/([a-z]+)/details/#",
        "RULE" => "ELEMENT_CODE=$1",
        "ID" => "",
        "PATH" => "/activities/detail.php",
    ),
    array(
        "CONDITION" => "#^/activities/([a-z]+)/#",
        "RULE" => "ELEMENT_CODE=$1",
        "ID" => "",
        "PATH" => "/activities/title.php",
    ),
    
);
