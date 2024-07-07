<?php
function getMaxMin($items, $attendances)
{
  try {
    // check if items and attendances are the same length
    if (count($items) != count($attendances)) {
      throw new Exception("Items and attendances must be the same length");
    }
    $item_attendances = array();
    // check if attendance is a number
    for ($i = 0; $i < count($items); $i++) {
      if (!is_numeric($attendances[$i])) {
        throw new Exception("Attendance must be a number");
      }
      $item_attendances_array = array("item"=>$items[$i], "attendance"=>$attendances[$i]);
      array_push($item_attendances,$item_attendances_array);
    }

    usort($item_attendances, function($a, $b) {
          return $b['attendance'] <=> $a['attendance'];
    });

    $max_item = $item_attendances[0]['item'] . ' - ' . $item_attendances[0]['attendance'];
    $min_item = $item_attendances[count($item_attendances)-1]['item'] . ' - ' . $item_attendances[count($item_attendances)-1]['attendance'];

    return array($max_item,$min_item);
  } catch (Exception $e) {
    return array("Error: " . $e->getMessage());
  }
}
