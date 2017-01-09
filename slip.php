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
		<div id="featured" class="container">	<br>
        <h1>ข้อมูลสินค้า</h1><br>
         <form class="form-search" method="get" action="#">
            <input type="search" name="search" placeholder="กรอกชื่อสินค้า">
            <button type="submit">ค้นหา</button>
            <i class="fa fa-search"></i>
        </form>
        <br>
         
        <br>
        </div>
</div>
	
       
        
<table class="bordered">
    <thead>
    <tr>
    <th>รหัสการชำระเงิน</th>
        <th>รหัสการสั่งซื้อ</th>   
        <th>E-mail</th> 
        <th>รูปสลิป</th>
        <th>หมายเลขEMS</th>        
        <th>ตรวจสอบ</th>
<th>EMS</th>

    </tr>
    </thead>
    <?php 
	$search_query = '';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query  = " where order_id like '%$search%'";
	} 
	$sql = "SELECT  * from slip left join order_detail on slip.order_id = order_detail.order_id
			 $search_query";
		
	$result = $db->query($sql);	
	//$result = $db->query("select * from product"); 
	while($row = $result->fetch_array()){
		
		if ($row['order_ems']==0)
		{
		$row['order_ems'] ='';	
		}
		$order_ems2 = $row['order_ems'];
		echo '	
        <tr>
        <td>'.$row['slip_id'].'</td>        
        <td>'.$row['order_id'].'</td>
   		<td>'.$row['email'].'</td>
		<td>'.$row['slip_pic'] .'</td>
		<td>'.$order_ems2.'</td>
        <td width="28"><a href="slip_check.php?id='.$row['slip_id'].'"><img src="images/file.png" width="24" height="24"></a></td>
		<td width="28"><a href="ems.php?id='.$row['order_id'].'"><img src="images/file.png" width="24" height="24"></a></td><strong></strong>
    </tr>';        
    } ?>
</table> 
<?php include "include/footer.php"; ?>	

		</div>
	</div>
</body>
</html>
