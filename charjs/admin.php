<?php
session_start();
if(!isset($_SESSION['admin_email'])){
    header('Location:index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Login</title>
  </head>
  <body>
    <div class="container">
    	<div class="d-flex justify-content-between bg-secondary rounded p-1 mt-5">
        <div class="p-2">
          <h5 class="text-light mt-2">Add New User</h5>
        </div>
        <div class="p-2">
          
        </div>  
        <div class="p-2">
          <button type="button" class="btn btn-light btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#addNewUser">Add New User</button>
          <button class="btn btn-danger btn-sm mt-1" id="logout">Logout</button>
        </div> 
      </div>
      <div class="success text-center m-2" id="success">
        <span class="text-success text-bolder"></span>
      </div>
      <table class="table table-stripped mt-3">
        <thead>
          <tr>
            <th>S.No</th>
            <th>User Email</th>
            <th>User Password</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table> 
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="assets/js/script.js" type="text/javascript"></script>
    <?php include('assets/modals/addNewUser.modal.php'); ?>
    <?php include('assets/modals/UpdateUser.modal.php'); ?>
  </body>
</html>
