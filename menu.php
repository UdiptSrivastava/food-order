<?php include("header.php"); 
include("connectdb.php");
	$flag=0;
	$flag1=0;
    if(isset($_GET['cat']))
    {
    	$cat=$_GET['cat'];
    	$flag=1;
    }
    if(isset($_GET['type']))
    {
    	$type=$_GET['type'];
    	$flag1=1;
    }

    
?>
<style type="text/css">
	.star
	{
		height: 25px;
		width:55px;
		border-radius: 5px;
		color: white;
		background-color: green;
		text-align: center;
		font-weight: normal;
		padding-bottom:20px;

	}

</style>

	<!-- Main menu -->

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
						<div class="row p-t-108 p-b-70">
				<div class="col-md-10 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					
					<?php
					if($flag==0 && $flag1==0)
					{	
					$sql=mysqli_query($con,"SELECT * from dish ")or die('ERROR'.mysqli_error($con));
					}
					elseif($flag==0 && $flag1==1)
					{
						$sql=mysqli_query($con,"SELECT * from dish
						where type='$type'")or die('ERROR'.mysqli_error($con));
					}
					elseif($flag==1 && $flag1==0)
					{
						$sql=mysqli_query($con,"SELECT * from dish
						where category='$cat'")or die('ERROR'.mysqli_error($con));
					}
					elseif($flag==1 && $flag1==1)
					{
						$sql=mysqli_query($con,"SELECT * from dish
						where category='$cat' and type='$type'")or die('ERROR'.mysqli_error($con));
					}

    				$n=mysqli_num_rows($sql);
					$count=0;
					 while($count<$n/2 && $rs=mysqli_fetch_array($sql))
					{ ?>

					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="review.php?dish=<?php echo $rs[2];?>&price=<?php echo $rs[3];?>"><img src="admin/assets/images/<?php echo $rs[6]; ?>" style="height: 100px;width: 150px"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<p><a href="#" class="txt21 m-b-3">
								<?php echo $rs[2]; ?>&nbsp;&nbsp;&nbsp;
							</a></p>
							<p><a href="cart2.php"><button type="button" class="btn btn-danger">
                            Add to cart <span class="glyphicon glyphicon-play"></span>
                        	</button></a></p>
							<p><span class="txt23">
								
								<?php if($rs[4]=='veg'){?>
								<img src="images/veg.png" style="height: 20px;width: 20px">
								<?php } else{?>
								<img src="images/non-veg.png" style="height: 20px;width: 20px"><?php } ?>

							</span></p>

							<p><span class="txt22 m-t-20">
								<?php echo "&#8377 ".$rs[3]; ?>
							</span></p>
							<?php 
							$sql2=mysqli_query($con,"select avg(star),count(*) from review where dish='$rs[2]'")or die('ERROR:-'.mysqli_error($con));
								$r=mysqli_fetch_array($sql2);
								if($r[0]>0){
								?>
                            
							<p><span class="star" style="display: inline-block;"><?php echo $r[0];?>&#9734</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span style="font-weight: bold">(<?php echo $r[1];?> reviews)</span></p>
							 <?php } ?>
								
						</div>
						<hr>
					</div>
					<hr>
				<?php $count++; } ?>

					<!-- Block3 -->


					<!-- Block3 -->
					
				</div>
				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<?php
					
					 while($count<$n && $rs=mysqli_fetch_array($sql))
					{ ?>
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="review.php?dish=<?php echo $rs[2];?>&price=<?php echo $rs[3];?>"><img src="admin/assets/images/<?php echo $rs[6]; ?>" style="height: 100px;width: 150px"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<p><a href="#" class="txt21 m-b-3">
								<?php echo $rs[2]; ?>
							</a></p>
							<p><a href="cart2.php?dish=<?php echo $rs[2];?>"><button type="button" class="btn btn-danger">
                            Add to cart <span class="glyphicon glyphicon-play"></span>
                        </button></a></p>

							<p><span class="txt23">
								<?php if($rs[4]=='veg'){?>
								<img src="images/veg.png" style="height: 20px;width: 20px">
								<?php } else{?>
								<img src="images/non-veg.png" style="height: 20px;width: 20px"><?php } ?>
							</span></p>

							<p><span class="txt22 m-t-20">
								<?php echo "&#8377 ".$rs[3]; ?>
								
							</span></p>
							
							<?php 
							$sql2=mysqli_query($con,"select avg(star),count(*) from review where dish='$rs[2]'")or die('ERROR:-'.mysqli_error($con));
								$r=mysqli_fetch_array($sql2);
								if($r[0]>0){
								?>

							<p><span class="star" style="display: inline-block;"><?php echo $r[0];?>&#9734</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span style="font-weight: bold">(<?php echo $r[1];?> reviews)</span></p>
							 <?php } else { ?>
							 <p>&nbsp;</p>
							<?php } ?>
							</div>
					</div>
					<hr>
				<?php $count++; } ?>
					<!-- Block3 -->
					<!-- Block3 -->

				</div>
			</div>
		<!-- Block4 -->
						
						
					</div>
				</div>

						<!-- Block4 -->
						

				<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Search -->
						<div class="search-sidebar2 size12 bo2 pos-relative">
							<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
							<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
						</div>

						<!-- Categories -->
						<div class="categories">
							
							
							<h4 class="txt33 bo5-b p-b-35 p-t-58">
								Categories
								<br>
								<p style="font-weight: bold;">

								<a href="<?php if($flag==1) { ?>menu.php?type=veg&cat=<?php echo $cat; }
								else {?>menu.php?type=veg<?php }?>">Veg</a> &nbsp; <span><a href="<?php if($flag==1) { ?>menu.php?type=non-veg&cat=<?php echo $cat; }
								else {?>menu.php?type=non-veg<?php }?>">Non Veg</span></a></p>
							</h4>
							
							<ul>
								<?php
							$sql=mysqli_query($con,"SELECT distinct category from dish ")or die('ERROR'.mysqli_error($con)); 
							while($rs=mysqli_fetch_array($sql))
							{ ?>
							
								<li class="bo5-b p-t-8 p-b-8">
									<a href="<?php if($flag1==1){?>menu.php?cat=<?php echo $rs[0];?>&type=<?php echo $type;} 
									else{?>menu.php?cat=<?php echo $rs[0]; }?>" class="txt27">
										<?php echo $rs[0]; ?>
									</a>
								</li>
							<?php } ?>
								<li class="bo5-b p-t-8 p-b-8">
									<a href="menu.php" class="txt27">
										Show all
									</a>
								</li>
							</ul>
						</div>
						<div class="popular">
							<h4 class="txt33 p-b-35 p-t-58">
								Most popular
							</h4>
		<?php
		 $sql=mysqli_query($con,"Select dish,price,image,sold from dish order by sold desc limit 3 ")or die('ERROR'.mysqli_error($con));
		
		?>

							<ul>
								<?php while($rs=mysqli_fetch_array($sql)) {?>
								<li class="flex-w m-b-25">
									<div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
										<a href="review.php?dish=<?php echo $rs[0];?>&price=<?php echo $rs[1];?>">
											<img src="admin/assets/images/<?php echo $rs[2];?>" alt="IMG-BLOG">
										</a>
									</div>

									<div class="size28">
										<a href="#" class="dis-block txt28 m-b-8">
											<?php echo $rs[0];?>
										</a>

										<span class="txt14">
											Rs. <?php echo $rs[1];?>
										</span>
									</div>
								</li>

								
<?php } ?>
								
							</ul>
						</div>
					</div>
				</div>		
					<!-- Block1 -->
					</div>
					</div>
						


						<!-- Block1 -->
						
		

	


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
		<form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
			<span class="txt5 m-10">
				Specials Sign up
			</span>

			<div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
				<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
				<i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
			</div>

			<!-- Button3 -->
			<button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
				Sign-up
			</button>
		</form>
	</div>


	<!-- Footer -->
	<footer class="bg1">
		<div class="container p-t-40 p-b-70">
			<div class="row">
				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Contact Us
					</h4>

					<ul class="m-b-70">
						<li class="txt14 m-b-14">
							<i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
							8th floor, 379 Hudson St, New York, NY 10018
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							(+1) 96 716 6879
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							contact@site.com
						</li>
					</ul>

					<!-- - -->
					<h4 class="txt13 m-b-32">
						Opening Times
					</h4>

					<ul>
						<li class="txt14">
							09:30 AM – 11:00 PM
						</li>

						<li class="txt14">
							Every Day
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Latest twitter
					</h4>

					<div class="m-b-25">
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays the featured image in the slider.
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>

					<div>
						<span class="fs-13 color2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</span>
						<a href="#" class="txt15">
							@colorlib
						</a>

						<p class="txt14 m-b-18">
							Activello is a good option. It has a slider built into that displays
							<a href="#" class="txt15">
								https://buff.ly/2zaSfAQ
							</a>
						</p>

						<span class="txt16">
							21 Dec 2017
						</span>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 p-t-50">
					<!-- - -->
					<h4 class="txt13 m-b-38">
						Gallery
					</h4>

					<!-- Gallery footer -->
					<div class="wrap-gallery-footer flex-w">
						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
						</a>

						<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
							<img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>


</body>
</html>
<?php include("footer.php"); ?>
