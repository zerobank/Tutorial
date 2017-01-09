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
        <h1 align="center">ข้อมูลสมาชิก</h1><br>
         <form class="form-search" method="get" action="#">
            <input type="search" name="search" placeholder="กรอกชื่อสมาชิก">
            <button type="submit">ค้นหา</button>
            <i class="fa fa-search"></i>
        </form>
         <br>
         
      
      
        </div>
        <div class="row">
    <div class="container">
  
  <table class="table table-bordered">
     <thead>
      <tr>
        <th align="center">อีเมล</th>
        <th align="center">ชื่อ</th>
        <th align="center">พาสเวิด</th>
        <th align="center">ที่อยู่</th>
        <th align="center">เบอร์โทร</th>   
        <th align="center">13หลัก</th>
        <th align="center">วันเกิด</th>     
      </tr>
    </thead>
     <?php 
	$search_query = '';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query  = " where cname like '%$search%'";
	} 
	$sql = "SELECT * FROM customer $search_query";
	$result = $db->query($sql);
	
	//$result = $db->query("select * from member"); 
	while($row = $result->fetch_array()){
		echo '	
        <tr>
        <td>'.$row['email'].'</td>  
		<td>'.$row['cname'].'</td> 
		<td>'.$row['password'].'</td> 
		<td>'.$row['address'].'</td>      
        <td>'.$row['tel'].'</td>            
		<td>'.$row['cid'].'</td>        
        <td>'.$row['cdate'].'</td>
	      
      
    </tr>';        
    } ?>
    </table>
		</div>
	</div>
<?php include "include/footer.php";?>
</body>
</html>
