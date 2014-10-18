<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


$response = array();
$response["status"] = "error";

if (!$_POST["action"]) {
	$response["status"] = "error";
	$response["error_code"] = "no_action_field";
} else {
	if ($_POST["action"] == "add_review") { // ADD UNACTIVE PREMODERATED REVIEW ITEM
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
	} elseif ($_POST["action"] == "add_question") { // ADD QUESTION FROM USER ASKED IN PUBLIC SITE PATH
		if (!$_POST["name"] || !$_POST["question_text"] || !$_POST["phone"]) {
			$response["status"] = "error";
			$response["error_code"] = "required_fields";

			if (!$_POST["name"])
				$response["fields_names"][] = "name";
			if (!$_POST["question_text"])
				$response["fields_names"][] = "question_text";
			if (!$_POST["phone"])
				$response["fields_names"][] = "phone";
		} else {
			if ($_POST["email"] && !preg_match("/^(.+)\@(.+)$/", $_POST["email"])) {
				$response["status"] = "error";
				$response["error_code"] = "incorrect_fields";
				$response["fields_names"][] = "email";
			} else {
				if ($_POST["phone"] && !preg_match("/([0-9]+)/", $_POST["phone"])) {
					$response["status"] = "error";
					$response["error_code"] = "incorrect_fields";
					$response["fields_names"][] = "phone";
				} else {
					$replace = preg_split("/[\n\r]+/", $_POST["question_text"]);
					$question_text = "";
					foreach ($replace as $string) {
						$string = trim($string);
						if ($string)
							$question_text .= "<p>".$string."</p>";
					}

					CModule::IncludeModule("iblock");
					$el = new CIBlockElement;
					$arFields = array(
						"IBLOCK_ID" => "6", //questions
						"ACTIVE" => "N",
						"DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"),
						"NAME" => $_POST["name"],
						"PREVIEW_TEXT" => $question_text,
						"PREVIEW_TEXT_TYPE" => "html",
						"PROPERTY_VALUES" => array(
							"EMAIL" => $_POST["email"],
							"PHONE" => $_POST["phone"],
							"LANG" => $_POST["lang"]
						)
					);

					$add = $el->Add($arFields);

					if ($add) {
						$response["status"] = "success";

						$site_id = $_POST["lang"] == "ru" ? "s1" : "en";
						$send = CEvent::SendImmediate(
							"QUESTION_SENT",
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
		}
	} elseif ($_POST["action"] == "reserve") {
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
	} else {
		$response["error_code"] = 'unknown_action';
	}
}

echo json_encode($response);
