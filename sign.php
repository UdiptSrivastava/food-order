<?php session_start(); ?>
<?php 
	$msg="";
    if(isset($_SESSION['msg']))
    {
        $msg=$_SESSION['msg'];
    }
    
    $_SESSION['msg']="";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<div class="container" style="background-image: linear-gradient(pink,violet">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Register
			</h3>
			<div style="text-align: center;color: red"><?php echo $msg; ?></div>
			<form class="wrap-form-reservation size22 m-l-r-auto" name="form" action="action.php?pid=2" method="post">
				<div class="row">
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Name
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Email -->
						<span class="txt9">
							Email
						</span>

						<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Phone -->
						<span class="txt9">
							Phone
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone">
						</div>
					</div>

					<div class="col-md-3">
						<!-- Phone -->
						<span class="txt9">
							Password
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="pass" placeholder="Password">
						</div>
					</div>

					<div class="col-md-3">
						<!-- Phone -->
						<span class="txt9">
							Repeat Password
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="cpass" placeholder="Repeat Password">
						</div>
					</div>

					<div class="col-md-3">
						<!-- Phone -->
						<span class="txt9">
							City
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<select class="bo-rad-10 sizefull txt10 p-l-20" name="city">
							<option>Lucknow</option>
							<option>Mumbai</option>
							<option>Delhi</option>
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<!-- Phone -->
						<span class="txt9">
							image
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="file" name="img" placeholder="upload image">
						</div>
					</div>

					<div class="col-12">
						<!-- Message -->
						<span class="txt9">
							Message
						</span>
						<textarea class="bo-rad-10 size35 bo2 txt10 p-l-5 p-t-10 m-b-10 m-t-1" name="add" placeholder="Message"></textarea>
					</div>


				</div>
				<div style="text-align: center">Already a member :</div>
				<a href="login.php"><div style="text-align: center;font-weight: bold">Sign in</div></a>

				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4" name="Signup">
						Register
					</button>
				</div>
			</form>
		</div>

