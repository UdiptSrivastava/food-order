<?php
session_start();
	$pid=$_GET['pid'];
	include ("connectdb.php");
	$cd=date("d-m-y");
	if($pid==1) //sign in 
	{
		if(isset($_POST['Signin']))
		{
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$sql=mysqli_query($con,"select * from login where email='$email' and password='$pass'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql)>0)// already registered
			{
				$_SESSION['uid']=$email;
				
				header('location:index.php');
			}
			else //new member
			{
				$_SESSION['msg']="Invalid email/password!!";
				header('location:login.php');
			}
		}
	}

	if($pid==2) //sign up 
	{
		if(isset($_POST['Signup']))
		{
			$pass=$_POST['pass'];
			$cpass=$_POST['cpass'];
			$email=$_POST['email'];
			if($pass==$cpass) 
			{
			$sql1=mysqli_query($con,"select * from login where email='$email'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($sql1)>0)// when already a member
			{
				$_SESSION['msg']="Already registered!!";
				
			} 
			else // sign up 
			{	
			$_SESSION['uid']=$_POST['email'];

			$sql2=mysqli_query($con,"insert into login (name,email,contact,address,city,password,image) values('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[add]','$_POST[city]','$_POST[pass]','$_POST[img]')")or die('Error:- '.mysqli_error($con));
			$_SESSION['msg']="Successully registered!!";
            
			}

			}
			header('location:sign.php');
		}
	}
	if($pid==3)
	{
		unset($_SESSION['uid']) ;
		header('location:index.php');
	}
	if($pid==4)
	{
		if(isset($_POST['Submit']))
		{
			$cd=date("d-m-y");
			$star=$_POST['rating'];
			$dish=$_SESSION['dish'];
			$sql=mysqli_query($con,"select name from login where email='$_SESSION[uid]'")or die('ERROR:- '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);

			$sql=mysqli_query($con,"insert into review(name,review,star,dish,date) values('$rs[0]','$_POST[comment]','$star','$dish','$cd')") or die('ERROR'.mysqli_error($con));
			header('location:menu.php');
		}
	}
	if($pid==5)
	{
		if(isset($_POST['Submit']))
		{
		$dish=$_SESSION['dish'];
		$price=$_SESSION['price'];
		$qty=$_POST['qty'];
		$user=$_SESSION['uid'];
		$sql=mysqli_query($con,"insert into cart(user,dish,qty,price,date) values('$user','$dish','$qty','$price','$cd')")or die('ERROR:-'.mysqli_error($con));
		header("location:cart2.php?user=$user");
	}
	}
	if($pid==6)
	{
		if(isset($_POST['Remove']))
		{
			$dish=$_POST['dish'];
			$sql=mysqli_query($con,"delete from cart where dish='$dish' and user='$_SESSION[uid]' ")or die("ERROR:-".mysqli_error($con));
			$user=$_SESSION['uid'];
			header("location:cart2.php?user=$user");
		}
		if(isset($_POST['Update']))
		{
			$n=$_SESSION['n'];
			$n--;
			$user=$_SESSION['uid'];
			while($n>0)
			{
				$dish=$_POST["dish$n"];
				$qty=$_POST["qty$n"];

			$sql=mysqli_query($con,"update cart set qty='$qty' where dish='$dish' and user='$user' ") or die('ERROR:-'.mysqli_error($con));
			$n--;
			}
			header("location:cart2.php?user=$user");
			
		}
		if(isset($_POST['checkout']))
		{
			$n=$_SESSION['n'];
			$n--;
			$user=$_SESSION['uid'];
			$sql=mysqli_query($con,"select id from orders order by id desc") or die('ERROR'.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$id=$rs[0]+1;
			$total=0;
			while($n>0)
			{
				$dish=$_POST["dish$n"];
				$qty=$_POST["qty$n"];
				$price=$_POST["price$n"];
				$total=$total+($qty*$price);
				$sql=mysqli_query($con,"update dish  set sold=sold+'$qty' where dish='$dish'") or die('ERROR:-'.mysqli_error($con));

				$sql=mysqli_query($con,"insert into summary values('$user','$dish','$qty','$price','$cd','$id')")or die('ERROR:-'.mysqli_error($con));

				$sql=mysqli_query($con,"delete from cart where user='$user'")or die('ERROR:-'.mysqli_error($con));
			$n--;
			
			}
			$sql=mysqli_query($con,"select address from login where email='$user'")or die('ERROR '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$otp=rand(1000,9999);
			$sql=mysqli_query($con,"insert into orders values('$user','$id','$total','$rs[0]','pending','$cd','0','$otp')") or die('ERROR '.mysqli_error($con));
			header("location:cart2.php?user=$user");
				
		}
	}
?>