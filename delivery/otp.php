<?php include("header.php"); ?>
<?php
    if(isset($_SESSION['msg']))
  {
    $msg=$_SESSION['msg'];
  }
  $_SESSION['msg']="";

    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $sql=mysqli_query($con,"SELECT * from orders where id='$id'")or die('ERROR'.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
    $_SESSION['otp']=$rs[7];

?>
 <div class="row">
			<h1 class="card-title ml10">Modify Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post"  name="form" action="action.php?pid=2">
                    <div class="form-group">
                      <p><?php echo $msg; ?></p>
                      <label for="exampleInputName1">User_Id</label>
                      <input type="text" class="form-control" id="exampleInputName1" readonly value="<?php echo $rs[0]; ?>"  name="cat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">OTP</label>
                      <input type="text" class="form-control" value=""  name="otp" >
                    </div>
                    
                     
                    
                    
                    <button type="submit" class="btn btn-primary mr-2" name="Submit">Verify</button>
                    
                  </form>
                </div>
              </div>
            </div>
<?php include("footer.php"); ?>