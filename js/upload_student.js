
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#upload_student").on('submit', function(e){
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
                 $('#upload_student').css("opacity",".5");
             },
             success: function(response){ //console.log(response);
                 $('.statusMsg').html('');
                 if(response.status == 1){
                     $('#upload_student')[0].reset();
                     $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                 }else{
                     $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                 }
                 $('#upload_student').css("opacity","");
                 $(".submitBtn").removeAttr("disabled");
             }
         });
     });
    });
    // File type validation
    $("#file").change(function() {
     var file = this.files[0];
     var fileType = file.type;
     var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
     if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
         alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
         $("#file").val('');
         return false;
     }
    });
           
    