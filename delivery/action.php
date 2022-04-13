<?php
session_start();

	$pid=$_GET['pid'];
	include ("../connectdb.php");

	if($pid==1)
	{
		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$num=$_POST['num'];
			
			$sql=mysqli_query($con,"select * from deliveryboy where name='$name' and mobile='$num'")or die('Error:- '.mysqli_error($con));

			if(mysqli_num_rows($sql)>0)// when  registered
			{
				$rs=mysqli_fetch_array($sql);
				$_SESSION['user']=$name;
				$_SESSION['sno']=$rs[0];
				header('location:index.php');
			}
			else //new member
			{
				$_SESSION['msg']="Invalid email/password!!";
				header('location:login.php');
			}
		}
	}

	if($pid==2)
	{
		if(isset($_POST['Submit']))
		{
			$id=$_SESSION['id'];
			$otp=$_SESSION['otp'];
			$o=$_POST['otp'];
			if($o==$otp)
			{
				$sql=mysqli_query($con,"update orders set status='4' where id='$id'")or die('ERROR: '.mysqli_error($con));
      			$sql=mysqli_query($con,"update deliveryboy set status=1 where sno='$sn'")or die('ERROR: '.mysqli_error($con));
				header('location:index.php');
			}
			else
			{
				$_SESSION['msg']="Invalid otp";
				header("location:otp.php?id=$id");
			}
			
		}
	}