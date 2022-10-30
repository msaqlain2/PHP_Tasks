<?php
require_once('../../models/task.class.php');
echo json_encode((new task())->getAllPartSideData());