<?php
session_start();
if(isset($SESSION['user_email'])) {
  header('Location: chart.php');
}
if(isset($_SESSION['admin_email'])) {
  header('Location: admin.php');
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
    	<div class="row mt-5">
       <div class="col-sm-4"></div> 
       <div class="col-sm-4 mt-5">
         <div class="card">
           <div class="card-title">
              <h4 class="text-center mt-2">Login</h4>
           </div>
         <div class="card-body">
            <form method="post" id="loginForm">
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="mt-3">Password</label>
                <input type="password" name="password" id="password" class="form-control mt-1" required>
              </div>
              <div class="form-group d-grid gap-2 mt-4">
                <input type="submit" name="" class="btn btn-success" value="Login">
              </div>
              <div class="error text-center mt-2">
                <span class="text-danger"></span>
              </div>
           </form>
         </div>

         </div>
       </div> 
       <div class="col-sm-4"></div> 
      </div>
  	</div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="assets/js/script.js" type="text/javascript"></script>

  </body>
</html>
