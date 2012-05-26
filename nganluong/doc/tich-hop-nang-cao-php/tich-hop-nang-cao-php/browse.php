<?php
 	// Database giả lập
	include("database.php");
?>

<div align="center" style="height: 40px; line-height:40px; font-size:14px; font-weight:bold; color: red">
	DEMO MỘT WEBSITE BÁN HÀNG ĐƠN GIẢN CHƯA TÍCH HỢP NGÂNLƯỢNG.VN
</div>
<div align="center" style="height: 40px; line-height:40px; font-size:16px;">Trang danh sách sản phẩm</div>
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse" width="600px" align="center">
	<tr style="background: #CCCCCC;">
		<td align="center" width="30px">STT</td>
		<td align="center">Tên</td>
		<td align="center">Ảnh</td>				
		<td align="center">Giá</td>
		<td align="center">Bỏ vào giỏ </td>
	</tr>

<?php				
	$i=1;
	// Hiển thị từng sản phẩm trong mảng data
	foreach($data as $key=>$rows):
?>	

	<tr>
		<td align="center"><?php echo $i; ?></td><td><a href="detail.php?id=<?php echo $key ; ?>"><?php echo $rows['name']; ?></a></td><td align="center"><img src="images/<?php echo $rows['image']; ?>" border="0" width="50px"></td><td align="right"><?php echo (float)$rows['price']; ?></td>
		<td align="center">
		<a href="cart.php?id=<?php echo $key; ?>"><img src="images/order.jpg" border="0"></a>
		</td>
	</tr>

<?php 
	$i++;	
	endforeach;		  
?>

</table>;

