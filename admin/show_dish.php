<?php include("header.php"); ?>
<?php
include("../connectdb.php");
    $sno=$_GET['sno'];
    $_SESSION['sno']=$sno;
    $sql=mysqli_query($con,"SELECT * from dish where sno='$sno'")or die('ERROR'.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);

?>
 <div class="row">
			<h1 class="card-title ml10">Modify Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data" name="form" action="action.php?pid=3">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" id="exampleInputName1" readonly value="<?php echo $rs[1]; ?>"  name="cat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Dish Name</label>
                      <input type="text" class="form-control"value="<?php echo $rs[2]; ?>"  name="name" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Price</label>
                      <input type="text" class="form-control" value="<?php echo $rs[3]; ?>"  name="price" readonly>
                    </div>
                                        <div class="form-group">
                      <label for="exampleInputEmail3">Type</label>
                      <input type="text" class="form-control" value="<?php echo $rs[4]; ?>"  name="type" readonly>
                    </div>
                                        <div class="form-group">
                      <label>Image</label><br>
                      <div><img src="assets/images/<?php echo $rs[6]; ?>" style="width: 80px;height: 80px"></div>
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Dish Detail</label>
                      <textarea class="form-control" readonly rows="4" name="det"><?php echo $rs[5]; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="Submit">Update</button>
                    
                  </form>
                </div>
              </div>
            </div>
<?php include("footer.php"); ?>