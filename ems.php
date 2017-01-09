<?php 
ob_start();
session_start();
if ($_SESSION){ 
		if ($_SESSION['email']=="admin@admin.com")
		{include "include/header3.php";}
	else {include "include/header2.php";}
	}
	else  
	{include "include/header.php";}
	include "include/conn.php";
$act=1;
$order_id = filter_input(INPUT_GET,'id');
if(filter_input(INPUT_POST,'submit')){
	$order_ems = (filter_input(INPUT_POST,'order_ems'));
$sql = "select * from order_detail where order_id='$order_id' ";
		$result = $db->query($sql);	
	$row = $result->fetch_array();	
	$order_id=$row['order_id'];
	$product_id=$row['product_id'];
	$psize=$row['psize'];
	$qty=$row['qty'];
	$price=$row['price'];
	 $sql="UPDATE order_detail set order_id='$order_id', product_id='$product_id',psize='$psize',qty='$qty',price='$price',order_ems='$order_ems' where order_id ='$order_id'";
	 echo  $sql;
	 $result = $db->query($sql);
	 header('location: slip.php');
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
<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>เพิ่มข้อมูลสินค้า</h3>
<?php
$sql = "SELECT  * from slip";
$result = $db->query($sql);
$row = $result->fetch_array();
$sql = "select order_status from orders where order_id='$order_id' ";
			$result = $db->query($sql);
			$row = $result->fetch_array();
			$order_status=$row['order_status'];
$sql2="UPDATE orders set order_status='3' where order_id ='$order_id'";
$db->query($sql2);
?>
				 <form method="post" enctype="multipart/form-data">
                 <ul>
						<li class="text-info">รหัสการขาย</li>
						<li><input type="text" name="order_id"  value="<?php echo $order_id; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">EMS</li>
						<li><input type="text" name="order_ems" required>
					</ul>
                    
  <input type="submit" name="submit" value="ตกลง">
        </form>
        </div>
		</div>
	</div>
        <?php include "include/footer.php"; ?>
	</div>
	</div>
</body>
</html>