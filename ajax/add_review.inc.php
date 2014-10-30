<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

if (!$_POST["name"] || !$_POST["review_text"]) {
	$response["status"] = "error";
	$response["error_code"] = "required_fields";
	if (!$_POST["name"])
		$response["fields_names"][] = "name";
	if (!$_POST["review_text"])
		$response["fields_names"][] = "review_text";
} else {
	if ($_POST["email"] && !preg_match("/^(.+)\@(.+)$/", $_POST["email"])) {
		$response["status"] = "error";
		$response["error_code"] = "incorrect_fields";
		$response["fields_names"][] = "email";
	} else {
		CModule::IncludeModule("iblock");
		$el = new CIBlockElement;
		$arFields = array(
			"ACTIVE" => "N",
			"DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"),
			"NAME" => $_POST["name"].($_POST["location"] ? ", ".$_POST["location"] : ""),
			"PREVIEW_TEXT" => $_POST["review_text"],
			"PREVIEW_TEXT_TYPE" => "text",
			"PROPERTY_VALUES" => array(
				"EMAIL" => $_POST["email"]
			)
		);

		switch ($_POST["lang"]) {
			case "ru":
				$arFields["IBLOCK_ID"] = 5; //reviews
			break;
			default:
				$arFields["IBLOCK_ID"] = 5; //reviews
			break;
		}

		$add = $el->Add($arFields);

		if ($add) {
			$response["status"] = "success";
			//REVIEW_SENT
			$site_id = $_POST["lang"] == "ru" ? "s1" : "en";
			$send = CEvent::SendImmediate(
				"REVIEW_SENT",
				$site_id,
				false,
				"N"
			);
		} else {
			$response["status"] = "error";
			$response["error_code"] = "add_to_iblock";
		}
	}
}
