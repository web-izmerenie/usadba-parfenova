<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * @author Viacheslav Lotsmanov
 * @license GNU/GPLv3
 * @see {@link https://github.com/web-izmerenie/usadba-parfenova/blob/master/LICENSE|License}
 */

$handle = function () use (&$response) {

	$count = (int)$_POST['count'];
	$lang = strtolower($_POST['lang']);
	$page = (int)$_POST['page'];

	// validation request data
	if (
		empty($_POST['count']) || !is_numeric($_POST['count']) ||
		empty($_POST['lang']) || ($lang !== 'ru' && $lang !== 'en') ||
		empty($_POST['page']) || !is_numeric($_POST['page'])
	) {
		$response['status'] = 'error';
		$response['error_code'] = 'incorrect_request_data';
		return;
	}

	CModule::IncludeModule('iblock');

	$iblockType = $lang;
	$iblockCode = '-';
	$arOrder = array('active_from' => 'desc');

	switch ($_POST['action']) {

	case 'get_more_events':

		$iblockCode = 'events';
		$arOrder = array('active_from' => 'desc');
		break;

	case 'get_more_qna':

		$iblockType = 'common';
		$iblockCode = 'questions';
		break;

	default:

		$response['status'] = 'error';
		$response['error_code'] = 'unknown_iblock';
		return;
	}

	$iblock = CIBlock::GetList(
		array(),
		array(
			'TYPE' => $iblockType,
			'CODE' => $iblockCode,
		));

	if ($iblock->SelectedRowsCount() <= 0) {

		$response['status'] = 'error';
		$response['error_code'] = 'get_iblock';
		return;
	}

	$arIBlock = $iblock->Fetch();

	$arFilter = array(
		'ACTIVE' => 'Y',
		'IBLOCK_ID' => $arIBlock['ID'],
	);

	$total = CIBlockElement::GetList(
		$arOrder,
		$arFilter,
		false,
		array(),
		array());

	// total count of all items in iblock
	$totalCount = $total->SelectedRowsCount();

	$res = CIBlockElement::GetList(
		$arOrder,
		$arFilter,
		false,
		array(
			'iNumPage' => $page,
			'nPageSize' => $count,
		),
		array());

	// count on current page
	$pageCount = $res->SelectedRowsCount();

	// count of all items on all previous pages
	// is not real, it's true value only if $pageCount is not zero
	// will be incremented on every item iteration
	$currentCount = ($page - 1) * $count;

	// count of all items on all previous pages and on current page too
	// is not real, it's true value only if $pageCount equals to $count
	$futureCount = ($page) * $count;

	if ($pageCount <= 0) {

		$response['status'] = 'end_of_list';
		return;
	}

	$response['status'] = 'success';
	$items = array();

	while ($arRes = $res->GetNextElement()) {

		$arResF = $arRes->GetFields();
		//$arResP = $arRes->GetProperties();

		if ($currentCount >= $totalCount) {

			// no items on this page
			$response["status"] = "end_of_list";
			break;
		} elseif ($futureCount >= $totalCount) {

			// has items on current page, but this page is last
			$response["status"] = "end_of_list";
			// don't break, show last page items
		}

		$item = array();

		switch ($_POST['action']) {

		case 'get_more_events':

			$item['id'] = $arResF['ID'];
			$item['title'] = $arResF['NAME'];

			// date
			$date = CIBlockFormatProperties::DateFormat(
				'j F Y', strtotime($arResF["DATE_ACTIVE_FROM"]));
			$date = explode(' ', $date);
			$item['date'] = $date[0].' '.$date[1];
			if ($date[2] != date('Y')) $item['date'] .= ' '.$date[2];

			if (!empty($arResF['PREVIEW_TEXT']))
				$item['text'] = $arResF['PREVIEW_TEXT'];

			if (!empty($arResF['DETAIL_TEXT']))
				$item['link'] = $arResF['DETAIL_PAGE_URL'];

			$picture = null;

			if (!empty($arResF['PREVIEW_PICTURE']))
				$picture = $arResF['PREVIEW_PICTURE'];
			elseif (!empty($arResF['DETAIL_PICTURE']))
				$picture = $arResF['DETAIL_PICTURE'];

			if ($picture) {

				$thumb = CFile::ResizeImageGet(
					$picture,
					array("width" => "401", "height" => "193"),
					BX_RESIZE_IMAGE_EXACT);

				$item['picture'] = array(
					'description' => $picture['DESCRIPTION'],
					'src' => $thumb['src'],
					'width' => $thumb['width'],
					'height' => $thumb['height'],
				);
			}

			break;

		case 'get_more_qna':

			$item['question'] = $arResF['PREVIEW_TEXT'];
			$item['answer'] = $arResF['DETAIL_TEXT'];
			break;

		default:

			$response['status'] = 'error';
			$response['error_code'] = 'unknown_iblock';
			return;
		}

		$items[] = $item;
		$currentCount++;
	}

	if (count($items) > 0) $response['items'] = $items;
};

$handle();
