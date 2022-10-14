<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Crud</title>
  </head>
  <body>
    <div class="container">
      <form method="POST" id="regForm">
        <div class="row mt-5">
          <div class="col-sm-3 col-md-3">
            <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="form-control">
          </div>
          <div class="col-sm-3 col-md-3">
            <input type="email" name="email" id="email" placeholder="Email Address" class="form-control">
          </div>
          <div class="col-sm-3 col-md-3">
            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
          </div>
          <div class="col-sm-3 col-md-3">
            <input type="button" name="submit" id="submit" class="btn btn-success" value="Submit">
          </div>
        </div>
        <div id="success" class="text-center mt-2 text-success">
          
        </div>
        <table id="table" class="table table-dark table-striped mt-2">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Password</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
            
          </tbody>
        </table>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="assets/js/script.js" type="text/javascript" ></script>
    <?php include('assets/modals/updateModal.html'); ?>
  </body>
</html>