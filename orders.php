<?php include("header.php");
	$user=$_SESSION['uid'];
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql=mysqli_query($con,"delete from orders where id='$id'")or die('ERROR'.mysqli_error($con));
         $sql=mysqli_query($con,"delete from summary where id='$id'")or die('ERROR'.mysqli_error($con));
    }
    
    
	$sql=mysqli_query($con,"Select * from orders where user='$user'") or die('ERROR '.mysqli_error($con));	


?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form name="form" method="post" action="action.php?pid=6">
            <table class="table table-hover" style="margin-top: 20%">
                <thead>
                    <tr>

                        <th style="padding: 9px">Order ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Total</th>
                        <th>Show Detail </th>
                    </tr>
                </thead>
                <tbody>
                	<?php while($rs=mysqli_fetch_array($sql))
                	{?>
                				
                    <tr>
                        
                        <input type="hidden" product_id>
                        <td class="col-sm-1 col-md-2">
                        <div class="media">
                            <a class="" href="#"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                   <?php echo $rs[1];?>
                               
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-2" style="text-align: center">
                        <?php echo $rs[5];?>
                        </td>
                        <td class="col-sm-1 col-md-2" style="text-align: center"><strong id="price"> </strong><?php echo $rs[2];?></td>
                        <td class="col-sm-4 col-md-2 text-center">
                        	<a href="show.php?id=<?php echo $rs[1];?>"><button type="button" class="btn btn-dark" name="checkout">
                            Show <span class="glyphicon glyphicon-play"></span>
                        </button>
                      
                        </td> 
                         <?php if($rs[6]<3) { ?>
                        <td class="col-sm-1 col-md-1 text-center">
                            <a href="orders.php?id=<?php echo $rs[1];?>"><button type="button" class="btn btn-danger" name="checkout">
                            Cancel <span class="glyphicon glyphicon-play"></span>
                        </button>
                      
                        </td>
                    <?php } ?>

                        <td class="col-sm-1 col-md-1 text-center">
                        <?php 
                        if($rs[6]==0 || $rs[6]==1)
                        {
                            if($rs[6]==0)
                             $st="Pending";
                            else if($rs[6]==1)
                            $st="Accepted";
                        ?>
                            <h5> <h5 style="font-weight: bold;font-size:16px;color: ;">
                            <?php echo $st; ?></h5> 
                        
                        
                          <?php } 
                          else if($rs[6]==2) {
                            $st="Cooking"; ?>

                            <h5>
                            <?php echo $st; ?></h5>
                    <?php }
                    else if($rs[6]==3) {
                        $st="On the way"; ?>
                         <h5 style="font-weight: bold;font-size:16px;color: ;">
                            <?php echo $st; ?></h5> <?php }
                    else
                    {
                        $st="Delivered"; ?>
                         <h5 style="font-weight: bold;font-size:16px;">
                            <?php echo $st; ?></h5>
                    <?php } ?>


                        </td>     
                    </tr>
                <?php } ?>
                

                    <tr>
                        
                    
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>