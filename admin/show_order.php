<?php include("header.php"); 
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $st=$_GET['status'];
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

                          <th width="5%" style="text-align: center;">Dish</th>
                           <th  style="text-align: center;">Image</th>
                          <th  style="text-align: center;">Price</th>
                            <th   style="text-align: center;">Quantity</th>
                                                  
                            <th   style="text-align: center;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
            
            $sql=mysqli_query($con,"select * from summary where id='$id' ") or die('ERROR-:'.mysqli_error($con));
            while($rs=mysqli_fetch_array($sql))
                  {
                    ?>
                     <form name="form" action="action.php?pid=6" method="post">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <tr>
                            <td><?php echo $rs[1]; ?></td>
                            <td>image</td>

                            <td><?php echo "Rs. ".$rs[3]."/-"; ?></td>
                            <td><?php echo $rs[2]; ?></td>
                            
                            
                            <td>
                              
                              
                              <a href="dish.php?sno=<?php echo $rs[0]; ?>"><label class="badge badge" style="background-color: red;color:white">Cancel</label></a>
                            </td>
                        </tr>
                    <?php } ?>
                        
                       
                      </tbody>
                    </table>
                  </div>

                
                  <?php if($st==0 || $st==1) {?>
                  <select name="status" id="" style="margin: 13px;padding-left: 10px;padding-right:10px ">
                         <option value="">Update Status</option>
                         
                         <option value="Cooking">Cooking</option>
                        
                       </select>
                       <td class="col-sm-1 col-md-1">
                        <a> <button type="submit" name="Update" class="badge badge-primary">
                            <span class="badge badge"></span> Update
                        </button></a></td> 
                      <?php } ?>
                      </form>
        </div>
              </div>
            </div>
           
<?php include("footer.php"); ?>