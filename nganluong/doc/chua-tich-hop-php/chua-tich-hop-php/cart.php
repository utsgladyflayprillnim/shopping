<?php
	include("database.php");
	//Tạo cookie lưu id của sản phẩm
	if (!isset($_COOKIE["cart"][$_GET['id']]) && intval($_GET['id'])>0) {
		setcookie("cart[".$_GET['id']."]", 1);
	}
    //Thực hiện xoá sản phẩm trong giỏ hàng 
	if ($_GET['cmd']=='delete' && intval($_GET['id'])>0) {
		setcookie("cart[".$_GET['id']."]", null);
		header('location: cart.php');
		exit();
	}
   //Thực hiện tăng số lượng của hàng được mua trong giỏ hàng  
	if(intval($_GET['id'])>0){
		setcookie("cart[".$_GET['id']."]", $_COOKIE["cart"][$_GET['id']] + 1);
		header('location: cart.php');
		exit();
	}
?>	

<div align="center" style="height: 40px; line-height:40px; font-size:14px; font-weight:bold; color: red">
	DEMO MỘT WEBSITE BÁN HÀNG ĐƠN GIẢN CHƯA TÍCH HỢP NGÂNLƯỢNG.VN
</div>
<div align="center" style="height: 40px; line-height:40px; font-size:16px;">Trang giỏ hàng</div>
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse" width="600px" align="center">
	<tr bgcolor="#CCCCCC">
		<td align="center" width="30px">STT</td>
		<td align="center">Tên</td>
		<td align="center">Ảnh</td>				
		<td align="center">Giá</td>
		<td align="center">SL</td>
		<td>&nbsp;</td>
	</tr>	

<?php
	unset($_COOKIE['cart'][0]);
	$i=1;
	//Hiển thị sản phẩm trong giỏ hàng 
	if (is_array($_COOKIE['cart'])):
		foreach($_COOKIE['cart'] as $key=>$value):
?>

<tr>
	<td align="center"><?php  echo $i; ?></td>
	<td><a href="detail.php?id=<?php echo $key;?>"><?php echo $data[$key]['name']; ?></a></td>
	<td align="center"><img src="images/<?php echo $data[$key]['image'] ?>" border="0" width="50px"></td>				
	<td align="right"><?php echo (float)$data[$key]['price']; ?></td>
	<td align="center"><?php echo $value; ?></td>
	<td align="center">
	<a href="cart.php?cmd=delete&id=<?php echo $key; ?>"><img src="images/delete.gif" border="0"></a></td>
</tr>

<?php 
	$i++;
	endforeach;
	endif;
?>
	<tr>
		<td align="center" colspan="6"><div align="right">
		<input type="button" value="Tiếp tục mua hàng" onclick="browse()">
		<input type="button" value="Tính tiền" onclick="check_order()"></div></td>
	</tr>
</table>
<script>
	 function check_order(){
	   window.location="order.php";
	 }
	 
	 function browse(){
	   window.location="browse.php";
	 }
</script>

