<?php 
session_start();
if ($_SESSION){ 

		if ($_SESSION['email']=="admin@admin.com")
		{include "include/header3.php";}
	else {include "include/header2.php";}
	}
	else  
	{include "include/header.php";}
	include "include/conn.php";
$msg="";
$alltotal=0;
$email =$_SESSION['email'];
if(filter_input(INPUT_POST,'submit')){
	$product_id = filter_input(INPUT_POST,'id');
	$psize = filter_input(INPUT_POST,'psize');
	$qty = filter_input(INPUT_POST,'qty');
	$sql="insert into tmp_order(email,product_id,psize,qty) values('$email','$product_id','$psize','$qty')";

	$db->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>N-Air a E-commerce category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="N-Air Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<meta charset utf="8">
		<!--fonts-->
		<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
		
		<!--fonts-->
		<!--bootstrap-->
			 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
			<link href="css/style.css" rel="stylesheet" type="text/css"/>
            <link href="css/form-login.css" rel="stylesheet" type="text/css"/>
        <!--shop-kart-js-->
        <script src="js/simpleCart.min.js"></script>
		<!--default-js-->
			<script src="js/jquery-2.1.4.min.js"></script>
		<!--bootstrap-js-->
			<script src="js/bootstrap.min.js"></script>
		<!--script-->
         <!-- FlexSlider -->
            <script src="js/imagezoom.js"></script>
              <script defer src="js/jquery.flexslider.js"></script>
            <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

            <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
            </script>
        <!-- //FlexSlider-->
    </head>
    <body>
    <br />
                    <!--/.content--->
                </div>
       <div id="wrapper">
		<div id="featured" class="container">
       <table border=1>
       <tr>
       <td>ชื่อสินค้า</td>
       <td>ขนาด</td>
       <td>ราคาต่อหน่วย</td>
       <td>จำนวน</td>
       <td>ราคารวม</td>
       <td>ยกเลิก</td>
       </tr>
       <?php 
	   $sql = "select *,product.product_id as pid from tmp_order left join product on tmp_order.product_id = product.product_id where email='$email'";
	   $result = $db->query($sql);
	   while($row =$result->fetch_array()){
		   $product_id=$row['pid'];
		   $pname=$row['pname'];
		   $psize=$row['psize'];
		   $price=$row['price'];
		   $qty=$row['qty'];
		   $total=$row['price']*$row['qty'];
		   $alltotal=$alltotal+$total;
		   echo 
		   '<tr>
		   	<td>'.$pname.'</td>
			<td>'.$psize.'</td>
			<td>'.$price.'</td>
			<td>'.$qty.'</td>
			<td>'.$total.'</td>
			<td><a href="delcart.php?id='.$product_id.'&psize='.$psize.'&qty='.$qty.'">x</a></td>
			</tr>';
		   }
       ?>
       </table>
       <h2>
       All Total : <?php echo $alltotal." บาท";?>
       </h2><br>
       <form name="formbuy" method="post" action="buy.php">
       <input class="btn item_add" type="submit" name="submit" value="Buy Now"></form>
</div>
</div>
</div>
<!-- //login-page -->
        <!--signup-->
        <?php include "include/footer.php"; ?>
            </div>
        </div>
    </body>
</html>