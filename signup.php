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

$msg="";
if(filter_input(INPUT_POST,'submit')){
	$email = filter_input(INPUT_POST,'email');
	$pwd =	filter_input(INPUT_POST,'password');
	$sql = "SELECT * FROM customer WHERE email='$email'";
	$result = $db->query($sql);
		$row_cnt = $result->num_rows;
	if($row_cnt>0){
			$row = $result->fetch_array();
			if($pwd==$row['password']){
				$_SESSION['email'] = $email;
				header('Location: index.php');
			}else{
				$msg = "password ไม่ถูกต้อง";	
			}
	}else{
			$msg = "ไม่พบ user : $email";
		}
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
    
       <div id="wrapper">
		<div id="featured" class="container">
       <form class="form-login" method="post" action="#">

            <div class="form-log-in-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Log in </h1><h2><?php echo $msg; ?></h2>

                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" required>
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" required>
                        </label>
                    </div>
                    

                    <div class="form-row">
                        <button type="submit" name="submit" value="Log in">ตกลง</button></form>
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