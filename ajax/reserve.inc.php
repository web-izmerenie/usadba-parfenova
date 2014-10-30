<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

if (
	!$_POST["house_id"] || !$_POST["house_name"] ||
	!$_POST["people_count"] || !$_POST["hidden_people_count"] ||
	!$_POST["in_date"] || !$_POST["out_date"] ||
	!$_POST["name"] || !$_POST["last_name"] || !$_POST["phone"]
) {
	$response["status"] = "error";
	$response["error_code"] = "required_fields";

	if (!$_POST["house_id"] || !$_POST["house_name"])
		$response["fields_names"][] = "house_name";
	if (!$_POST["people_count"] || !$_POST["hidden_people_count"])
		$response["fields_names"][] = "people_count";
	if (!$_POST["in_date"])
		$response["fields_names"][] = "in_date";
	if (!$_POST["out_date"])
		$response["fields_names"][] = "out_date";
	if (!$_POST["name"])
		$response["fields_names"][] = "name";
	if (!$_POST["last_name"])
		$response["fields_names"][] = "last_name";
	if (!$_POST["phone"])
		$response["fields_names"][] = "phone";
} else {
	if (!preg_match("/([0-9]+)/", $_POST["phone"])) {
		$response["status"] = "error";
		$response["error_code"] = "incorrect_fields";
		$response["fields_names"][] = "phone";
	} else {
		CModule::IncludeModule("iblock");
		$el = new CIBlockElement;
		$arFields = array(
			"IBLOCK_ID" => 22,
			"ACTIVE" => "N",
			"DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"),
			"NAME" => "-",
			"PROPERTY_VALUES" => array(
				"lang" => $_POST["lang"],
				"name" => $_POST["name"],
				"last_name" => $_POST["last_name"],
				"phone" => $_POST["phone"],
				"in_date" => $_POST["in_date"],
				"out_date" => $_POST["out_date"],
				"house_name" => $_POST["house_name"],
				"house_id" => $_POST["house_id"],
				"people_count" => $_POST["people_count"],
				"people_count_2" => $_POST["hidden_people_count"],
			)
		);

		$add = $el->Add($arFields);

		if ($add) {
			$response["status"] = "success";

			$site_id = $_POST["lang"] == "ru" ? "s1" : "en";
			$send = CEvent::SendImmediate(
				"RESERVE_SENT",
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
