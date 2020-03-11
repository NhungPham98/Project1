<?php 
class khachhang
{	 function connect()
	{
		$cont= mysql_connect("localhost","nhom12","123456");
		if(!$cont)
			{
			echo "lỗi connect";
			exit();
			}	
		else
			 {
			mysql_select_db("linhkiendientu");
			mysql_query("SET NAMES UTF8");
			return $cont;
			}	
	}
	
	function xuatsanpham($sql)
	{
		$link= $this->connect();
		$truyvan= mysql_query($sql,$link); 
		if($truyvan= mysql_query($sql,$link)){
		 $i= mysql_num_rows($truyvan);
		if($i >=1)
		{
			while($row= mysql_fetch_array($truyvan))
			{	
				echo '<!-- product --><td>
										<div class="col-md-4 col-xs-6">
										<div class="product">
										<form >
											<div class="product-img">
												<img  src="./img/'.$row["hinh"].'" alt="">
												 											
                                               </div>
											<div class="product-body">
												<p class="product-category">'.$row["loai"].'</p>
												<h3 class="product-name"><a href="#">'.$row["tensp"].'</a></h3>
												<h4 class="product-price">'.$row["gia"].'<del class="product-old-price"></del></h4>
												
									<div class="product-btns">
													<span>
												<button  class="add-to-compare" class="newsletter-btn"><i class="fa fa-exchange"></i><span class="tooltipp"><a href="store.php?action=sosanh&page=1&id='.$row['masp'].'& loai='.$row["loai"].'">thêm vào so sánh</a></span></button>
													</span>
													<span>
													<button class="quick-view class="newsletter-btn""><i class="fa fa-eye"></i><span class="tooltipp" href="product.php"><a href="detail.php?action=chitiet&id='.$row['masp'].'">xem chi tiết</a></span>		 													</button>
													</span>
												</div>
											</div>
											<div class="add-to-cart">
											
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i><a href="store.php?action=addcart&id='.$row['masp'].'"> thêm vào giỏ hàng</a></button> 
										
											</div>
											</form>
										</div>
										</td>
										<!-- /product -->
									
																';
												
												
			}
			
		}else {echo "<script language='javascript'>alert('Không có sản phẩm');</script>"; }
	} echo "lỗi truy cập dữ liệu";
	}
	
	function search()
	{
		if (isset($_REQUEST["search_bt"])) 
        {	
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            
            if (empty($search))
			 {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql ="select * from product where tensp like '%$search%'"; 
 				return $sql;   
            }
        }
	}
		
	function locsanpham()
	{	
		$filter  = array(
				'loai'     => isset($_GET['loai']) ? ($_GET['loai']) : "",
				'gia'     => isset($_GET['gia']) ? ($_GET['gia']) : "",
				
    			);
					// Biến lưu trữ lọc
		$where = array();
		 
		// Nếu có chọn lọc thì thêm điều kiện vào mảng
		if ($filter['loai'])
		{
			$where[] = "loai = '{$filter['loai']}'";
		}
		 
		if ($filter['gia'])
		{
			switch($filter['gia'])
			{
			case 1: $where[] = "gia < 150000"; break;
			case 2: $where[] = "(gia BETWEEN 150000 AND 300000)"; break;
			case 3: $where[] = "gia > 300000"; break;
			} 
		}
		  
		
		// Câu truy vấn cuối cùng
		
		$sql ='SELECT * FROM product where '.implode(' AND ', $where).'' ; 
		
		return $sql;	
		
	}
	
	function addcart()
	{	
		if($_GET['action']== "addcart")
		{
			$id= $_GET["id"];
			
			$cart = $_SESSION["cart"];
			
			$link= $this->connect();
			$sql='SELECT * FROM product where masp="'.$id.'" ';
		$truyvan= mysql_query($sql,$link);
		$row= mysql_fetch_array($truyvan);
			if(!empty($cart))
			{	
				//kiểm tra lần thứ 2 mua sp, id đã có trong phần tử của array chưa
				if(array_key_exists($id,$cart))
				{
					$cart[$id] = array(
					"id" =>$row["masp"],
					"hinh" => $row["hinh"],
					"ten" => $row["tensp"],
					"gia" => $row["gia"],
					"luong" =>(int)$cart[$id]["luong"]+1,
					);
				}
				else
				{
					$cart[$id] = array(
					"id" =>$row["masp"],
					"hinh" => $row["hinh"],
					"ten" => $row["tensp"],
					"gia" => $row["gia"],
					"luong" => 1,
					);
				}
			}
			else
			// lần đầu tiên mua hàng
			{
				$cart[$id] = array(
				"id" => $row["masp"],
				"hinh" => $row["hinh"],
					"ten" => $row["tensp"],
					"gia" => $row["gia"],
					"luong" => 1,
				);
				
				
			}
			
			$_SESSION["cart"]=$cart;
			echo '<script type="text/javascript">
            					window.location="store.php?page=1";
								alert("sản phẩm đã thêm vào giỏ hàng");
									 </script>';
			
		}	
		
	}
	
