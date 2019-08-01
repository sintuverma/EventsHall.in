<!DOCTYPE html>
<html>
<head>
  <title>Upload your Images</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


  <style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{
      border: 1px solid black;
      padding: 10px;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }

    .alert{
      display: none;
    }

  </style>


</head>
<body>


<div class="container">
    <h1 style="text-align: center"> Upload Your Pictures </h1>
    <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-leble="Close">x</button>
            <div id="result"></div>
          </div>
    </div>

    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
          
            <input type="file" name="files[]" accept="image/x-png,image/gif,image/jpeg"  multiple />

            <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg"  multiple />
        </div>
        <div class="col-md-6">
          <input type="submit" class="btn btn-success" name="submit" value="Upload Image">
        </div>
      

    </form>


  .  <br/><br><br><br>
    <div id="image_preview"></div>
  </div><br><br><br>

    <div class="text-center">
      <p>If you uploaded picture than goto</p>
      <a href="userpage2.php"><button class="btn btn-success btn-large">Go To final page</button></a>
    </div>


</body>


<script type="text/javascript">
  

  $(document).ready(function(){

    $('#uploadForm').on('submit',function(event){
        event.preventDefault();
      $.ajax({ 
              url:'uploadFile.php',
              method: 'post',
              data: new FormData(this),
              contentType: false,
              processData: false,
              success: function(data){

                $('#image_preview').html(data);
                alert("image uploaded SuccessFully");
              }
          })

    })

  })



</script>
</html>