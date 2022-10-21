<?php
session_start();
if(!isset($_SESSION['user_email'])){
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
    <script src="https://kendo.cdn.telerik.com/2022.3.913/js/pako_deflate.min.js"></script>
    <script type="text/javascript" src="assets/js/jspdf.debug.js"></script>
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <form method="post" id="chartForm">      	
        <div class="row mt-5">
          <div class="col-sm-3 col-md-3">
            <label>Number 1</label>
            <input type="number" class="form-control" name="number1" id="number1" required>
          </div> 
          <div class="col-sm-3 col-md-3">
            <label>Number 2</label>
            <input type="number" class="form-control" name="number2" id="number2" required>
          </div> 
          <div class="col-sm-3 col-md-3">
            <label>Number 3</label>
            <input type="number" class="form-control" name="number3" id="number3" required>
          </div> 
          <div class="col-sm-3 col-md-3 mt-4 ">
            <input type="submit"  class="btn btn-success " value="Generate Chart">
            <input type="button" class="btn btn-danger" id="logout" value="Logout">
          </div> 
        </div>
      </form>
      <div class="row mt-3">
          <div class="">
            <button style="display: none;"class="exportBtn btn btn-success" onclick="downloadPDF()">Export as PDF</button>
          </div>
        <div class="col-md-12 col-ms-12"  style="position: relative; height:10vh; width:40vw">
          <canvas id="myChart" width="100" height="100"></canvas>
        </div>
      </div>
  	</div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="assets/js/script.js" type="text/javascript"></script>
    <script src="assets/js/chart.js" type="text/javascript"></script>
  <script type="text/javascript">
    


  </script>
  </body>
</html>