	function xuatcart()
	{
		if(!empty($_SESSION["cart"]))
		{
			$total = 0;
			
			foreach($_SESSION["cart"] as $keys => $values)
			{
				echo' <div class="product-widget">
												<div class="product-img">
													<img src="./img/'.$values["hinh"].'" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$values["ten"].'</a></h3>
													<h4 class="product-price"><span class="qty">'.$values["luong"].'</span>'.$values["gia"].'</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>';			
			}
			
		}
	}
	
	function xuat_hoadon()
	{
		if(!empty($_SESSION["cart"]))
		{
			
			$total=00000000000;
			foreach($_SESSION["cart"] as $keys => $values)
			{	$total;
				$total1= $values["luong"] * $values["gia"];
				echo' <div class="order-products">
								<div class="order-col">
									<div> <span>'.$values["luong"].'</span> x <span>'.$values["ten"].'</span></div>
									<div>'.$total1.'</div>
								</div>';			
				 $total = $total + $total1; 
			}
			echo '<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">'.$total.'</strong></div>
							</div>';
			
		}
	}
	
	function add_sosanh()
	{if($_GET['action']== "sosanh")
		{	$sanpham  = array(
				'id'     => isset($_GET['id']) ? ($_GET['id']) : "",
				'loai'     => isset($_GET['loai']) ? ($_GET['loai']) : "",		
    			);	
				
			if(!isset($_SESSION["sanpham1"]))
			{
				$_SESSION["sanpham1"]= $sanpham;
				echo '<script language="javascript">alert(" đã thêm vào so sánh yêu cầu chọn sản phẩm thứ 2");</script>';
			}
			else
			{	
					if(!isset($_SESSION["sanpham2"]))
					{	if($_SESSION["sanpham1"]["loai"] == $sanpham["loai"])
						{ $_SESSION["sanpham2"] = $sanpham;
							echo '<script type="text/javascript">
            					window.location="sosanh.php";
									 </script>';
						}
							
					} 
				if(isset($_SESSION["sanpham1"])&&isset($_SESSION["sanpham2"]) )
				{
					echo '<script type="text/javascript">
            					window.location="sosanh.php";
									 </script>';
				}
	
			}
		}

	}
		
		
		//&& $row["loai"] == $_GET["loai"] && $_SESSION["sanpham1"] != $_GET["id"]
	
	
	function phantrang($total_page,$limit)
	{	
		
		// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
		
       if (isset($_GET["page"]))
	   {
		   $current_page = $_GET["page"];
			if ($current_page > $total_page)
			{
				$current_page = $total_page;
			}
			else if ($current_page < 1)
			{
				$current_page = 1;
			}
 		
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 		
        // BƯỚC 5: T
		return  $start;
       	  
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
         
		}
		else {echo' <div class="container">
				<div class="row">
					<h3 class="text-danger">OOPS! không tìm thấy trang </h3>
					<a href="index.php">Trở về HOME</a>
				</div>
			</div>';
			}
	}
            
            function tinhtrang($sql)
			{
					$link= $this->connect();
				//$sql="SELECT * FROM product";
				$truyvan= mysql_query($sql,$link);
				if($truyvan)
				{
				$total_records = mysql_num_rows($truyvan); 
				$limit= 6;
				// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
				// tổng số trang
				
				$total_page = ceil($total_records / $limit);
				return $total_page;
				}
			}
			
			
			
             
	function themxoasua($sql)
	{
		$link = $this->connect();
		mysql_query($sql,$link);
	}
	
