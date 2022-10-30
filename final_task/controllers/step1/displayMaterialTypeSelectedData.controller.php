<?php

require_once('../../models/task.class.php');

$obj = new task();

$material_type = $obj->displayMaterialTypeSelectedData();
echo json_encode($material_type);
