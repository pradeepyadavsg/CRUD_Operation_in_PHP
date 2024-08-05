$(document).ready(function(){

// for country
    $("#country").on('change',function(){
        var countryId=$(this).val();
        $.ajax({
            method:"POST",
            url:"ajax.php",
            data:{id:countryId},
            dataType:"html",
            success:function(data){
                $("#state").html(data);
            }
        });
    });

//for state

    $("#state").on('change',function(){
        var stateId=$(this).val();
        $.ajax({
            method:"POST",
            url:"ajax.php",
            data:{stateId:stateId},
            dataType:"html",
            success:function(data){
                $("#city").html(data);
            }
        });
    });
});