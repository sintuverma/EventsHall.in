<?php 

  session_start();
   if($_SESSION['id'] != session_id()) {
    header('location:login.html');
  };


  require 'guestHouse.php';
  $gHouse = new GuestHouse();
  $gHouse->setEmail($_COOKIE['email']);
  $guestdata = $gHouse->getUserByEmail();
  $guestImage = $gHouse->getImageFromGuestHouse();
  

 ?>




<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="assets/css/home.css">
  <link rel="stylesheet" type="text/css" href="assets/css/userfinalpage2_style.css">
  

</head>
<body>
<h2 class="blink" id="top_heading" ><?php echo $guestdata['name'] ?></h2>  
</div><br><br>

<div class="container" >
  <div class="row">
       <?php 
            $count =0;
            foreach ($guestImage  as $row) {
              $count +=1;
              
          ?>
     
    <div class="mySlides">
        <div class="numbertext"><?php echo $count ?> / 10</div>
        <img src="upload/<?php  echo $row['image_name'] ?>" style="width:640px; height: 460px">
    </div>
   
   
 
  <?php 
  } 

  ?>
 </div>
   <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  
  <div class="caption-container">
    <p id="caption"></p>
  </div>
<div class="row">
         <?php 
            $count =0;
            foreach ($guestImage  as $row) {
                $count +=1;
              
          ?>
  
    <div class="column">
      <img class="demo cursor" src="upload/<?php  echo $row['image_name'] ?>" style="width:100%" onclick="currentSlide(<?php echo $count  ?>)" alt="<?php  echo $row['image_name'] ?>">
    </div>
     <?php 
          } 

      ?>
  
</div>
</div>
<br>
<div class="col-sm-4 col-md-8 col-lg-12">
<h1 id ="mid_heading"> Related Information below:-</h1>
</div>
<br>
<br>
    <div class="container" id="table">
         <div class="row">
             <div class="col-lg-12 ">
  
              <table class="table table-responsive"  >
                  <tr>
                        <th>Name:</th><td class="table_data"><?php echo $guestdata['name'] ?></td>
                        
                  </tr>
                  <tr>
                       <th>Owner or Manager Name:</th><td class="table_data"><?php echo $_SESSION['username'] ?></td>
                  </tr>
                  <tr>
                       <th>Address:</th>
                       <td class="table_data"><?php echo $guestdata['address'] ?><?php echo $guestdata['hallArea'] ?></td>
                 </tr>
                  <tr>
                       <th>Pincode:</th><td><?php echo $guestdata['pincode'] ?></td>
                  </tr>
                  <tr>
                       <th>City Or District:</th><td class="table_data"><?php echo $guestdata['city'] ?></td>
                  </tr>
                  <tr>
                       <th>State :</th><td class="table_data" ><?php echo $guestdata['state'] ?></td>
                  </tr>
                  <tr>
                        <th>Contact Number:</th><td><?php echo $_SESSION['mobile'] ?></td>
                  </tr>
                  <tr>
                        <th>Website:</th><td><a id="url_link" href="<?php echo $guestdata['url'] ?>"><?php echo $guestdata['url'] ?></a></td>
                  </tr>
                  <tr>
                        <th>Email Id:</th><td><?php echo $guestdata['email'] ?></td>
                   </tr>
                   <tr>
                         <th>Faciality & Services:</th><td><?php echo $guestdata['info'] ?></td>
                  </tr>

              </table>

            </div>
          </div>
  
    </div>


    <br>
    <br>

    <!-- Trigger the modal with a button -->
      
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <form method="post" id="guest_update_form">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Information Form</h4>
                  </div>

                  <div class="modal-body">
                      <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-leble="Close">x</button>
                            <div id="result"></div>
                      </div>
                </div>
                     <div class="form-group">
                            <label>Guest House Name</label>
                            <input type="text" name="gHouse_name" id="gHouse_name" class="form-control" />
                      </div>
                      <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" id="address" class="form-control" />
                      </div>
                      <div class="form-group">
                            <label>Pincode</label>
                            <input type="number" name="pincode" id="pincode" class="form-control" />
                      </div>
                      <div class="form-group">
                            <label>City Or Distric</label>
                            <input type="text" name="city" id="city" class="form-control" />
                      </div>
                      <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="url" id="url" class="form-control" />
                      </div>
                      <div class="form-group">
                            <label>Facility & Servicese</label>
                            <input type="text" name="info" id="info" class="form-control" />
                      </div>
                  </div>

                  <div class="modal-footer">
                     <input type="submit" name="submit" class="btn btn-info pull-right" value="Update" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  </div>
              
            </form>
            
          </div>

        </div>
      </div>


    <footer class="container-fluid text-center">
        <p>&copy;All Copy right www.EventsHall.com 2018-2019</p>
        <div class="col-lg-12">
          
        <a href="logout.php"><button style=" " class="btn btn-danger btn-lg glyphicon glyphicon-off"> SignOut</button></a>
        <button style=" " class="btn btn-danger btn-lg glyphicon glyphicon-pencil edit"> Update</button>
  </footer>
<script src="assets/js/userfinalpage.js" type="text/javascript"></script>
<script >

  $(document).ready(function(){

          $(document).on('click', '.edit', function(){
                alert('hii');
                var image_id = 1;
                $.ajax({
                 url:"edit.php",
                 method:"post",
                 data:{image_id:image_id},
                 dataType:"json",
                 success:function(data)
                 {
                  $('#myModal').modal('show');
                  $('#gHouse_name').val(data.gname);
                  $('#address').val(data.address);
                  $('#pincode').val(data.pincode);
                  $('#city').val(data.city);
                  $('#url').val(data.url);
                  $('#info').val(data.info);
                 }
                });
           }); 

         $('#guest_update_form').on('submit', function(event){

              event.preventDefault();
              if($('#gHouse_name').val() == '')
              {
               alert("Enter Guest House Name");
              }
              else if($('#address').val() == ''){
                alert("Enter Address");
              }
               else if($('#city').val() == ''){
                alert("Enter City Name");
              }
               else if($('#info').val() == ''){
                alert("Enter Full description");
              }
               else if($('#pincode').val() == ''){
                alert("Enter 6 digit pincode");
              }
              else
              {
              var form_data =$('#guest_update_form').serialize();
              console.log(form_data)
               $.ajax({
                url:"action.php",
                method:"POST",
                data:form_data + '&action=update_gHouse'

                }).done(function(result)
                  {
                   var data = JSON.parse(result); 
                     $('.alert').show();
                    if(data.status == 0){
                      $('#result').html(data.msg);

                    }else{
                       alert('Information updated');
                      document.location = 'userpage2.php';
                    }
            

                });
              };      

    });

        });
  

</script>
</body>
</html>
