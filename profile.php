<?php include("header.php");
    include("connectdb.php");
    if(isset($_GET['id']))
    {
        $user=$_GET['id'];
        $_SESSION['user']=$user;
        $sql=mysqli_query($con,"SELECT * from login where email='$user'")or die('ERROR:- '.mysqli_error($con));
		$rs=mysqli_fetch_array($sql);
    } 

    


?>
<section class="section-booking bg1-pattern p-t-100 p-b-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Personal Details
						</span>
                  <br><br><br>
						
					</div>

					<form class="wrap-form-booking">
						<div class="row">
							<div class="col-md-6">
								
								<span class="txt9">
									Name
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" value="<?php echo $rs[1]; ?>">
								</div>
								
                               
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" value="<?php echo $rs[2]; ?>">
								</div>
								<span class="txt9">
									Address
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<textarea style="width: 214%;height: 170%;border:2px solid #D3D3D3;" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone"><?php echo $rs[4]; ?></textarea>
								</div>
								
							</div>

							<div class="col-md-6">
								<!-- Name -->
								<span class="txt9">
									City
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="city" value="<?php echo $rs[5]; ?>">
								</div>

								<!-- Phone -->
								<span class="txt9">
									Phone
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" value="<?php echo $rs[3]; ?>">
								</div>

								<!-- Email -->
							
							</div>
						</div>
                        <br>
						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Book Table
							</button>
						</div>
					</form>
				</div>

				<div class="col-lg-6 p-b-30 p-t-18">
					<div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/booking-01.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include("footer.php")?>