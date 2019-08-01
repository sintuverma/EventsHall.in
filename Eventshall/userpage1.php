<?php

 session_start();
  if($_SESSION['id'] != session_id()) {
   header('location:login.html');
  };





?>

<!DOCTYPE html>
 <html lang="en">
 <head>
 	  <title>Welcome Page</title>
 	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/userpage1_style.css">

 </head>
 <body>
 	<div class="navbar navbar-inverse  navbar-custom">
      <div class="container">
          <div class="navbar-header" <a href="#" class="pull-left">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
              </button>
              <a class="pull-left" href="#"><img  src="assets\images\logo.png" alt="Brand" width="100px" height="50px"></a>
              <a class="navbar-brand" href="#">Events Hall</a>
          </div>

         <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="searchpage.html"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                <li><a href="contactUs.html"><span class="glyphicon glyphicon-earphone"></span> ContactUs</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php echo $_SESSION['username']; ?></a></li>
                <li><button type="submit" class="btn navbar-btn btn-danger" name="logout" id="logout"  value="Log Out" style="border-radius: 15px;"><a href="logout.php">Sign Out</a></button></li>
              </ul>
          </div> 

      </div>
  </div><br><br><br>

<div class="container-fluid" style="background-color: #1B7C7E; ">
    <div class="row ">
          <div class="col-lg-12">
              <h2 class=" top_heading"  >Registeration Successfully</h2>
                  <h3  class="heading_second">Please  provide Your information related categeory:-</h3>
          </div>
    </div>
</div>

 <h2 id="center_heading"> Select One form Click The Button</h2>

 <div class="container-fluid" id="form2">
    <div class="row"><br>
        <div class="col-sm-4  id="guest1" >
    	
          <h3 id="event_form_heading"> Party Lawn,Palace, Hotel, Guest House, Banquet Hall Name Form   </h3>
  
              <a href=""><h4 class="head4 text-center">Hotel Place Party-Lawn</h4></a>
              
            <div class="img">
            <img src="assets\images\hallformpic.jpg" class="img-responsive"id="guest_image"  alt="Image"> 
            </div> <br><br>

   <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-danger btn-lg center-block btn-block" data-toggle="modal" data-target="#myModal" >Click Here
  </button>

  <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
    
      <!-- Modal content-->
                <div class="modal-content " >
                     <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 id="modal_top_heading" class="modal-title" ><b>Hall For Events Services</b> </h4>
                      </div>

                <div class="modal-body">
                  <div class="col-md-6 col-md-offset-3">
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-leble="Close">x</button>
                        <div id="result"></div>
                      </div>
                  </div>
                  <form id="guesthouse_form" method="post">
                             <div class="form-group">
                                <label for="guesthouse name">Your Party Lawn, Palace, Hotel, Guest House, Banquet Hall Name:</label>
                                   <input type="text" class="form-control" id="guesthouse_name" placeholder="Enter Name Here..." name="guesthouse_name">
                             </div>
                              <div class="form-group">
                                  <label for="address">Your Party Lawn, Palace, Hotel, Guest House, Banquet Hall Address:</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address" name="address1">
                              </div>
                              <div class="form-group">
                                   <label for="address">Your Party Lawn, Palace, Hotel, Guest House, Banquet Hall Area:</label>
                                      <input type="text" class="form-control" id="area1" placeholder="Area" name="area1">
                              </div>
                              <div class="form-group">
           
                                  <label for="Pincode" ">Pincode:</label>
                                      <input id="pincode1" class="form-control " type="number" name="pincode1"  placeholder="Pincode or Postal Code ">
                              </div>
                              <div class="form-group">
                                  <label for="city" ">City District Name:</label>
                                     <input id="city1" class="form-control " type="text" name="city1"  placeholder="City Or District Name">
                              </div>
                              <div class="form-group">
                              <label for="sel1">Select State:</label>
                                  <select class="form-control" id="sel1" name="sel1">
                                    <option>Select State</option>
                                    <option>Andaman and Nicobar Islands</option>
                                    <option>Andhra Pradesh</option>
                                    <option>Arunachal Pradesh</option>
                                    <option>Bihar</option>
                                    <option>Chandigarh</option>
                                    <option>Chhattisgarh</option>
                                    <option>Dadar and Nagar Haveli</option>
                                    <option>Daman and Diu</option>
                                    <option>Delhi</option>
                                    <option>Goa</option>
                                    <option>Gujarat</option>
                                    <option>Haryana</option>
                                    <option>Himachal Pradesh</option>
                                    <option>Jammu and Kashmir</option>
                                    <option>Jharkhand</option>
                                    <option>Karnataka</option>
                                    <option>Kerala</option>
                                    <option>Lakshadeep</option>
                                    <option>Madya Pradesh</option>
                                    <option>Maharashtra</option>
                                    <option>Manipur</option>
                                    <option>Meghalaya</option>
                                    <option>Mizoram</option>
                                    <option>Nagaland</option>
                                    <option>Orissa</option>
                                    <option>Pondicherry</option>
                                    <option>Punjab</option>
                                    <option>Rajasthan</option>
                                    <option>Sikkim</option>
                                    <option>Tamil Nadu</option>
                                    <option>Tripura</option>
                                    <option>Uttaranchal</option>
                                    <option>Uttar Pradesh</option>
                                    <option>West Bengal</option>
                            
                          </select>
                          </div>
                           <div class="form-group">
	                              <label for="website">Enter your website if You have any </label>
                                    <input type="text" class="form-control" id="website" name="website" placeholder="http://www.xyz.com">
           
                           </div>
                          <div class="form-group">
      	                        <label for="Description">Facility Or Services Providing Detail:</label>
                                    <textarea class="form-control" rows="3" id="comment" placeholder="What kind services you provide in any events. Write Here...." name="comment1"></textarea>
           
                                    <br>
                                <button type="submit" class="btn btn-success btn-lg btn-block" id="register_guesthouse">Submit
                                </button>
                          </div>
         </form>
        </div>
      </div> 
                      
    </div>
  </div>
  
