<?php 

require_once '../models/crud.class.php';
$user_object = new crud();
$users_data = $user_object->showAllData();

$output = '';

foreach ($users_data as $key => $value) {
	$output .='
		<tr>
		<td>' . $value['id'] . '</td>
		<td>' . $value['full_name'] . '</td>
		<td>' . $value['email'] . '</td>
		<td>' . $value['password'] . '</td>
		<td><button type="button" class="btn btn-danger btn-sm btn-sm" id="delete" data-id="' . $value['id'] . '">Delete</button><button type="button" class="mx-2 btn btn-warning btn-sm btn-sm" id="update" data-bs-toggle="modal" data-id="' . $value['id'] . '" data-bs-target="#updateModal">Update</button></td>
		</tr>

	';
}
echo $output;

