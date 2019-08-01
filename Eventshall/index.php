<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  body{background-color: lightgray}
  	
  </style>
	<script type="text/javascript" >
		$(document).ready(function(){
			

			$("#UserName").keyup(function(){
				var UserName = $("#UserName").val();
				
				 $.ajax({
					type:"POST",
				url:"searchpage.php",
					data:{UserName:UserName},
				 	success:function(res){
				 		
						$("#UserList").html(res);

					}
				 });
			});
		});
	</script>
</head>
<body>
	<div id="corp">
		<h2 class="text center">Friend List</h2>
		<input type="text" name="UserName" id="UserName" style="width:100%;height: 40px;margin-bottom: 5px;">
		<div id="UserList"style="background-color: white">
			
		</div>
		
	</div>

</body>
</html>