</div>
      <div class="col-sm-4"id="cat1">
      
 <h3 id="catering_heading" style=" "> Catering Services Form   </h3>
 <a href=""><h4 class="head4 text-center">Catering</h4></a>
 <div class="img">
            <img id="guest_image" src="assets\images\cateringformpic.jpg" class="img-responsive"  alt="Image">
  </div>
  <br>
  <!-- Trigger the modal with a button -->
  <br>
  <button type="button" class="btn btn-warning btn-lg center-block btn-block" data-toggle="modal" data-target="#myModal1">Click Here</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" style="background-color: red" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="modal_top_heading" class="modal-title"><b>Catering Services</b></h4>
        </div>
        <div class="modal-body">
                <div class="col-md-6 col-md-offset-3">
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-leble="Close">x</button>
                        <div id="result1"></div>
                      </div>
                </div>
             <form id="catering_form" method="post">
                  <div class="form-group">
                      <label for="catering_name">Catering Services Company Name:</label>
                           <input type="text" class="form-control" id="catering_name" placeholder="Enter Name Here..." name="catering_name">
                  </div>

                  <div class="form-group">
                        <label for="address2">Catering Services Company Address:</label>
                            <input type="text" class="form-control" id="address2" placeholder="Address" name="address2">
                  </div>

                  <div class="form-group">
                        <label for="area2">Catering Services Company Area:</label>
                            <input type="text" class="form-control" id="area2" placeholder="Area" name="area2">
                 </div>

                  <div class="form-group">
                        <label for="Pincode2" ">Pincode:</label>
                             <input id="pincode2" class="form-control " type="number" name="pincode2"  placeholder="Pincode or Postal Code ">
                 </div>

                  <div class="form-group">
                          <label for="city2" ">City District Name:</label>
                                <input id="city2" class="form-control " type="text" name="city2"  placeholder="City Or District Name">
                  </div>

                  <div class="form-group">
                           <label for="sel2">Select State:</label>
                                <select class="form-control" id="sel2" name="sel2">
                                              <option>Select State</option>
                                              <option>Andaman and Nicobar Islands</option>
                                              <option>Andhra Pradesh</option>
                                              <option>Arunachal Pradesh</option>
                                              <option>Bihar</option>
                                              <option>Chandigarh</option>
                                              <option>Chhattisgarh</option>
                                              <option>Dadar and Nagar Haveli</option>
                                              <option>Daman and Diu</option>
                                              <option>Delhi</option>
                                              <option>Goa</option>
                                              <option>Gujarat</option>
                                              <option>Haryana</option>
                                              <option>Himachal Pradesh</option>
                                              <option>Jammu and Kashmir</option>
                                              <option>Jharkhand</option>
                                              <option>Karnataka</option>
                                              <option>Kerala</option>
                                              <option>Lakshadeep</option>
                                              <option>Madya Pradesh</option>
                                              <option>Maharashtra</option>
                                              <option>Manipur</option>
                                              <option>Meghalaya</option>
                                              <option>Mizoram</option>
                                              <option>Nagaland</option>
                                              <option>Orissa</option>
                                              <option>Pondicherry</option>
                                              <option>Punjab</option>
                                              <option>Rajasthan</option>
                                              <option>Sikkim</option>
                                              <option>Tamil Nadu</option>
                                              <option>Tripura</option>
                                              <option>Uttaranchal</option>
                                              <option>Uttar Pradesh</option>
                                              <option>West Bengal</option>
                                              
                                  </select>
                  </div>
                  <div class="form-group">
                       <label for="Description">Services Description:</label>
                              <textarea class="form-control" rows="3" id="comment2" placeholder="What kind services you provide in any events. Write Here...." name="comment2"></textarea>
                              <button type="submit" class="btn btn-success btn-lg btn-block" id="register_catering">Submit</button>
                  </div>
         </form>
    </div>
        

    
