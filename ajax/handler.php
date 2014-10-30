<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$response = array();
$response["status"] = "error";

if (!$_POST["action"]) {
	$response["status"] = "error";
	$response["error_code"] = "no_action_field";
} else {
	if ($_POST["action"] == "add_review") { // ADD UNACTIVE PREMODERATED REVIEW ITEM
		require './add_review.inc.php';
	} elseif ($_POST["action"] == "add_question") { // ADD QUESTION FROM USER ASKED IN PUBLIC SITE PATH
		require './add_question.inc.php';
	} elseif ($_POST["action"] == "reserve") {
		require './reserve.inc.php';
	} elseif ($_POST["action"] == "get_more_events") {
		require './get_more_events.inc.php';
	} else {
		$response["error_code"] = 'unknown_action';
	}
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
