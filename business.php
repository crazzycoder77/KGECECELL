<?php
	session_start();
	require_once('conn.php');
	if(isset($_FILES["file"])&&isset($_POST["teamname"])&&isset($_POST["teamsize"])){
    $stmt = $conn->prepare("SELECT MAX(TeamID) FROM team"); 
    $stmt->execute();
	$sql = "INSERT INTO team(OrderID , TeamName, TeamSize, PaymentStatus)
    VALUES ( '0', '".$_POST['teamname']."', ".$_POST['teamsize'].",0)";
    // use exec() because no results are returned
    $conn->exec($sql);
	$_SESSION['id'] = $conn->lastInsertId();
	$_SESSION["ORDERID"]="ORD".date("Y").$_SESSION["id"];
	$target_dir = "files/";
        $target_file = $target_dir . "BPL" . date("Y") . $_SESSION['id'] . ".pdf";
        $uploadOk = 1;
		$message= "";
        if(isset($_POST["teamname"])) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                
				switch($_POST['teamsize'])
				{
					case 4:	$sql = "INSERT INTO participant (ParticipantName, ParticipantEmail, ParticipantContact, TeamID)
									VALUES ('".$_POST['name1']."', '".$_POST['email1']."', '".$_POST['phone1']."',".$_SESSION['id'].")";			
							$conn->exec($sql);
					case 3: $sql = "INSERT INTO participant (ParticipantName, ParticipantEmail, ParticipantContact, TeamID)
									VALUES ('".$_POST['name2']."', '".$_POST['email2']."', '".$_POST['phone2']."',".$_SESSION['id'].")";			
							$conn->exec($sql);
					case 2: $sql = "INSERT INTO participant (ParticipantName, ParticipantEmail, ParticipantContact, TeamID)
									VALUES ('".$_POST['name3']."', '".$_POST['email3']."', '".$_POST['phone3']."',".$_SESSION['id'].")";			
							$conn->exec($sql);
					default: $sql = "INSERT INTO participant (ParticipantName, ParticipantEmail, ParticipantContact, TeamID)
									VALUES ('".$_POST['name4']."', '".$_POST['email4']."', '".$_POST['phone4']."',".$_SESSION['id'].")";			
							$conn->exec($sql);
				}
				$_SESSION["AUTH"]=true;
				$_SESSION["TeamName"]=$_POST['teamname'];
				$_SESSION["TeamSize"]=$_POST['teamsize'];
				$_SESSION["Phone"] = $_POST["phone4"];
				$_SESSION["Email"] = $_POST["email4"];
				unset($_POST);
				header("Location: redirect.php");
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
	}}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Entrepreneurship Cell-KGEC</title>
    <link rel="icon" type="icon/png" href="dependencies/img/Ecelllogohigh.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap cdns-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
 


    <!--font awasome cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/business.css">
	<link rel="stylesheet" href="js/ALERT/css/alertify.min.css">
	<link rel="stylesheet" href="js/ALERT/css/alertify.rtl.min.css">
    <script src="js/business.js"></script>
</head>
<body>

 

        <div class="holder">
            <div class="headerr">
            <img class="main-icon" src="dependencies/img/Ecelllogohigh.png">
            <div class="steps">
                <span></span>
                <span></span>
            </div>
            </div>
			
			<form method="POST" action="" id="BusinessForm" class="form-horizontal" enctype="multipart/form-data">

                <div class="div1" id="div1">
                <h2 class="hd">Register Your Team </h2>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Team Name</label>
                        <div class="col-md-5">
                            <input type="text" class="teamname form-control" name="teamname" />
                            <p class="e e1" id="e1">Please Enter your team name</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Team Size</label>
                        <div class="col-md-5">
							<select class="teamsize form-control" id="teamsize" name="teamsize">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
                            <p class="e e2" id="e2">Please Enter your team Size</p>
                            <p class="e e3" id="e3">Please Enter a valid team Size</p>
							
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-8">
                            <button class="btnn" id="b1" type="button">Next</button>
                        </div>
                    </div>
                </div>

                <div class="div2" id="div2">
                <h2 class="hd" id="hd2"></h2>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="name1 form-control" name="name1" />
                            <p class="e e21" id="e21">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="phone1 form-control" name="phone1" />
                            <p class="e e22" id="e22">Enter a valid phone number</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="email1 form-control" name="email1" />
                            <p class="e e23" id="e23">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-7">
							<button class="btnn" name="prev" id="b11" type="button">Prev</button>
                            <button class="btnn" id="b2" type="button">Next</button>
                        </div>
                    </div>
                </div>

                <div class="div3" id="div3">
                <h2 class="hd" id="hd3"></h2>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="name2 form-control" name="name2" />
                            <p class="e e31" id="e31">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="phone2 form-control" name="phone2" />
                            <p class="e e32" id="e32">Enter a valid phone number</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="email2 form-control" name="email2" />
                            <p class="e e33" id="e33">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-7">
							<button class="btnn" name="prev" id="b10" type="button">Prev</button>
                            <button class="btnn" id="b3" type="button">Next</button>
                        </div>
                    </div>
                </div>



                <div class="div4" id="div4">
                <h2 class="hd" id="hd4"></h2>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="name3 form-control" name="name3" />
                            <p class="e e41" id="e41">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="phone3 form-control" name="phone3" />
                            <p class="e e42" id="e42">Enter a valid phone number</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="email3 form-control" name="email3" />
                            <p class="e e43" id="e43">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-7">
							<button class="btnn" name="prev" id="b9" type="button">Prev</button>
                            <button class="btnn" id="b4" type="button">Next</button>
                        </div>
                    </div>
                </div>
           



                <div class="div5" id="div5">
                <h2 class="hd" id="hd5"></h2>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="name4 form-control" name="name4" />
                            <p class="e e51" id="e51">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="phone4 form-control" name="phone4" />
                            <p class="e e52" id="e52">Enter a valid phone number</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="email4 form-control" name="email4" />
                            <p class="e e53" id="e53">This field can't be blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-7">
							<button class="btnn" name="prev" id="b8" type="button">Prev</button>
                            <button class="btnn" id="b5" type="button">Next</button>
                        </div>
                    </div>
                </div>

			
                <div class="div6" id="div6">
                <h2 class="hd" id="hd6">Upload Your Idea as P.D.F</h2>
                    <div class="form-group text-center">
                        <div class="col-md-12">
                            <label class="custom-file">
                                <input name="file" type="file" id="file" class="custom-file-input" required>
                                <span class="custom-file-control"></span>
                            </label>   
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-7">
							<button class="btnn" name="prev" id="b7" type="button">Prev</button>
                            <button class="btnn" name="register" id="b6" type="button">Register</button>
                        </div>
                    </div>
                </div>

			</form>
			</div>



</body>

<script src="js/ALERT/alertify.min.js"></script>
</html>

 