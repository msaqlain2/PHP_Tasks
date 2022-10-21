$(document).ready(function() {
	loadTable();

	$('#addNewUserForm').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url : 'controllers/addNewUser.controller.php',
			method : 'post',
			cache : false,
			data : $('#addNewUserForm').serialize(),
			success: function(dataResult) {
				console.log(dataResult);
				var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                	console.log(dataResult);
                    $("#success").show();
                    $('#addNewUser').modal('hide');
		            $('.modal-backdrop').remove();
                    $('#success').html('User added successfully !');
                    $('#addNewUserForm')[0].reset();
                    $('#success').fadeOut(2000);
                    loadTable();
                } else if(dataResult.statusCode == 101){
                    $(".error").show();
                    $('.error').html('Email Already Exists!!');

                } else if (dataResult.statusCode == 201) {
                    alert("Error occured !");
                }
			}
		});
	});

	$(document).on('click', '#deleteBtn', function() {
        let id = $(this).data("id");
        if (confirm("are you sure you want to delete this row?")) {
            $.ajax({
                url: "controllers/deleteUserData.controller.php",
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


    $(document).on("click", '#update', function() {
        var id = $(this).data("id");
        var email = $(this).data("email");
        var password = $(this).data("password");
        $('#uid').val(id);
        $('#uemail').val(email);
        $('#upassword').val(password);
    });

    $('#updateUserForm').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
	        url: "controllers/updateUserData.controller.php",
	        method: "POST",
	        cache: false, 
	        data : $('#updateUserForm').serialize(),
	        success:function(dataResult) {
	        	var dataResult = JSON.parse(dataResult);
	        	if(dataResult.statusCode==200){ 
	            $('#updateUser').modal('hide');
	            $('.modal-backdrop').remove();
	            $("#success").show();
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


    $('#chartForm').on('submit', function(e) {
        e.preventDefault();
        $('.exportBtn').toggle();
        var num1 = $('#number1').val();
        var num2 = $('#number2').val();
        var num3 = $('#number3').val();
         const data = {
          labels: ['Value#1', 'Value#2', 'Value#3'],
          datasets: [{
            label: 'Number of Values',

            data: [num1, num2, num3],
            backgroundColor: [
              'rgba(255, 26, 104, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',  
            ],
            borderColor: [
              'rgba(255, 26, 104, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
          }]
        };

        const bgColor = {
            id : 'bgColor',
            beforeDraw: (chart, steps, options) => {
                const {ctx, width, height} = chart;
                ctx.fillStyle = 'white';
                ctx.fillRect(0, 0, width, height);
                ctx.restore();
            }
        };


        // config 
        const config = {
          type: 'bar',
          data,
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
            plugins: {
                bgColor: {
                    backgroundColor: 'white'
                }
            },
            plugins: [bgColor]
        };

        // render init block
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    });

    

    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            url: "controllers/login.controller.php",
            method: "POST",
            cache: false, 
            data : $('#loginForm').serialize(),
            success:function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200){ 
                    window.location.href = "chart.php";
                }
                else if(dataResult.statusCode == 201) {
                    window.location.href = "admin.php";
                }
                else if(dataResult.statusCode==500){
                    $(".error span").show();
                    $('.error span').html('Invalid Email or Password!!!');
                    $('.error span').fadeOut(2000);
                }
            }
        });
    });


    $(document).on('click', '#logout', function(e) {
        e.preventDefault(); 
        $.ajax({
            url: "controllers/logout.controller.php",
            
            success:function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200){ 
                    window.location.href = "index.php";
                }
            }
        });
    });

});

function loadTable() {
	$("table tbody *").empty();
    $.ajax({    
            url: 'controllers/showAllUsersData.controller.php',
            success: function(data) {
            $('table tbody').html(data);
        }
    });  
}

function downloadPDF() {

    const canvas = document.getElementById('myChart');
    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);
    console.log(canvasImage);
    let pdf = new jsPDF('landscape');

    pdf.setFontSize(20);
    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);
    pdf.save('chart.pdf');
}