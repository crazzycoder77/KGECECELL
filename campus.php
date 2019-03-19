<!DOCTYPE html>
<html lang="en">

<head>
    <title>Entrepreneurship Cell-KGEC</title>
    <link rel="icon" type="icon/png" href="dependencies/img/Ecelllogohigh.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap cdns-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"> </script>


    <!--font awasome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/reg.css">
	<link rel="stylesheet" href="js/ALERT/css/alertify.min.css">
	<link rel="stylesheet" href="js/ALERT/css/alertify.rtl.min.css">
    
</head>


<style>
	#success_message{ display: none;}
	.cnt{
		padding-left:10%;
		padding-right: 10%;
		padding-top: 5%;
		
	}
	.well{
		/*background:rgba(255,255,255,0.85);*/
		background: rgba(0,0,0,0.8);

	}
	.control-label,.aa{
		color:white;
	}
	@media(max-width:768px){
		.cnt{
			padding:20px;;
		}
	}
</style>

<body>


<div class="cnt">

	<form action="server.php" method="POST" class="well form-horizontal" id="contact_form">
		<fieldset class="ff">

		<legend class="text-center aa">Be our C.A</legend>


		<div class="form-group">
			<label class="col-md-4 control-label">Name</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input  name="name" placeholder="Enter your Name" class="form-control"  type="text">
				</div>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
				</div>
			</div>
		</div>


		<!-- Text input-->
		
		<div class="form-group">
			<label class="col-md-4 control-label">Phone</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input name="phone" placeholder="Phone number" class="form-control" type="text">
				</div>
			</div>
		</div>

		<!-- Text input-->
		
		<div class="form-group">
			<label class="col-md-4 control-label">College</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<input name="college" placeholder="College" class="form-control" type="text">
				</div>
			</div>
		</div>

		<!-- Text input-->

		<div class="form-group">
			<label class="col-md-4 control-label">Department</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<input name="department" placeholder="Department" class="form-control"  type="text">
				</div>
			</div>
		</div>

		<!-- Select Basic -->


		<!-- Text input-->

		<div class="form-group">
			<label class="col-md-4 control-label">Age</label>  
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<input name="age" placeholder="Age" class="form-control"  type="text">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Why do you want to be our C.A?</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<textarea class="form-control" name="why1" placeholder="Reason"></textarea>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Why should we choose you as our C.A?</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<textarea class="form-control" name="why2" placeholder="Reason"></textarea>
				</div>
			</div>
		</div>

		<!-- Success message -->
		<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

		<!-- Button -->
		<div class="form-group">
		<label class="col-md-4 control-label"></label>
		<div class="col-md-4 text-center">
		<button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
		</div>
		
	</div>
	<div class="col-md-12" style="float:right">
		<a href="esummit.html" class="btn btn-warning" >Back to Home <span class="glyphicon glyphicon-send"></span></a>
		</div>

		</fieldset>
	</form>
</div>


<div class="container-fluid result text-center">
	<h3 class="ans">Regestered Sucessfully</h3>
	<ul class="lss">
		<a href="esummit.html" class="btn btn-warning" >Back to Home <span class="glyphicon glyphicon-send"></span></a>
		<a href="campus.php" class="btn btn-warning" >Register Another<span class="glyphicon glyphicon-send"></span></a>
	</ul>
</div>


<script src="js/reg.js"></script>
 <script src="js/ALERT/alertify.min.js"></script>

 
<?php
	if(isset($_GET['result'])){
		echo"<script>
			$('.cnt').css('display','none');
			$('.result').css('display','block');

		</script>";
	}


?>

</body>
</html>
