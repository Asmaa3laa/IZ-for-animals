$('#country').change(function(){
    var countryID = $(this).val(); 
    console.log(countryID);   
    if(countryID){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
           type:"get",
           dataType: "json",
           url:'/get-state-list/'+countryID,
           success:function(res){               
            if(res){
                // console.log(res);
                $("#state").empty();
                $("#state").append('<option>Select State</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
            console.log('failll res');

               $("#state").empty();
            }
           },
           error: function() {
            console.log("ajax failed");
        }
        });
    }else{
        console.log('failll');
        $("#state").empty();
    }      
   });