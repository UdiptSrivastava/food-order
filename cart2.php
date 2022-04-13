<?php include("header.php");
    include("connectdb.php");
    if(isset($_GET['user']))
    {
        $user=$_GET['user'];
        $_SESSION['user']=$user;
    }
    


?>
<div class="container">
    <div class="row">
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
                    <tr>
                        <?php 
                        $sql=mysqli_query($con,"select A.*,B.price,B.image from cart A,dish B where A.dish=B.dish and A.user='$user'")or die('ERROR'.mysqli_error($con));
                        $total=0;$n=1;
                        while ($rs=mysqli_fetch_array($sql)) {
                                $total=$total+($rs[3]*$rs[4]);
                            ?>
                        <input type="hidden" product_id>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="admin/assets/images/<?php echo $rs[7]; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?php echo $rs[2];?>
                                <input class="media-heading" type="hidden" name="dish" value="<?php echo $rs[2];?>"></h4>
                                <input class="media-heading" type="hidden" name="dish<?PHP echo $n; ?>" value="<?php echo $rs[2];?>">
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="qty_<?PHP echo $n; ?>" name="qty<?PHP echo $n; ?>" min="1" value="<?php echo $rs[3];?>" onchange="update_price(<?PHP echo $n; ?>);">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong id="price_<?PHP echo $n; ?>"><?php echo $rs[4];?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong id="amount_<?PHP echo $n; ?>"><?php echo $rs[4]*$rs[3];?></strong>
                        <input class="media-heading" type="hidden" name="price<?PHP echo $n; ?>" value="<?php echo $rs[4];?>">    
                        </td>
                        <td class="col-sm-1 col-md-1">
                        <a> <button type="submit" name="Remove" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></a></td>
                    </tr>
                <?php $n++; } 
                $_SESSION['n']=$n;
                ?>

                    <tr>
                        
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>    </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong id="total"><?php echo $total;?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><a><button type="submit" class="btn btn-primary" name="Update">
                            Update Cart <span class="glyphicon glyphicon-"></span>
                        </button></a></td>
                        <td>
                        <a href="menu.php"><button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></a></td>
                        <td>
                        <button type="submit" class="btn btn-success" name="checkout">
                            Place order <span class="glyphicon glyphicon-play"></span>
                        </button>
                         <button id="rzp-button1" type="button">Pay</button><script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    </td>

                        
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

<script>
    var options = {   
 "key": "rzp_test_3onvZG56LHJ0H8", // Enter the Key ID generated from the Dashboard
"amount": "50000",
"currency": "INR",
"name": "Acme Corp",
"description": "Test Transaction",
"image": "https://example.com/your_logo",
   
 "handler": function (response){        alert(response.razorpay_payment_id);        alert(response.razorpay_order_id);        alert(response.razorpay_signature)    }};var rzp1 = new Razorpay(options);document.getElementById('rzp-button1').onclick = function(e){    rzp1.open();    e.preventDefault();}</script>
<?php include("footer.php");?>