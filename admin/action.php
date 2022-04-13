<?php
session_start();
	$pid=$_GET['pid'];
	include ("../connectdb.php");
	$cd=date("d-m-y");
	if($pid==1)
	{
		if(isset($_POST['Submit']))
		{
			$file_name=$_FILES["img"]["name"];
			$img="";
			if($file_name!="")
			{
				
				

			$file_location=$_FILES["img"]["tmp_name"];
			  $ext=end(explode('.', $file_name));
			  $num=rand(100000,999999);
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$img=$num."."."$ext";
					$upload_path="assets/images/".$img;
					move_uploaded_file($file_location,$upload_path);
			}
		}

			$sql=mysqli_query($con,"insert into dish(category,dish,price,type,detail,image) values('$_POST[cat]','$_POST[name]','$_POST[price]','$_POST[type]','$_POST[det]','$img')") or die('ERROR:-'.mysqli_error($con));
			header('location:dish.php');

		}
	}
	if($pid==3)
	{
		$sno=$_SESSION['sno'];
		$file_name=$_FILES["img"]["name"];
		$img="";
		if($file_name!="")
			{
			  $file_location=$_FILES["img"]["tmp_name"];
			  $ext=end(explode('.', $file_name));
			  $num=rand(100000,999999);
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$img=$num."."."$ext";
					$upload_path="assets/images/".$img;
					move_uploaded_file($file_location,$upload_path);
			}
			$sql=mysqli_query($con,"UPDATE dish set image='$img' where sno='$sno'") or die('ERROR:-'.mysqli_error());
			}
		
		$sql=mysqli_query($con,"UPDATE dish set category='$_POST[cat]',dish='$_POST[name]',price='$_POST[price]',type='$_POST[type]',detail='$_POST[det]' where sno='$sno' ") or die('ERROR'.mysqli_error($con));
		header('location:dish.php');
	}
	if($pid==2)
	{
		if(isset($_POST['Signup']))
		{
			$pass=$_POST['pass'];
			$cpass=$_POST['cpass'];
			$email=$_POST['email'];
			$name=$_POST['name'];
			if($pass==$cpass) 
			{
			$sql1=mysqli_query($con,"select * from admin where email='$email'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql1)>0)// when already a member
			{
				$_SESSION['msg']="Already registered!!";
				
			} 
			else // sign up 
			{	
			$_SESSION['user']=$email;	
			$sql2=mysqli_query($con,"insert into admin (name,email,password) values('$_POST[name]','$_POST[email]','$_POST[pass]')")or die('Error:- '.mysqli_error($con));
			$_SESSION['msg']="Successully registered!!";
            
			}
			header('location:register.php');
			}
		}
		else
		{
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			
			$sql=mysqli_query($con,"select * from admin where email='$email' and password='$pass'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql)>0)// when  registered
			{
				$_SESSION['user']=$email;

				header('location:dish.php');
			}
			else //new member
			{
				$_SESSION['msg']="Invalid email/password!!";
				header('location:login.php');
			}
		}
	}
	if($pid==4)
	{
		unset($_SESSION['user']);
		header('location:login.php');
	}
	if($pid==5)
	{
		if(isset($_POST['Submit']))
		{
		$name=$_POST['name'];
		$mob=$_POST['mob'];

		$sql=mysqli_query($con,"insert into deliveryboy(name,mobile,joining) values ('$name','$mob','$cd')")or die('ERROR:='.mysqli_error($con));
		header('location:deliver.php');
	}
	}
	if($pid==6)
	{
		if(isset($_POST['Update']))
		{
			if($_POST['status']=="Cooking")
			{
				$st=2;
			}
			$id=$_POST['id'];
			$sql=mysqli_query($con,"update orders set status='$st' where id='$id'") or die("Error :".mysqli_error($con));
			header('location:orders.php');
		}
	}
?>	