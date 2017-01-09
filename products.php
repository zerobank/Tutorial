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
         <form class="form-add" method="post" action="products_add.php">
            <button type="submit">เพื่มข้อมูลสินค้า</button>
        </form>
        <br>
        </div>
</div>
	
       
        
<table class="bordered">
    <thead>
    <tr>
        <th>รหัสสินค้า</th>   
        <th>ชื่อสินค้า</th>
        
        <th>ราคาขาย</th>
        <th>จำนวน</th>         
        <th>ประเภท</th>
        <th>ยี่ห้อ</th>
        <th>จัดการ</th>
        <th>เพิ่มจำนวนสินค้า</th>
    </tr>
    </thead>
    <?php 
	$search_query = '';
	$search = filter_input(INPUT_GET,'search');
	if($search!=''){
		$search_query  = " where pname like '%$search%'";
	} 
	$sql = "SELECT  * from product left join product_type on product.ptid = product_type.ptid
			  left join  product_brand on product.pbid = product_brand.pbid 
			 $search_query";
			//left join product_size on product.product_id = product_size.product_id
	$result = $db->query($sql);	
	//$result = $db->query("select * from product"); 
	while($row = $result->fetch_array()){
		echo '	
        <tr>
        <td>'.$row['product_id'].'</td>        
        <td>'.$row['pname'].'</td>
	
   		<td>'.$row['price'].'</td>	
		<td>';
		$sql1 = "SELECT  * from product_size where product_id='".$row['product_id']."'";
		$result1 = $db->query($sql1);	
		while($row1 = $result1->fetch_array()){
			echo "size ".$row1['psize'].": ".$row1['qty']."<br>";
			}
		echo'</td>	
		<td>'.$row['ptname'].'</td>		
	    <td>'.$row['pbname'].'</td>
        <td width="28"><a href="products_edit.php?id='.$row['product_id'].'"><img src="images/file.png" width="24" height="24"></a></td>
		<td width="28"><a href="product_add_unit.php?id='.$row['product_id'].'"><img src="images/add.jpg" width="24" height="24"></a></td>
    </tr>';        
    } ?>
</table>
<?php include "include/footer.php"; ?>	
		</div>
	</div>
</body>
</html>
