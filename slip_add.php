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
$imageupload = isset($_FILES{'imageupload'}{'tmp_name'})?$_FILES{'imageupload'}{'tmp_name'}: "";
$imageupload_name = isset($_FILES{'imageupload'}{'name'})?$_FILES{'imageupload'}{'name'} : "";
if(filter_input(INPUT_POST,'submit')){
	$order_id = (filter_input(INPUT_POST,'order_id'));
	$email = (filter_input(INPUT_POST,'email'));
	$slip_pic = (filter_input(INPUT_POST,'slip_pic'));
	$sql = "select max(slip_id) as mxid FROM slip";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt>0){
		$row = $result->fetch_array();
		$slip_id = $row[0]+1 ;
	}else{
		$slip_id = 1;
	}	
	
	
	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		
		$filename = $arraypic[0]; //ชื่อไฟล์
		$filetype = $arraypic[1]; //นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif")
		{
			$newimage = $slip_id.".".$filetype; //รวมชื่อกับนามสกุลเข้าด้วยกัน
			copy($imageupload,"billmoney/".$newimage); //โฟเดอเกบรูป
		}else{
			echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
	  }
		}
	$sql= "insert into slip(slip_id,order_id,email,slip_pic)values('$slip_id','$order_id','$email','$newimage')";
	$result =$db->query($sql);
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
				<h3>เพิ่มข้อมูลการชำระเงิน</h3>

				 <form method="post" enctype="multipart/form-data">
                 <ul>
						<li class="text-info">รหัสการสั่งซื้อ</li>
						<li><input type="text" name="order_id" required>
					</ul>
                  
                      
                    <ul>
					  <li class="text-info">รูปสลิป</li>
						<li><input type="file" name="imageupload">
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