$(document).ready(function() {

    $('#part_side').select2({
        theme: 'bootstrap4',
        tags: true,
    }).on('select2:close', function() {
        var element = $(this);
        var partSide = $.trim(element.val());
        if (partSide != '') {
            $.ajax({
                url: 'controllers/default/addNewPartSide.controller.php/',
                method: 'POST',
                data: {
                    category_name: partSide
                },
                success: function(data) {
                    if ($('#part_sidepart_side').find("option[value='" + data.id + "']").length) {
                        $('#part_side').val(data.id).trigger('change');
                    } else { 
                        var newOption = new Option(data.part_side);
                        $('#part_side').append(newOption).trigger('change');
                    }
                }
            });
        }
    });


    $.ajax({
        url: 'controllers/default/fetchPartSide.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
        for (var i = 0; i < data.length; i++) {
        var newOption = new Option(data[i].part_side);
        $('#part_side').append(newOption).trigger('change');
          }
        },
    });


   

    $('#volume').select2({
        theme: 'bootstrap4',
        tags: true,
    }).on('select2:close', function() {
        var element = $(this);
        var volume = $.trim(element.val());
        if (volume != '') {
            $.ajax({
                url: 'controllers/default/addNewVolume.controller.php',
                method: 'POST',
                data: {
                    category_name: volume
                },
                success: function(data) {
                    if ($('#volume').find("option[value='" + data.id + "']").length) {
                        $('#volume').val(data.id).trigger('change');
                    } else { 
                        var newOption = new Option(data.volume);
                        $('#volume').append(newOption).trigger('change');
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'controllers/default/fetchVolume.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
                for (var i = 0; i < data.length; i++) {
                var newOption = new Option(data[i].volume);
                $('#volume').append(newOption).trigger('change');
            }
        },
    });

    $('#partorcrown').select2({
        theme: 'bootstrap4',
        tags: true,
    }).on('select2:close', function() {
        var element = $(this);
        var partOrCrown = $.trim(element.val());
        if (partOrCrown != '') {
            $.ajax({
                url: 'controllers/default/addNewPartOrCrown.controller.php',
                method: 'POST',
                data: {
                    category_name: partOrCrown
                },
                success: function(data) {
                    if ($('#partorcrown').find("option[value='" + data.id + "']").length) {
                        $('#partorcrown').val(data.id).trigger('change');
                    } else { 
                        var newOption = new Option(data.partorcrown);
                        $('#partorcrown').append(newOption).trigger('change');
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'controllers/default/fetchPartOrCrown.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                var newOption = new Option(data[i].partorcrown);
                $('#partorcrown').append(newOption).trigger('partorcrown');
            }
        },
    });


    $('#material_type').select2({
        theme: 'bootstrap4',
        tags: true,
    }).on('select2:close', function() {
        var element = $(this);
        var partOrCrown = $.trim(element.val());
        if (partOrCrown != '') {
            $.ajax({
                url: 'controllers/default/addNewMaterialType.controller.php',
                method: 'POST',
                data: {
                    category_name: partOrCrown
                },
                success: function(data) {
                    if ($('#material_type').find("option[value='" + data.id + "']").length) {
                        $('#material_type').val(data.id).trigger('change');
                    } else { 
                        var newOption = new Option(data.material_type);
                        $('#material_type').append(newOption).trigger('change');
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'controllers/default/fetchMaterialType.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                var newOption = new Option(data[i].material_type);
                $('#material_type').append(newOption).trigger('material_type');
            }
        },
    });

    
    $.ajax({
        url: 'controllers/step1/displayPartSideSelectedData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            
        }
    });
    
    

    $.ajax({
        url: 'controllers/step10/displayFrontData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#front').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayTopData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#top').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayLeftTempData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#left_temp').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayRightTempData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#right_temp').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayLeftSideData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#left_side').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayRightSideData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#right_side').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayCrownData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#crown').val(value);
            });
        }
    });

    $.ajax({
        url: 'controllers/step10/displayBackData.controller.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log();
            $.each(data[0], function(key, value){
                $('#back').val(value);
            });
        }
    });

    


    $('#form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'controllers/step10/submitForm.controller.php',
            type: 'POST',
            data: $('#form').serialize(),
            success: function(data) {
                alert("Data Saved SuccessFully");
            }
        });
    });




});