<?php

require_once('../models/chart.class.php');

$user_object = new chart();

$output = '';

$user_data = $user_object->showAllUsersData();
$counter = 1;
foreach ($user_data as $key => $value) {
	$output .= '
			<tr>
				<td>'. $counter++ .'</td>
				<td>'. $value['email'] .'</td>
				<td>'. $value['password'] .'</td>
				<td>
					<button type="button" class="btn btn-danger btn-sm" id="deleteBtn" data-id="'.$value['id'].'"><i class="fas fa-trash-alt"></i></button>
					<button type="button" id="update" data-id="'.$value['id'].'" data-email="'.$value['email'].'" data-password="'.$value['password'].'" class="btn btn-warning btn-sm text-light" data-bs-toggle="modal" data-bs-target="#updateUser"><i class="fa fa-edit"></i></button>
				</td>
			</tr>
	';
}

echo $output;