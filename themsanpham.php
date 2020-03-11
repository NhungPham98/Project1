<?php
include ("source/class.php");
$p = new admin();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
						  <div class="header-ctn">
						    <div class="dropdown">
						      <div class="cart-dropdown">
								  <div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">

											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle"></div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
<!--Thêm sản phẩm -->
<form action="" method="post" enctype="multipart/form-data" name="myfm" id="myfm">
									      <table width="800" border="0" align="center" cellpadding="2" cellspacing="2">
									        <tr>
									          <td height="49" colspan="2" align="center"><p> <h3> THÊM SẢN PHẨM MỚI </h3></p>							                                                  <p>&nbsp;</p></td>
								            </tr>
									        <tr>
									          <td width="121" height="32">Nhập tên sản phẩm:</td>
									          <td width="363"><label for="txt1"></label>
								              <input type="text" name="txtten" id="txtten"></td>
								            </tr>
									        <tr>
									          <td height="32">Loại sản phẩm:</td>
									          <td><label >
                                              <select  name="txtloai" id="txtloai" >
                                                    <option value="phukien" name="txtloai">Phụ kiện</option>
                                                    <option value="usb" name="txtloai">USB</option>
                                                    <option value="tainghe" name="txtloai">Tai Nghe</option>
                                               </select>
								           </label>
                                           </td>
								            </tr>
									        <tr>
									          <td height="32">Nhập mô tả:</td>
									          <td>
									            <label for="textarea"></label>
								              <textarea name="txtmota" id="txtmota"></textarea></td>
								            </tr>
                                            <tr>
									          <td height="32">Chi tiết sản phẩm:</td>
									          <td>
									            <label for="textarea"></label>
								              <textarea name="txtchitiet" id="txtchitiet"></textarea></td>
								            </tr>
									        <tr>
									          <td height="32">Nhập giá:</td>
									          <td><label for="textfield1"></label>
									            <label for="txtgia"></label>
								                <label for="txtgia2"></label>
								                <input type="text" name="txtgia" id="txtgia2">
							                  VNĐ</td>
								            </tr>
									        <tr>
									          <td height="32">Nhập số lượng:</td>
									          <td><label for="txtsl"></label>
								              <input type="text" name="txtsl" id="txtsl"></td>
								            </tr>
									        <tr>
									          <td height="32">Thời gian bảo hành: </td>
									          <td><label for="txtbh"></label>
									            <input type="text" name="txtbh" id="txtbh">
                                              Tháng</td>
								            </tr>
									        <tr><label for="textfield2"></label>
									          <td height="32">Thương hiệu:</td>
									          <td>
								              <input type="text" name="txtth" id="txtth"></td>
								            </tr>
									        <tr>
									          <td height="32">Hình1:</td>
									          <td>
									            <label for="fileField"></label>
								              <input type="file" name="myfile1" id="hinh"></td>
								            </tr>
                                            <tr>
									          <td height="32">Hình2:</td>
									          <td>
									            <p>
									              <label for="fileField"></label>
									              <input type="file" name="myfile2" id="hinh">
								              </p></td>
								            </tr>
                                            <tr>
									          <td height="32">Hình3:</td>
									          <td>
									            <label for="fileField"></label>
								              <input type="file" name="myfile3" id="hinh"></td>
								            </tr>
									        <tr>
									          <td height="32" colspan="2" align="center">
                                              <input type="submit" name="nut" id="nut" value="Thêm Sản Phẩm"> 
                                              </td>
								            </tr>
								          </table>
  </form>
  <div align="center"> 
  <?php
 
 
 if(isset($_POST['nut']))
 {
	 
	 $ten = $_REQUEST['txtten'];
 $mota = $_REQUEST['txtmota'];
 $gia = $_REQUEST['txtgia'];
 $loai = $_REQUEST['txtloai'];
 $thuonghieu = $_REQUEST['txtth'];
 $soluong = $_REQUEST['txtsl'];
 $baohanh = $_REQUEST['txtbh'];
 $chitiet = $_REQUEST['txtchitiet'];

	 switch ($_POST['nut'])
	 {
		 case 'Thêm Sản Phẩm':
		 {	$name = $_FILES["myfile1"]["name"];
		 $name2 = $_FILES["myfile2"]["name"];
		 $name3 = $_FILES["myfile3"]["name"];
		 // rồi test đi nó vãn vô như thuowgf :||
		 
			 if ($ten!='' && $mota !='' && $gia !='' && $loai !='' && $thuonghieu !='' && $soluong !='' && $baohanh !='' && $chitiet !=''  )
			 { 
			 $sql="insert into product (tensp,loai,mota,chitiet,gia,soluong,baohanh,hinh,hinh1,hinh2,thuonghieu) values 		  		('$ten','$loai','$mota','$chitiet','$gia','$soluong','$baohanh','$name','$name2','$name3','$thuonghieu') " ;
			  if($p -> insert($sql))
			  {
		 	$name = $_FILES["myfile1"]["name"];
			$size = $_FILES["myfile1"]["size"];
			$type = $_FILES["myfile1"]["type"];
			$tmp_name = $_FILES["myfile1"]["tmp_name"];
			$p->checkfile($name,$size,$type,$tmp_name);
			
			$name2 = $_FILES["myfile2"]["name"];
			$size = $_FILES["myfile2"]["size"];
			$type = $_FILES["myfile2"]["type"];
			$tmp_name = $_FILES["myfile2"]["tmp_name"];
			$p->checkfile($name2,$size,$type,$tmp_name);
			
			$name3 = $_FILES["myfile3"]["name"];
			$size = $_FILES["myfile3"]["size"];
			$type = $_FILES["myfile3"]["type"];
			$tmp_name = $_FILES["myfile3"]["tmp_name"];
			$p->checkfile($name3,$size,$type,$tmp_name);
			echo'<script language="javascript"> alert("Thêm Thành Công"); </script>';
			echo '<script language="javascript">location.href="themsanpham.php";</script>'; // = header
			  } 
			  
			 }else 
			  {echo'<script language="javascript"> alert("Vui lòng nhập đủ thông tin"); </script>';
              }
		 }
		 break;
	}
 }
 ?>
</div>
<!-- /Thêm sản phẩm-->

	<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
