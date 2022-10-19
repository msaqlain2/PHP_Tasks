$(document).ready(function() {

    loadTable();
    $('#regForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "controllers/createNewAccount.php",
            type: "POST",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    loadTable();
                    $("#success").show();
                    $('#success').html('Data added successfully !');
                    $('#regForm')[0].reset();
                    $('#success').fadeOut(2000);
                } else if (dataResult.statusCode == 201) {
                    alert("Error occured !");
                }
                else if(dataResult.statusCode == 500){
                    $('#error').html("Only jpeg, jpg, png and gif formats are allowed for upload file!!!");
                    $('#error').fadeOut(5000);
                }
            }
        });
    });

    $(document).on('click', '#delete', function() {
        let id = $(this).data("id");
        if (confirm("are you sure you want to delete this row?")) {
            $.ajax({
                url: "controllers/deleteUserData.php",
                type: "POST",
                cache: false,
                data: {
                    id: id
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#success").show();
                        $('#success').html('Data deleted successfully!');
                        $('#success').fadeOut(2000);
                        loadTable();
                    }
                }
            });
        } else {
            return false;
        }
    });

    $(document).on("click", '#update', function() {
        var id = $(this).data("id");
        var full_name = $(this).data("full_name");
        var email = $(this).data("email");
        var password = $(this).data("password");
        var oldImage = $(this).data("image");
        $('#uid').val(id);
        $('#ufull_name').val(full_name);
        $('#uemail').val(email);
        $('#upassword').val(password);
        $('#uoldimage').val(oldImage);
    });

  $('#updateForm').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
        url: "controllers/updateUserData.php",
        method: "POST",
        cache: false, 
        data : new FormData(this),
        contentType: false,
        processData: false,
        success:function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){ 
            $('#updateModal').modal('hide');
            $('.modal-backdrop').remove();
            $("#success").show();
            $('#unewimage').val('');
            $('#success').html('Data updated successfully !');
            $('#success').fadeOut(2000);
            loadTable();
          }
          else if(dataResult.statusCode==201){
            alert("Error Occured!")
          }
        }
        });
    });

});

function loadTable() {
    $("#table tbody *").empty();
    $.ajax({    
            url: 'controllers/showAllData.php',
            success: function(data) {
            $('#table #tbody').html(data);
        }
    });            
}

