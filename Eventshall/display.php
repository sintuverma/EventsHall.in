
<?php 

     $id = $_GET['id'];
     require 'dbconnect.php';
     $db = new DbConnect();

     $query = "SELECT * FROM guest_house WHERE id =:id";
     $statement = $db->connect()->prepare($query);
     $statement->bindParam(':id',$id);
     $statement->execute();
     $result = $statement->fetch();
     $number_of_rows = $statement->rowCount();

     $stmt =$db->connect()->prepare('SELECT * FROM guestHouse_image  where email = :email ORDER BY image_id DESC limit 10');
     $stmt->bindParam(':email',$result['email']);
     $stmt->execute();
     $images = $stmt->fetchAll();
     $number_of_image_rows = $stmt->rowCount();

     $stmt =$db->connect()->prepare('SELECT name,mobile FROM users  where email = :email');
     $stmt->bindParam(':email',$result['email']);
     $stmt->execute();
     $users = $stmt->fetch();

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

  <!-- heading section using navbar -->

  <div class="navbar navbar-inverse navbar-fixed navbar-custom">
      <div class="container">
          <div class="navbar-header" <a href="#" class="pull-left">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
              </button>
              <a class="pull-left" href="#"><img  src="assets/images/logo.png" alt="Brand" width="100px" height="50px"></a>
              <a class="navbar-brand" href="#">Events Hall</a>
          </div>

          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                       <li><a href="searchpage.html"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                       
                       <li class="active"><a href="searchpage.html"><span class="glyphicon glyphicon-home"></span> Details Page</a></li>
                           <li><a href="login.html"><span class="glyphicon glyphicon-user"></span>SignIn</a></li>
                                <li><a href="signUp.html"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
                                     <li><a href="aboutUs.html"><span class="glyphicon glyphicon-book"></span>AboutUs</a></li>
                                         <li><a href="contactUs.html"><span class="glyphicon glyphicon-earphone"></span> ContactUs</a></li>
                   
              </ul>
              
          </div>
      </div>
  </div><br>

<h2 class="blink" id="top_heading"><?php echo $result['name'] ?></h2>  
</div><br><br>

<div class="container" >
  <div class="row">
       <?php 
            $count =0;
            foreach ($images  as $row) {
              $count +=1;
              
          ?>
     
    <div class="mySlides">
        <div class="numbertext"><?php echo $count ?> / <?php echo $number_of_image_rows;?></div>
        <img src="upload/<?php  echo $row['image_name'] ?>" style="width:100%">
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
            foreach ($images  as $row) {
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
                        <th>Name:</th><td class="table_data"><?php echo $result['name'] ?></td>
                  </tr>
                  <tr>
                       <th>Owner or Manager Name:</th><td class="table_data"><?php echo $users['name'] ?></td>
                  </tr>
                  <tr>
                       <th>Address:</th>
                       <td class="table_data"><?php echo $result['address'] ?></td>
                 </tr>
                  <tr>
                       <th>Pincode:</th><td><?php echo $result['pincode'] ?></td>
                  </tr>
                  <tr>
                       <th>City Or District:</th><td class="table_data"><?php echo $result['city'] ?></td>
                  </tr>
                  <tr>
                       <th>State :</th><td class="table_data"><?php echo $result['state'] ?></td>
                  </tr>
                  <tr>
                        <th>Contact Number:</th><td><?php echo $users['mobile'] ?></td>
                  </tr>
                  <tr>
                        <th>Website:</th><td><a id="url_link" href="<?php echo $result['url'] ?>"><?php echo $result['url'] ?></a></td>
                  </tr>
                  <tr>
                        <th>Email Id:</th><td><?php echo $result['email'] ?></td>
                   </tr>
                   <tr>
                         <th>Faciality & Services:</th><td><?php echo $result['info'] ?></td>
                  </tr>

              </table>

            </div>
          </div>
  
    </div>


    <br>
    <br>



    <footer class="container-fluid text-center">
        <p>&copy;All Copy right www.EventsHall.com 2018-2019</p>
        <div class="col-lg-12">
  </footer>
   <script src="assets/js/userfinalpage.js" type="text/javascript"></script>