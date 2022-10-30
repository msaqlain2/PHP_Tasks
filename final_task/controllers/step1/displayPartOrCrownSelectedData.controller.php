<?php

require_once('../../models/task.class.php');

$obj = new task();

$part_or_crown = $obj->displayPartOrCrownSelectedData();
echo json_encode($part_or_crown);
