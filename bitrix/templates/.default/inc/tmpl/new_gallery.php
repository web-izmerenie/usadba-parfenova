<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($photos):?>
	<div class="photogallery">
		<div class="new_gallery_big">
			<a class="prev"></a>
			<a class="next"></a>
			<div class="slider"></div>
		</div>
		<ul class="new_gallery_list">
			<?foreach($photos as $image):?>
				<?
				$thumb = CFile::ResizeImageGet(
					$image,
					array("width" => "57", "height" => "57"),
					BX_RESIZE_IMAGE_EXACT);
				$imageData = CFile::GetFileArray($image);
				$originResizeType = BX_RESIZE_IMAGE_EXACT;
				if ($imageData["WIDTH"] <= $imageData["HEIGHT"])
					$originResizeType = BX_RESIZE_IMAGE_PROPORTIONAL_ALT;
				$origin = CFile::ResizeImageGet(
					$image,
					array("width" => "940", "height" => "454"),
					$originResizeType);
				?>
				<li>
					<a href="<?=$origin["src"]?>" target="_blank">
						<img
							alt="<?=$thumb["description"]?>"
							src="<?=$thumb["src"]?>" />
					</a>
				</li>
			<?endforeach?>
		</ul>
	</div>
<?endif?>
