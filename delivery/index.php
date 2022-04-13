<?php include("header.php"); 
 $flag=0;
 $sn=$_SESSION['sno'];
  if(isset($_GET['id'])) // order id
  {
    if($_GET['cmd']==1)
    {
    $sql=mysqli_query($con,"update deliveryboy set status=0 where sno='$sn'")or die('ERROR: '.mysqli_error($con));  
    $flag=1;
   
    }
    else if($_GET['cmd']==2)
    {
       $sql=mysqli_query($con,"update orders set status='3' where id='$_GET[id]'")or die('ERROR: '.mysqli_error($con));
    }
    else
    {
      $sql=mysqli_query($con,"update orders set status='4' where id='$_GET[id]'")or die('ERROR: '.mysqli_error($con));
      $sql=mysqli_query($con,"update deliveryboy set status=1 where sno='$sn'")or die('ERROR: '.mysqli_error($con));  
    }
    
  }


?>
<style>
  th,td{
    text-align: center;
  }
</style>
 <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="font-weight: bolder;font-size: 20px">Take order</h4>
             <form name="form" method="post" action="action.php?pid=2">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>

                      <tr>

                        	<th width="5%" style="text-align: center;">ID</th>
                          <th width="5%" style="text-align: center;">Name</th>
                        	<th  style="text-align: center;">Email</th>
                          
                            <th   style="text-align: center;">Address</th>
                            <th   style="text-align: center;">Price</th>
                             <th   style="text-align: center;">Payment status</th>
                             <th   style="text-align: center;">Order status</th>
                            <th   style="text-align: center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
            include ("../connectdb.php");
            $sql=mysqli_query($con,"select A.*,B.contact,B.name from orders A , login B where A.user=B.email and status between 1 and 3 order by sno desc") or die('ERROR-:'.mysqli_error($con));
            while($rs=mysqli_fetch_array($sql))
                  {
                    ?>
                        <tr>
                            <td><?php echo $rs[1]; ?></td>
                            <td><?php echo $rs[8]; ?></td>
                            <td><?php echo $rs[0]; ?></td>
                            
                            <td>address</td>
                            <td><?php echo "Rs. ".$rs[2]."/-"; ?></td>
                            <td><?php echo $rs[4];?></td>
                            <td>
                              <?php 
                               {
              
                                 if($rs[6]==1)
                                 $st="Pending"; 
                                  else if($rs[6]==2 && $flag==0)
                                  $st="Pending";
                                 else if($rs[6]==2 && $flag==1)
                                $st="Assigned";
                                else
                                $st="On the way";  
                             } ?>

                             <label class="badge badge-warning"><?php echo $st;?></label>


                            </td>
                            <td>
                             <?php if($rs[6]<3 && $flag==0){  //if status is 0   ?>
                               <a href="index.php?id=<?php echo $rs[1];?>&cmd=1"> <button type="button" name="Pending" class="badge badge-danger">
                            
                            <span class="badge badge"></span> Accept
                        </button></a>
                               <?php 
                             } else if($rs[6]<3 && $flag==1) { ?>
                              <a href="index.php?id=<?php echo $rs[1];?>&cmd=2"> <button type="button" name="Update" class="badge badge-danger">
                            
                            <span class="badge badge"></span> Update Status
                        </button></a>

                              <?php } else {?>
                                
                                <a href="otp.php?id=<?php echo $rs[1];?>"> <button type="button" name="Update" class="badge badge-success">
                            
                            <span class="badge badge"></span> Set Delivered
                        </button></a>
                               
                              <?php } ?>
                              
                            </td>
                        </tr>
                    <?php } ?>
                        
                        
                      </tbody>
                    </table>
                  </div> 
				</div>
              </div>
            </form>
            </div>




<?php include("footer.php"); ?>