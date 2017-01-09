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
	$email = (filter_input(INPUT_POST,'email'));
	$cname = (filter_input(INPUT_POST,'cname'));
    $password = (filter_input(INPUT_POST,'password'));
    $address = (filter_input(INPUT_POST,'address'));
	$tel = (filter_input(INPUT_POST,'tel'));
    $cid = (filter_input(INPUT_POST,'cid'));
    $cdate = (filter_input(INPUT_POST,'cdate'));
	$sql = "select * FROM customer";
	$sql= "insert into customer(email,cname,password,address,tel,cid,cdate)values('$email','$cname','$password','$address','$tel','$cid','$cdate')";
	$result =$db->query($sql);
 	header('location: index.php');
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
        
                        
        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">LOGIN</a></li>
                    <li class="active">REGISTER</li>
                </ol>
            </div>
        </div>
        <!-- reg-form -->
	<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Register Now</h3>
				<p>เงือนไขการซื้อขายสินค้า  <a href="conditions.php">click here</a></p>
				 <form>
					<ul>
						<li class="text-info">Email: </li>
						<li><input type="text" name="email" required>
					</ul>
					<ul>
						<li class="text-info">Password</li>
						<input type="password" name="password" required>
					 </ul>
                     				 
					<ul>
						<li class="text-info">ชื่อ - สกุล</li>
						<input type="text" name="cname" required>
					</ul>
					<ul>
						<li class="text-info">ที่อยู่</li>
						<input type="text" name="address" required>
					</ul>
                    <ul>
						<li class="text-info">เบอร์โทร</li>
						<input type="number" name="tel" required>
					</ul>
                    <ul>
						<li class="text-info">หมายเลขบัตรประจำตัวประชาชน</li>
						<input type="number" name="cid" required>
					</ul>
					<ul>
						<li class="text-info">วันเดือนปีเกิด</li>
						<input type="date" name="cdate" required>
					</ul>
                   	<input type="submit" name="submit" value="ตกลง">
					
				</form>
			</div>
		</div>
	</div>
        <?php include "include/footer.php";?>
    </body>
</html>