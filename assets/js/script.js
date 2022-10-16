$(document).ready(function() {

    loadTable();
    $('#regForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "controllers/createNewAccount.php",
            type: "POST",
            data: $('#regForm').serialize(),
            cache: false,
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
                        $('#success').html('Data deleted successfully !');
                        $('#success').fadeOut(2000);
                        loadTable();
                    }
                }
            });
        } else {
            return false;
        }
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

