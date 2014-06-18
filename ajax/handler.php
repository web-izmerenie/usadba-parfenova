<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


$response = array();

if(!$_POST["action"]){
    $response["status"] = "error";
}else{
    if($_POST["action"] == "add_review"){ // ADD UNACTIVE PREMODERATED REVIEW ITEM
        if(!$_POST["name"] || !$_POST["review_text"]){
            $response["status"] = "error";
            $response["error_code"] = "required_fields";
            if(!$_POST["name"])
                $response["fields_names"][] = "name";
            if(!$_POST["review_text"])
                $response["fields_names"][] = "review_text";
        }else{
            if(!preg_match("/^(.+)\@(.+)$/", $_POST["email"])){
                $response["status"] = "error";
                $response["error_code"] = "incorrect_fields";
                $response["fields_names"][] = "email";
            }else{
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
                
                switch($_POST["lang"]){
                    case "ru":
                        $arFields["IBLOCK_ID"] = 5;
                    break;
                    default:
                        $arFields["IBLOCK_ID"] = 5;
                    break;
                }
                
                $add = $el->Add($arFields);  
                                             
                if($add)
                    $response["status"] = "success";
                else
                    $response["status"] = "error";                
            }
        }
    }
}
?>

<?
echo json_encode($response);
?>