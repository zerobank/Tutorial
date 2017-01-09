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

if(filter_input(INPUT_POST,'submit')){
	
	$product_id = filter_input(INPUT_POST,'product_id');
	$qtynew = filter_input(INPUT_POST,'qtynew');
	
	$sql = "select qty from product where product_id='$id'";
	$result = $db->query($sql);
	$qty = $result + $qtynew;
	$sql="UPDATE product set qty='$qty'where product_id ='$product_id'";
	$result = $db->query($sql); //$result = $db->query("$sql");
	header('Location: products.php');
	
}
$id = filter_input(INPUT_GET,'id');
$sql = "select * from product left join product_size on product.product_id = product_size.product_id where product_id='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
$pname=$row['pname'];
$price=$row['price'];
$qty=$row['qty'];
$ptid = $row['ptid'];
$pbid = $row['pbid'];
$ppid=$row['ppid'];
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
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" action="#" enctype="multipart/form-data"> 

            <div class="form-title-row">
                <h1>แก้ไขข้อมูลสินค้า</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>ชื่อสินค้า</span>
                    <input type="text" name="pname" value="<?php echo $pname ?>" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>ราคา</span>
                    <input type="number" name="price" value="<?php echo $price ?>" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>จำนวน</span>
                    <input type="number" name="qty" value="<?php echo $qty ?>" required>
                </label>
            </div>
          
 			<div class="form-row">
                <label>
                    <span>รูปสินค้า</span>
                    <input name="imageupload" type="file" >
                </label>
                 <label>
                    <span>รูปเดิม</span>
                    <input name="pic" type="hidden" value="<?php echo $pic ?>">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>จำนวนใหม่</span>
                    <input type="number" name="qtynew" value="" required>
                </label>
            </div>
            <div class="form-row"><input type="hidden" name="product_id" value="<?php echo $id ?>">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>
        </form>
		</div> 
</div>
<?php include "include/footer.php";?>
</body>
</html>