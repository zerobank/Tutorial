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
    <title>N-Air a E-commerce category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
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
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <?php 
		$id = filter_input(INPUT_GET,'id');
		$sql = "select * from product left join product_type on product.ptid = product_type.ptid left join product_brand on product.pbid = product_brand.pbid where product_id='$id' ";
		$result = $db->query($sql);
		$row = $result->fetch_array();
		$pname = $row['pname'];
		$price = $row['price'];
		$ptname = $row['ptname'];
		$pbname = $row['pbname'];
		$ppid = $row['ppid'];
		$product_detail = $row['product_detail'];
		?>
        <div class="showcase-grid">
            <div class="container">
                <div class="col-md-8 showcase">
                    <div class="flexslider">
                          <ul class="slides">
                            <li data-thumb="upload/<?php echo $ppid ?>">
                                <div class="thumb-image"> <img src="upload/<?php echo $ppid ?>" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <?php 
							$sql1 = "select * from product_pic where product_id='$id'";
						
							$result1 = $db->query($sql1);
							while ($row1 = $result1->fetch_array()){
							$ppname = $row1['ppname'];
							?>
                                 <li data-thumb="upload/<?php echo $ppname ?>">
                                 <div class="thumb-image"> <img src="upload/<?php echo $ppname ?>" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                                <?php
								}
							?>
                           
                          
                          </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3><?php echo $pname; ?></h3>
                            <p><?php echo $ptname; ?></p>
                            <h4><?php echo $price." บาท"; ?></h4>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <form name="formcart" method="post"action="cart.php">                   
                     <div class="shocase-rt-bot">
                        <div class="float-qty-chart">
                        <ul>
                            <li class="qty">
                                <h3>Size Chart</h3>
                                <select class="form-control siz-chrt" name="psize">
                                <?php $sql2 = "select * from product_size where product_id = '$id'";
							$result2 = $db->query($sql2);
							while ($row2 = $result2->fetch_array()){
									echo '<option value='.$row2['psize'].'>'.$row2['psize']."คงเหลือ: ".$row2['qty']                                    .'</option>'; }					
									?>
                                  
                                </select>
                            </li>
                            <li class="qty">
                                <h4>QTY</h4>
                               <input type="number" name="qty">
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li class="ad-2-crt simpleCart_shelfItem">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <?php 
							if ($_SESSION){
							
							 ?>
                                <input class="btn item_add" type="submit" name="submit" value="Add To Cart">
                            <input class="btn item_add" type="submit" name="buynow" value="Buy Now">
                                <?php 
							}else {
							 ?>
                             <a class="btn item_add" href="signup.php" role="button">Add To Cart</a>
                                <a class="btn" href="signup.php" role="button">Buy Now</a>
                           <?php 
							     }
							 ?>
                          </li>
                        </ul>
                    </div>
                    </form>
                </div>
        <div class="clearfix"></div>
            </div>
        </div>
    

        <div class="specifications">
            <div class="container">
              <h3>รายระเอียดสินค้า</h3> 
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                   
                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    <?php echo $product_detail ?>
                    </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
        
        <?php include "include/footer.php"; ?>
        </div>
    </body>
</html>
    