	function muahang()
	{
		if($_GET["action"] == "dathang")
		
		{	$name1 = $_POST["first-name"];
			$name2 = $_POST["last-name"];
			$mail = $_POST["email"];
			$address = $_POST["address"];
			$city = $_POST["city"];
			$country = $_POST["country"];
			$zip_code = $_POST["zip-code"];
			$tel = $_POST["tel"];
			$note = $_POST["note"];
			
			$sql1=" INSERT INTO khachhang (first_name,last_name,email,address,city,country,zip-code,tel,note) VALUES('$name1',				'$name2','$mail','$address','$city','$country',$tel',$note')";
			
			
			foreach($_SESSION["cart"] as $keys => $values)
			{	
				$total1= $values["soluong"] * $values["gia"] ;
				$soluong = $values["soluong"];
				$tensp = $values["ten"];
				$masp =	$values["id"];
				$sql2 = "INSERT INTO hoadon (masp,tensp,soluong,tongtien) VALUES('$masp','$tensp','$soluong','$total1')";
			}
			 
			
		}	
	}
	
	
	function xuatketquasosanh($sql)
	{		
					$link= $this->connect();
					
					$truyvan= mysql_query($sql,$link); 
					
					while ($row = mysql_fetch_array($truyvan)){
					
					echo'<div id="aside" class="col-md-6">
						<!-- aside Widget -->
                        
						<div class="product-details">
							<h2 class="product-name">'.$row["tensp"].'</h2>
							
							<div><h4>Giá</h4>
								'.$row["gia"].'
							</div>
							

							<div class="product-options"><h4>thương hiệu</h4>
									'.$row["thuonghieu"].'
							</div>
                            

							<div class="add-to-cart"> <h4>loại</h4>
								'.$row["loai"].'
							</div>

							<div class="add-to-cart"> <h4>mô tả</h4>
								'.$row["mota"].'
							</div>	
                            
                            <div class="add-to-cart"> <h4>cấu hình chi tiết</h4>
								'.$row["chitiet"].'
							</div>	
                            
                            <div class="add-to-cart"> <h4>thời gian bảo hành</h4>
								'.$row["baohanh"].'
							</div>			

						</div>
					</div>
						
						<!-- /aside Widget -->';
					}
		

	}
	//-------
	function xoasosanh()
	{	
		if(isset($_REQUEST["xoa"]))
		{
			unset($_SESSION["sanpham1"],$_SESSION["sanpham2"]);
			
			if(!isset($_SESSION["sanpham1"]) &&!isset($_SESSION["sanpham2"]))
			{
				echo '<script type="text/javascript">
            					window.location="store.php?page=1";
								alert(" Đã hoàn tất so sánh");
									 </script>';	
			}
		}
	}
	
	
	function xuat ($sql)
	{
		$link = $this -> connect();
		$kq = mysql_query ($sql, $link);
		$i= mysql_num_rows ($kq);
	 	if ($i >0)
		{
			while ($row= mysql_fetch_array($kq))
			{
			$id = $row [0];
				$ten =$row [2];
				$mota = $row [3];
				$hinh = $row [5];
				$hinh1 = $row [6];
				$hinh2 = $row [7];
				$gia = $row [11];
				$baohanh = $row[10];
				$chitiet=$row[4];
				$th=$row[0];
				echo'
						<div class="row">
					
                    <!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/'.$row[5].'"alt="">
							</div>

							<div class="product-preview">
								<img src="./img/'.$row[6].'" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/'.$row[7].'" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./img/'.$row[5].'" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/'.$row[6].'" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/'.$row[7].'" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">'.$row[2].'</h2>
							
							<div>
								<h3 class="product-price">'.$gia.' VNĐ</h3>
							</div>
							<p> '.$mota.' </p>
							<p> Thương Hiệu: '.$th.'</p>

							<div class="product-options">
								
					<p> Thời gian bảo hành : '.$baohanh.' Tháng </p>
							</div>

							<div class="add-to-cart">
								
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i><a href="store.php?action=addcart&page=1&id='.$row['masp'].'"> thêm vào giỏ hàng</a></button>
							</div>

							<ul class="product-btns">
							  <li></li>
							</ul>

						</div>
					</div>
					<div class="col-md-12">
						<div id="product-tab">
							
							<div class="tab-content">
								
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
									 <p>Chi Tiết Sản Phẩm:</p>
									  <p>'.$chitiet.'</p>
									 </div>
								</div>
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								
						  </div>
							
					  </div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">

					<div class="col-md-12"></div>
				  <div class="clearfix visible-sm visible-xs"></div>
				</div>';
			}
		}
	}
	
}

?>