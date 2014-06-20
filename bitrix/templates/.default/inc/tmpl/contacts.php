<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="contacts">
	<div class="contact_unit"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/contacts/block1.php"
	)
);?>
	</div>

	<h2><?=GetMessage("TRANSFER")?></h2>

	<div class="way_icons">
		<span class="icon-airplane" title="Самолетом"></span>
		<span class="icon-train" title="Поездом"></span>
		<span class="icon-bus" title="Автобусом"></span>
		<span class="icon-car" title="На машине"></span>
	</div>

	<div class="centering">
		<div class="notation">
			<?=GetMessage("TRANSFER_LONG")?>
		</div>
	</div><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/inc/contacts/block2.php"
	)
);?>
<?
    CModule::IncludeModule("iblock");
    $map = CIBlockElement::GetList(
        array(
            "SORT" => "asc"
        ),
        array(
            "ACTIVE" => "Y",
            "IBLOCK_TYPE" => LANGUAGE_ID,
            "IBLOCK_CODE" => "maps"
        ),
        false,
        false,
        array()
    );
    
    $index = 0;
    while($arMap = $map->GetNextElement()){
        $fields = $arMap->GetFields();
        $props = $arMap->GetProperties();?>
        <h2><?=$fields["NAME"]?></h2><?
        $data = array();
        $error = array();
        
        $from = $props["FROM"]["VALUE"];
        
        if(preg_match("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", $from)){            
            $from = preg_replace("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", "\$2,\$1", $from);
            $from = explode(",", $from);
            $from_array = array(
                "type" => "wayPoint", 
                "point"=> array($from[0], $from[1])
            ); 
        }else{
            $from_array = array(
                "type" => "wayPoint", 
                "point"=> $from
            ); 
        }      
        
        
        $data[$index][] = $from_array;
        
        $via = $props["VIA"]["VALUE"];        
        
        $via_array = array();
        if($via){            
            $counter = 0;
            foreach($via as $v){
                $counter++;
                if(preg_match("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", $v)){            
                    $v = preg_replace("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", "\$2,\$1", $v);
                    $v = explode(",", $v);
                    $data[$index][] = array(
                        "type" => "viaPoint", 
                        "point"=> array($v[0], $v[1])
                    ); 
                }else{
                    $data[$index][] = array(
                        "type" => "viaPoint", 
                        "point"=> $v
                    );
                }      
                
                
            }
        }
        
        $to = $props["TO"]["VALUE"];
        
        if(preg_match("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", $to)){            
            $to = preg_replace("/([0-9]+\.[0-9]+)\,\s*([0-9]+\.[0-9]+)/", "\$2,\$1", $to);
            $to = explode(",", $to);
            $to_array = array(
                "type" => "wayPoint", 
                "point"=> array($to[0], $to[1])
            );
        }else{
            $to_array = array(
                "type" => "wayPoint", 
                "point"=> $to
            );
        }       
        
        $data[$index][] = $to_array;
        
        $json_info = json_encode($data);?>
        
        <div class="interactive_map" data-center-x="<?=$props["CENTER_X"]["VALUE"]?>" data-center-y="<?=$props["CENTER_Y"]["VALUE"]?>" data-zoom="<?=$props["ZOOM"]["VALUE"]?>" data-route="<?=str_replace('"', '&quot;', $json_info)?>"><div class="map"></div></div><?
        
        $index++;
    }
?>
</section>
