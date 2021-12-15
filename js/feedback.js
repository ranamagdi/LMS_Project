
   
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#Feedback").on('submit', function(e){
         e.preventDefault();
         $.ajax({
             type: 'POST',
             url: 'submit.php',
             data: new FormData(this),
             dataType: 'json',
             contentType: false,
             cache: false,
             processData:false,
             beforeSend: function(){
                 $('.submitBtn').attr("disabled","disabled");
                 $('#Feedback').css("opacity",".5");
             },
             success: function(response){ //console.log(response);
                 $('.statusMsg').html('');
                 if(response.status == 1){
                     $('#Feedback')[0].reset();
                     $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                 }else{
                     $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                 }
                 $('#Feedback').css("opacity","");
                 $(".btn").removeAttr("disabled");
             }
         });
     });
    });
   