<?php include("header.php"); ?>
 <div class="row">
			<h1 class="card-title ml10">Basic form elements</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data" name="form" action="action.php?pid=5">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Mobile No.</label>
                      <input type="text" class="form-control" placeholder="Mobile No." name="mob">
                    </div>
                    
                      
                    

                    <button type="submit" class="btn btn-primary mr-2" name="Submit">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
<?php include("footer.php"); ?>