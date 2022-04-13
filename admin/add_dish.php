<?php include("header.php"); ?>
 <div class="row">
			<h1 class="card-title ml10">Basic form elements</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data" name="form" action="action.php?pid=1">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="cat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Dish Name</label>
                      <input type="text" class="form-control" placeholder="Dish" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Price</label>
                      <input type="text" class="form-control" placeholder="Price" name="price">
                    </div>
                                        <div class="form-group">
                      <label>Image</label><br>
                      <input type="file" name="img">
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Dish Detail</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="det"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="Submit">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
<?php include("footer.php"); ?>