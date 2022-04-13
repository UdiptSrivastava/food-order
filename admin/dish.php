<?php include("header.php"); 
   if(isset($_GET['sno']))
    {
        include("../connectdb.php");
        $sno=$_GET['sno'];
        $sql=mysqli_query($con,"delete from dish where sno='$sno'")or die 
    ('ERROR:-'.mysqli_error($con));
    }

?>

          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="font-weight: bolder;font-size: 20px">Food Category</h4>
              <a href="add_dish.php"><p style="font-size: large;">Add dish</p></a>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>

                      <tr>

                        	<th width="5%" style="text-align: center;">S.No</th>
                        	<th  style="text-align: center;">Category</th>
                            <th   style="text-align: center;">Dish</th>
                            <th   style="text-align: center;">Price</th>
                            <th style="text-align: center;">Image</th>
                            <th   style="text-align: center;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php 
            include ("../connectdb.php");
            $sql=mysqli_query($con,"select * from dish") or die('ERROR-:'.mysqli_error($con));
            while($rs=mysqli_fetch_array($sql))
                  {
                    ?>
                        <tr>
                            <td><?php echo $rs[0]; ?></td>
                            <td><?php echo $rs[1]; ?></td>
                            <td><?php echo $rs[2]; ?></td>
                            <td><?php echo "Rs. ".$rs[3]."/-"; ?></td>
                            <td><img src="assets/images/<?php echo $rs[6]; ?>" style="height: 60px;width: 60px"></td>
                            <td>
                              <a href="show_dish.php?sno=<?php echo $rs[0]; ?>"><label class="badge badge-primary">Show</label></a>
                              &nbsp;
                              <a href="modify_dish.php?sno=<?php echo $rs[0]; ?>"><label class="badge badge-success">Edit</label></a>
                              &nbsp;
                              
                              <a href="dish.php?sno=<?php echo $rs[0]; ?>"><label class="badge badge" style="background-color: red;color:white">Delete</label></a>
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