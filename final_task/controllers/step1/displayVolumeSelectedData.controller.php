<?php

require_once('../../models/task.class.php');

$obj = new task();

$volume = $obj->displayVolumeSelectedData();
echo json_encode($volume);
