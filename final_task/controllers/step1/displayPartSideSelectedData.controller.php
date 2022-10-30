<?php

require_once('../../models/task.class.php');

$obj = new task();

$part_side = $obj->displayPartSideSelectedData();
echo json_encode($part_side);
