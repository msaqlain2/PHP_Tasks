$(document).ready(function() {
  function loadTable() {
    $("#table tbody *").remove();
    $.ajax({
        url: "controllers/showAllData.php",
        type: "POST",
        cache: false,
        success: function(data){
         $.getJSON("controllers/showAllData.php", function (data) {
              var users = '';
              $.each(data, function (key, value) {

                  users += '<tr>';
                
                  users += '<td>' + 
                      value.id + '</td>';

                  users += '<td>' + 
                      value.full_name + '</td>';

                  users += '<td>' + 
                      value.email + '</td>';

                  users += '<td>' + 
                      value.password + '</td>';

                  users += '<td><button type="button" class="btn btn-danger btn-sm btn-sm" id="delete" data-id="' + value.id +'">Delete</button><button type="button" class="mx-2 btn btn-warning btn-sm btn-sm" id="update" data-bs-toggle="modal" data-id="' + value.id +'" data-bs-target="#updateModal">Update</button></td>';    

                  users += '</tr>';
              });
                
              //INSERTING ROWS INTO TABLE 
              $('#table tbody').append(users);
          });
      }
    });
  }
  loadTable();

  $('#submit').on('click', function() {
    var full_name = $('#full_name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    if(full_name!="" && email!="" && password!=""){
      $.ajax({
        url: "controllers/createNewAccount.php",
        type: "POST",
        data: {
          full_name: full_name,
          email: email,
          password: password,       
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){  

            loadTable();
            $("#success").show();
            $('#success').html('Data added successfully !');
            $('#regForm')[0].reset();

           
          
          }
          else if(dataResult.statusCode==201){
            alert("Error occured !");
          }
        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });

  $(document).on("click", "#delete", function() { 
    var id = $(this).data("id");
    $.ajax({
      url: "controllers/deleteUserData.php",
      type: "POST",
      cache: false,
      data:{
        id: id
      },
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          confirm("Are you sure, you want to delete this row?")
          loadTable();
        }
      }
    });
  });


  $(document).on("click", "#update", function() { 
    var id = $(this).data("id");
    $.ajax({
      url: "controllers/selectSpecificUserData.php",
      type: "POST",
      cache: false,
      data: {id : id},
      success:function(data) {
        var userData=JSON.parse(data);  
        $('input[name="ufull_name"').val(userData[0]['full_name']);
        $('input[name="uemail"').val(userData[0]['email']);
        $('input[name="upassword"').val(userData[0]['password']);
      }
    });

    $(document).on("click", '#updateDataBtn', function() {
      var full_name = $('#ufull_name').val();
      var email = $('#uemail').val();
      var password = $('#upassword').val();
      $.ajax({
        url: "controllers/updateUserData.php",
        method: "POST",
        cache: false,
        data : {id : id, full_name : full_name, email : email, password : password},
        success:function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){ 
            $('#updateModal').modal('hide');
            $('.modal-backdrop').remove();
            $("#success").show();
            $('#success').html('Data updated successfully !');
            $("#success").show();
            $('#success').html('Data deleted successfully !');
            loadTable();

          }
          else if(dataResult.statusCode==201){
            alert("Error Occured!")
          }
        }
      });
    });
  });
});