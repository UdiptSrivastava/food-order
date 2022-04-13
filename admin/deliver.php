<?php include("header.php"); 

	 include("../connectdb.php");
        $sql=mysqli_query($con,"select * from deliveryboy  where status = 1 order by sno desc")or die('ERROR:='.mysqli_error($con)); 

?>


<div class="card">
            <div class="card-body">
              <h1 class="grid_title">Delivery Boy Master</h1>
			  <a href="manage_delivery_boy.php" class="add_link">Add Delivery</a>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No </th>
                            <th width="20%">Name</th>
                            <th width="25%">Mobile</th>
							<th width="10%">Added On</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php while($rs=mysqli_fetch_array($sql))
                       {?>
						<tr>
                            <td><?php echo $rs[0];?></td>
                            <td><?php echo $rs[1];?></td>
							<td><?php echo $rs[2];?></td>
							<td>
							<?php echo $rs[3];?>
							</td>
							<td align="center">
								<a href="manage_delivery_boy.php?id=<?php echo $rs[0];?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								
								<a href=""><label class="badge badge-danger hand_cursor">Active</label></a>
								
								<a href=""><label class="badge badge-info hand_cursor">Deactive</label></a>
								
								
								
								
							</td>
                           
                        </tr>
                        <?php } ?>
						
						
						
                      </tbody>
                    </table>
                  </div>
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
        
<?php include('footer.php');?>