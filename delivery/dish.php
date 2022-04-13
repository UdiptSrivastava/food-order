<?php include("header.php"); 
 if(isset($_GET['id']))
 {
 	$name=$_POST['name'];
 	echo $name;
 }


?>
<input type="text" name="name">
<a href="dish.php?id=<?php echo 1; ?>"> <button type="button" name="Submit" 
	> </button></a>
<?php include("footer.php"); 
?>
<select name="status" id="status" style="margin: 13px;padding-left: 10px;padding-right:10px ">
                         <option value="">Accepted</option>
                        
                         <option value="Cooking">Cooking</option>
                         <option value="On the way">On the way</option>
                         <option value="Delivered">Delivered</option>

                        
                       </select>