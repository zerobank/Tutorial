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
	
	$email = $_SESSION['email'];

if(filter_input(INPUT_POST,'submit')){
	$email = (filter_input(INPUT_POST,'email'));
	$cname = (filter_input(INPUT_POST,'cname'));
	$password = (filter_input(INPUT_POST,'password'));
	$address = (filter_input(INPUT_POST,'address'));
	$tel = (filter_input(INPUT_POST,'tel'));
	$cid = (filter_input(INPUT_POST,'cid'));
	$cdate = (filter_input(INPUT_POST,'cdate'));
	//$newimage1 = (filter_input(INPUT_POST,'ppname0'));


	$sql="UPDATE customer set email='$email', cname='$cname',password='$password',address='$address',tel='$tel',cid='$cid',cdate='$cdate' where email ='$email'";
    $db->query($sql);
		} 
   // header('Location:index.php');

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
 <?php 		
			$sql = "select * from customer where email='$email' ";
			$result = $db->query($sql);
			$row = $result->fetch_array();
			$cname=$row['cname'];
			$password=$row['password'];
			$address=$row['address'];
			$tel = $row['tel'];
			$cid = $row['cid'];
			$cdate=$row['cdate'];
			?>
<div class="reg-form">
		<div class="container">
			<div class="reg">
          
				<h3>แก้ไขข้อมูลสมาชิก</h3>
           

				 <form method="post" enctype="multipart/form-data">
                	<ul>
						<li class="text-info">email</li>
						<li><input name="email"  value="<?php echo $email; ?>">
					</ul>
                	<ul>
						<li class="text-info">ชื่อสมาชิก</li>
						<li><input type="text" name="cname"  value="<?php echo $cname; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">password</li>
						<li><input type="text" name="password" value="<?php echo $password; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">ที่อยู่</li>
						  <input type="text" name="address" value="<?php echo $address; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">เบอร์โทร</li>
						  <input type="text" name="tel" value="<?php echo $tel; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">เลขประจำตัว</li>
						 <input type="text" name="cid" value="<?php echo $cid; ?>" required>
					</ul>
                    <ul>
						<li class="text-info">วันเกิด</li>
						 <input type="date" name="cdate" value="<?php echo $cdate; ?>" required>                         
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