</div> 
                      
  </div>
  </div>
</div>

    <div class="col-sm-4" id="stu1">
        <h3 id="photo_top_heading"> Photography Studio Services Form   </h3>
            <a href=""><h4 class="head4 text-center">Studio</h4></a>
              <div class="img">
                  <img src="assets\images\photostudio.jpg" id="guest_image" class="img-responsive" alt="Image">
              </div><br><br>
  
  <!-- Trigger the modal with a button -->
  
              <button type="button" class="btn btn-info btn-lg center-block btn-block" data-toggle="modal" data-target="#myModal2">Click Here</button>

  <!-- Modal -->
          <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
    
      <!-- Modal content-->
                   <div class="modal-content">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 id="modal_top_heading" class="modal-title"><b>Photography Studio Services </b> </h4>
                        </div>

                        <div class="modal-body">
                             <form id="studio_form">
                                  <div class="form-group">
                                        <label for="studio_name">Photography Studio Name:</label>
                                              <input type="text" class="form-control" id="studio_name" placeholder="
                                              Enter Name Here..." name="studio_name">
                                  </div>

                                  <div class="form-group">
                                        <label for="address3">Photography Studio Address:</label>
                                          <input type="text" class="form-control" id="address3" placeholder="Address" name="address3">
                                  </div>

                                   <div class="form-group">
                                        <label for="address3">Photography Studio Area:</label>
                                              <input type="text" class="form-control" id="address3" placeholder="Area" name="area3">
                                   </div>

                                   <div class="form-group">
                                          <label for="Pincode" ">Pincode:</label>
                                                <input id="pincode3" class="form-control " type="number" name="pincode3"  placeholder="Pincode or Postal Code ">
                                   </div>

                                    <div class="form-group">
                                          <label for="city" ">City District Name:</label>
                                                <input id="city3" class="form-control " type="text" name="city3"  placeholder="City Or District Name">
                                    </div>

                                    <div class="form-group">
                                          <label for="sel1">Select State:</label>
                                                <select class="form-control" id="sel1">
                                                        <option>Select State</option>
                                                        <option>Andaman and Nicobar Islands</option>
                                                        <option>Andhra Pradesh</option>
                                                        <option>Arunachal Pradesh</option>
                                                        <option>Bihar</option>
                                                        <option>Chandigarh</option>
                                                        <option>Chhattisgarh</option>
                                                        <option>Dadar and Nagar Haveli</option>
                                                        <option>Daman and Diu</option>
                                                        <option>Delhi</option>
                                                        <option>Goa</option>
                                                        <option>Gujarat</option>
                                                        <option>Haryana</option>
                                                        <option>Himachal Pradesh</option>
                                                        <option>Jammu and Kashmir</option>
                                                        <option>Jharkhand</option>
                                                        <option>Karnataka</option>
                                                        <option>Kerala</option>
                                                        <option>Lakshadeep</option>
                                                        <option>Madya Pradesh</option>
                                                        <option>Maharashtra</option>
                                                        <option>Manipur</option>
                                                        <option>Meghalaya</option>
                                                        <option>Mizoram</option>
                                                        <option>Nagaland</option>
                                                        <option>Orissa</option>
                                                        <option>Pondicherry</option>
                                                        <option>Punjab</option>
                                                        <option>Rajasthan</option>
                                                        <option>Sikkim</option>
                                                        <option>Tamil Nadu</option>
                                                        <option>Tripura</option>
                                                        <option>Uttaranchal</option>
                                                        <option>Uttar Pradesh</option>
                                                        <option>West Bengal</option>
                    
                                              </select>
                                    </div>

                                    <div class="form-group">
                                          <label for="Description">Services Description:</label>
                                              <textarea class="form-control" rows="3" id="comment" placeholder="What kind services you provide in any events. Write Here...."name="comment3"></textarea>
                                    </div>

                                    <div class="form-group">
                                         <label for="uploadpic">Upload Your Photography Studio Picture </label>
                                                <input type="file" class="form-control" id="uploadpic3" ><br>
           
                                                      <button type="button" class="btn btn-success btn-lg btn-block" id="register_studio">Submit
                                                      </button>
                                    </div>
                                </form>
                        </div>
                    </div> 
                </div>         
          </div>
    </div>
</div>
</div>
    <br><br>
    <footer class="container-fluid text-center">
  <p>&copy;Copy right www.EventsHall.com 2018-2019</p>
</footer>
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="assets/js/userpage1.js"></script>
    
 </body>
 </html>