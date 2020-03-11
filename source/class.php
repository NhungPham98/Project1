<?php
class admin
{
	 function connect()
	{
		$cont= mysql_connect("localhost","nhom12","123456");
		if(!$cont){
			echo "lỗi connect";
			exit();
			}	
		else {
			mysql_select_db("linhkiendientu");
			mysql_query("SET NAMES UTF8");
			return $cont;
			}	
	}
	
	function login($user,$pass)
	{
		echo $user;
		echo $pass;
			if($user=='admin' && $pass=='123456')
			{
				session_start();
				$_SESSION['user']=$user;
				$_SESSION['pass']=$pass;
				echo ' <script language="javascript"> alert("Đăng nhập thành công")</script>';
				header ('location: admin.php');
			}
			else
			{
				echo'Đăng Nhập Không Thành Công. Vui lòng đăng nhập lại';
			}	
		}
		
	
	function insert($sql)
	{
		$link = $this -> connect();
		$ketqua=mysql_query ($sql, $link);
		if($ketqua){echo mysql_error();}
		return $ketqua;	
	}
	function checkfile($name,$size,$type,$tmp_name){
		$local = 'img/'.$name;
		if (isset($name)) {
			if ($type == "image/png"  || $type =="image/jpeg") {
				if ($size < 2000000) {
					if(!move_uploaded_file($tmp_name,$local)){ echo mysql_error();}
					
					
				}
				 
				else {
					echo "Vui lòng chọn kích thước file < 2MB";
				}
				
			} else {
				echo "Vui lòng chọn file hình";
			}
		} else {
			echo "Thất bại";
		}
		

	}
	function themxoasua($sql)
	{
		$link = $this->connect();
		if (mysql_query($sql,$link))
		  {
	           return 1; 
	      }
	    else 
		  { 
               return 0; 
		  } 
     } 
	 
	 function dangxuat()
		{	if (isset($_GET['action'])) 
			{
				unset($_SESSION['user']);
				unset($_SESSION['pass']);
				//session_destroy();
				 echo "<script language='javascript'>location.href='index.php';</script>";
				
			}
		}
	function get_info_product($id){
		$link= $this->connect();		
		$sql = "SELECT * FROM product WHERE masp = ".$id;
		$ketqua= mysql_query($sql,$link);
		while ($row = mysql_fetch_array($ketqua)){
			echo '
				<form action="" method="post" enctype="multipart/form-data" name="myfm" id="myfm">
									      <table width="800" border="0" align="center" cellpadding="2" cellspacing="2">
									        <tr>
									          <td height="49" colspan="2" align="center"><p> 
									          <h3> CẬP NHẬT SẢN PHẨM </h3>
									          </p>							                                                  <p>&nbsp;</p></td>
								            </tr>
									        <tr>
									          <td width="121" height="32">Tên sản phẩm:
                                               
											  </td>
									         <td>'.$row['tensp'].'</td>
								            </tr>
									        <tr>
									          <td height="32">Loại sản phẩm:</td>
									          <td><label for="textfield"></label>
								              <input type="text" name="txtloai" id="txtloai value="'.$row['loai'].'"">									           
								            </tr>
									        <tr>
									        <td height="32">Mô tả:</td>
									       <td>
		<textarea class="form-control hei" type="text" value="'.$row['mota'].'"  name="txtmota"></textarea></td>
								            </tr>
									        <tr>
									          <td height="32">Nhập giá:</td>
									          <td><label for="textfield1"></label>
								                <input type="text" name="txtgia" id="txtgia2" value="'.$row['gia'].'">
							                  VNĐ</td>
								            </tr>
									        <tr>
									          <td height="32">Nhập số lượng:</td>
									          <td><label for="txtsl"></label>
								              <input type="text" name="txtsl" id="txtsl" value="'.$row['soluong'].'"></td>
								            </tr>
									        <tr>
									          <td height="32">Thời gian bảo hành: </td>
									          <td><label for="txtbh"></label>
									            <input type="text" name="txtbh" id="txtbh" value="'.$row['baohanh'].'">
                                              Tháng</td>
								            </tr>
									        <tr><label for="textfield2"></label>
									          <td height="32">Thương hiệu:</td>
									          <td>
								              <input type="text" name="txtth" id="txtth" value="'.$row['thuonghieu'].'"></td>
								            </tr>
                                             <tr>
									          <td height="32" colspan="2" align="center">
                                             
											<button class="btn btn-primary" type="submit"  value='.$row['masp'].' name="nut"><i class="fa                                              fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
											<button class="btn btn-secondary"  name="huy" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Hủy</button>
											</td>
											</tr>
									      
								          </table>
  </form>
			';	
					
		}
		
if(isset($_POST['nut'])){
    $id = $_POST['nut'];
	$loai= $_POST["txtloai"];
$mota= $_POST["txtmota"];
$gia=$_POST["txtgia"];
$thuonghieu= $_POST["txtth"];
$baohanh= $_POST["txtbh"];
$soluong= $_POST["txtsl"];

    $sql = "UPDATE product SET loai='$loai', mota='$mota', thuonghieu='$thuonghieu', gia='$gia',baohanh='$baohanh', soluong='$soluong' 
	 WHERE masp =  ".$id."";
    if(mysql_query($sql, $link)){
        echo "<script language='javascript'>alert('cập nhật thành công!');</script>";
		echo "<script language='javascript'>location.href='admin.php';</script>";
    }else{
        echo "<script language='javascript'>alert('cập nhật không thành công');</script>";
		echo mysql_error;
    }
}
if(isset($_POST['huy'])){
	echo "<script language='javascript'>location.href='admin.php';</script>";
	}
	}
	
	  function xuatsanpham($sql)
	{
		$link= $this->connect();
		$truyvan= mysql_query($sql,$link);
		$i= mysql_num_rows($truyvan);
		if( $i > 1){
			while($row= mysql_fetch_array($truyvan))
			{
				echo '<!-- product -->
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
													>
													<span>
													<button  name="xoa" value="'.$row['masp'].'" class="quick-view class="newsletter-btn""><i class=""></i> Xóa sản phẩm này  </a></span>		 													</button>
													</span>
												</div>
											</div>
											<div class="add-to-cart">
											
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i><a href="update.php?action=&id='.$row['masp'].'"> Chỉnh Sửa </a></button>
										
											</div>
											</form>
										</div>
										<div class="clearfix visible-sm visible-xs"></div>
										<!-- /product -->
									</div>
																';
			}
		}else echo" Không có sản phẩm nào ";
		
		if(isset($_GET['xoa']))
	{
    $id_xoa = $_GET['xoa'];
    $sql = "DELETE FROM product WHERE masp = '$id_xoa'";
	$link= $this->connect();
	echo $sql;
	$truyvan = mysql_query($sql,$link);
    if($truyvan){
        echo "<script language='javascript'>alert('Xóa thành công!');
						window.location='admin.php';		
			</script>";
		
    }else{
        echo "<script language='javascript'>alert('Không xóa được');</script>";
		echo mysql_error ;
    	}
	
	}
		
}

}



?>