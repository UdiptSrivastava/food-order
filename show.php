<?php include("header.php");
    include("connectdb.php");
    if(isset($_GET['id']))
    {
            $id=$_GET['id'];
    }
    $sql=mysqli_query($con,"select A.*,B.dish,B.image  from summary A,dish B where A.dish=B.dish and A.id='$id'")
    or die('ERROR '.mysqli_error($con));
    



?>
<div class="container">
       <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form name="form" method="post" action="action.php?pid=6">
            <table class="table table-hover" style="margin-top: 20%">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>


                    <?php 
                    $total=0;
                        while($rs=mysqli_fetch_array($sql))
                                {
                                    $total=$total+$rs[2]*$rs[3];
                    ?>
                    <tr>


                       
                        <input type="hidden" product_id>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="admin/assets/images/<?php echo $rs[7]; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?php echo $rs[1];?>
                                <input class="media-heading" type="hidden" name="dish" value="<?php echo $rs[1];?>"></h4>
                                
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" id="qty_<?PHP echo $n; ?>" name="qty" min="1" value="<?php echo $rs[2];?>" readonly >
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong id="price"><?php echo $rs[3];?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong id="amount_<?PHP echo $n; ?>"><?php echo $rs[2]*$rs[3];?></strong>
                        <input class="media-heading" type="hidden" name="price<?PHP echo $n; ?>" value="<?php echo $rs[3];?>">    
                        </td>
                        
                    </tr>
                <?php } 
               
                ?>

                    <tr>
                        
                    
                        
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
    </div>
</div>
<script type="text/javascript">
   
    function update_price(id){
        var qty = $("#qty_"+id).val();
        var price = $("#price_"+id).text();
        var amount = parseInt(qty)*parseInt(price);
        $("#amount_"+id).text(amount);
        update_total();
    }

    function update_total(){
        var total=0;
        var count = parseInt(<?php echo $n; ?>)

        for(var n = 1; n < count; n++){

            total = parseInt(total) + parseInt($("#amount_"+n).text());
        }

        $("#total").text(total);
    }

    

</script>
<?php include("footer.php");?>