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

$email = $_SESSION['email'];
$sql ="select cid from customer where email='$email'";
  $result = $db->query($sql);
  $row = $result->fetch_array();
  $cid=$row['cid'];
  if(filter_input(INPUT_POST,'submit')){
    $sql = "select max(order_id) as mxid FROM orders";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt>0){
		$row = $result->fetch_array();
		$order_id = $row[0]+1 ;
	}else{
		$order_id = 1;
	}	
	
	$order_date = date("y-m-d");
	$sql = "insert into orders(order_id,order_date,cid,order_status)values('$order_id','$order_date','$cid','1')";	
	$db->query($sql);
	$sql = "select * ,product.product_id as pid from tmp_order left join product on tmp_order.product_id =  product.product_id where email = '$email'";
	$result = $db->query($sql);
	while ($row = $result->fetch_array()){
		  $product_id = $row['pid'];		
		  $psize = $row['psize'];	
		  $price = $row['price'];	
		  $qty = $row['qty'];	

    $sql2 = "SELECT qty FROM product_size where product_id='$product_id' AND psize ='$psize'";
	$result2 =$db->query($sql2);
	$row2 = $result2->fetch_array();
	$qty2 = $row2['qty'];
	$qtynew = $qty2 - $row['qty']; 
	$sql3="update product_size set qty='$qtynew' where product_id ='$product_id' AND psize ='$psize'";
	$db->query($sql3);
	
	$sql1 = "insert into order_detail(order_id,product_id,psize,price,qty,order_ems)values('$order_id','$product_id','$psize','$price','$qty','')";	 
	$db->query($sql1);	  
	}	 
	$sql = "delete from tmp_order where email='$email'";
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

       <div id="wrapper">
		<div id="featured" class="container">
      <table border=1>
      <tr>
      <td>วันที่ซื้อ</td>
      <td>รายการที่ซื้อ</td>
      <td>ราคารวม</td>
      <td>สถานะ</td>    
      </tr>
      <?php
	  $sql = "select * from orders where cid='$cid' order by order_date desc";
	  $result = $db->query($sql);
	  while ($row = $result->fetch_array()){
		  $alltotal = 0;
		  $order_id=$row['order_id'];
		  $order_date=$row['order_date'];
	      $order_status=$row['order_status'];
		  echo
		  '<tr>
		  <td>'.$order_date.'</td>
		  <td>';
	  $sql1 = "select *, order_detail.price as pr from order_detail left join product on order_detail.product_id = product.product_id where order_id='$order_id'";	 
	  $result1 = $db->query($sql1);
	  while ($row1 = $result1->fetch_array()){
	  echo $row1['pname']."&nbsp;&nbsp;size&nbsp;".$row1['psize']."&nbsp;จำนวน&nbsp;".$row1['qty']."&nbsp;คู่&nbsp;<br>";
	  $total = $row1['pr']*$row1['qty'];
	  $alltotal= $alltotal + $total;	
	  }
	  echo '</td>
	   <td>'.$alltotal.'</td>
	  	   
		 <td>';if($row['order_status'] == "1"){
			   echo "รอการชำระเงิน";
			   	   }elseif($row['order_status']=="2"){
					   echo "ชำระเงินแล้ว";
					   }else echo "กำลังส่งของ"; 
					   '</td>
					   <td width="28"><a href="ems.php?id='.$row['order_id'].'"><img src="images/file.png" width="24" height="24"></a></td><strong></strong>

		   </tr>';
	  } 
	   ?>
      
    
        </table>

</div>
</div>
<!-- //login-page -->
        <!--signup-->
        <?php include "include/footer.php"; ?>
            </div>
        </div>
    </body>
</html>