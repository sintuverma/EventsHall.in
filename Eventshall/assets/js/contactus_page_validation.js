$(document).ready(function(){

      jQuery.validator.addMethod("alpha", function(value, element) { 
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value)
        
      },"Alphabets and space like ram rajput only");
  
    $("#contactUs").validate({//("^[a-zA-Z]+$")
      
      rules:{
        username:{
          required: true,
          alpha:true,
          minlength:5
        },
        mobile_number:{
          required: true,
          number:true,
         
            minlength:10,
            maxlength:10
        },
        email:{
          required:true,
          email:true
        },
       
        comment1:{
          required:true,
          minlength:10
        },


      },
      messages:{
        username:{
          required:"Name is required.... Please fill it",
          minlength:"Please Enter five characters minimum"

        },
        
        mobile_number:{
          required:"Please Enter your Mobile number",
          number:"Enter only numbers 0123456789",
          minlength:" Enter minimum 10 numbers digit",
          maxlength:"Enter maximum only 10 numbers digit"
        },
        email:{
          required:" Email field is required..  "
        },

        

        comment1:{
          required:"Please check it this field."
        },
        

      }
    });

   
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });
      
      $("#register").click(function(event) {
        
        //event.preventDefault();
         var form = $( "#contactUs" );
         if(form.valid()){
          
          var form_data = $('#contactUs').serialize();
          $.ajax({ 
              url:'action.php',
              method: 'post',
              data: form_data + '&action=contactUs'
          }).done(function(result){
            $('.alert').show();
            $('#result').html(result);      
          })

        }else{
          $('.alert').show();
         $('#result').html("form not validate please validate first");
        }

      });

});