 $(document).ready(function(){

   $.ajax({ 
        url:'action.php',
        method: 'post',
        data:'action=checkCookies'
   }).done(function(result){
        var data = JSON.parse(result); 
        $('#email').val(data.email);
        $('#password').val(data.password);      
      })


 	$("#signin").validate({//("^[a-zA-Z]+$")
      
      rules:{
        email:{
          required:true,
          email:true
        },
        password:{
          required:true,
          minlength:8,
          maxlength:20
        }

      },
      messages:{
        email:{
          required:" Email field is required..  "
        },

        password:{
          required:"Password is required"
        },


      }
    });

   
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });
      

      $( "#login" ).click(function(event) {
         var form = $( "#signin" );
         if(form.valid()){
         	event.preventDefault();
          var form_data = $('#signin').serialize();
          $.ajax({ 
              url:'action.php',
              method: 'post',
              data: form_data + '&action=login'
          }).done(function(result){
          	var data = JSON.parse(result);  
            console.log(data);

          	$('.alert').show();
          	if(data.status == 0){
          		$('#result').html(data.msg);

          	}else{
          		document.location = 'userpage1.php';
          	}
          
            
          })

        }else{
          $('.alert').show();
          $('#result').html("Please Enter correct email-id and password");
        }

      });


 })