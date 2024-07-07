<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('functions.inc.php');

$output = array(
	"error" => false,
    "items" => "",
	"attendance" => 0,
	"max_item" => "",
	"min_item" => ""
);

try {
	// validate input data
	$items = array();
	$attendances = array();
	for ($i = 1; $i <= 4; $i++) {
		if (!isset($_REQUEST['item_' . $i])) {
			throw new Exception("Item " . $i . " is not set");
		}
		if (!isset($_REQUEST['attendance_' . $i])) {
			throw new Exception("Attendance " . $i . " is not set");
		}
		if (!is_numeric($_REQUEST['attendance_' . $i])) {
			throw new Exception("Attendance " . $i . " is not a number");
		}
		array_push($items, $_REQUEST['item_' . $i]);
		array_push($attendances, $_REQUEST['attendance_' . $i]);
	}
	$max_min_items=getMaxMin($items, $attendances);

	$output['items']=$items;
	$output['attendance']=$attendances;
	$output['max_item']=$max_min_items[0];
	$output['min_item']=$max_min_items[1];

	echo json_encode($output);
	$json_output = json_encode($output);
	return($json_output);
	exit();
} catch (Exception $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();
	echo json_encode($output);
	$json_output = json_encode($output);
	return($json_output);
	exit();
}
