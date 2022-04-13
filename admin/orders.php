<?php include("header.php"); 

    if(isset($_GET['cmd'])==1)
    {
      $id=$_GET['id'];
      $sql=mysqli_query($con,"update orders set status=1 where id='$id'") or die('ERROR : '.mysqli_error($con));
    }
    else if(isset($_GET['cmd'])==2)
    {
      $id=$_GET['id'];
      $sql=mysqli_query($con,"delete from orders  where id='$id'") or die('ERROR : '.mysqli_error($con));
    }

?>

 <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="font-weight: bolder;font-size: 20px">Manage orders</h4>
             
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>

                      <tr>

                        	<th width="5%" style="text-align: center;">ID</th>
                        	<th  style="text-align: center;">Email</th>
                            <th   style="text-align: center;">Address</th>
                            <th   style="text-align: center;">Price</th>
                             <th   style="text-align: center;">Status</th>
                            <th   style="text-align: center;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
            
            $sql=mysqli_query($con,"select * from orders order by status desc ") or die('ERROR-:'.mysqli_error($con));
            while($rs=mysqli_fetch_array($sql))
                  {
                    ?>
                        <tr>
                            <td><?php echo $rs[1]; ?></td>
                            <td><?php echo $rs[0]; ?></td>
                            <td>address</td>
                            <td><?php echo "Rs. ".$rs[2]."/-"; ?></td>
                            <td>
                               <?php 
                               {
                                if($rs[6]==4) 
                                 $st="Delivered";
                                 else if($rs[6]==0)
                                 $st="Pending";
                                 else if($rs[6]==1)
                                 $st="Accepted"; 
                               else if($rs[6]==2)
                                $st="Cooking";
                                else
                                $st="On the way";
                                
                                if($rs[6]==4) { ?>
                                <label class="badge badge-success"><?php echo $st;?></label>
                               <?php } else{
                                ?>
                                <label class="badge badge-warning"><?php echo $st;?></label>
                                <?php  } 
                              } ?>
                              </td>
                            <td>
                              <a href="show_order.php?id=<?php echo $rs[1]; ?>&status=<?php echo $rs[6];?>"><label class="badge badge-primary">Show</label></a>
                              &nbsp;
                              <?php if($rs[6]==0) { ?>
                              <a href="orders.php?id=<?php echo $rs[1];?>&cmd=1"><label class="badge badge-success">Accept</label></a>
                              &nbsp; <?php } ?>
                              <?php if($rs[6]<3) {?>
                              <a href="orders.php?id=<?php echo $rs[6];?>&cmd=2"><label class="badge badge" style="background-color: red;color:white;">Cancel</label></a> <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
            <script src="assets/js/vendor.bundle.base.js"></script>
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/data-table.js"></script>



<?php include("footer.php"); ?>