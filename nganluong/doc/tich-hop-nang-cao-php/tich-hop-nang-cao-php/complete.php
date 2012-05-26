<?php
	//Thêm class NL_Checkout 
	require_once("nganluong.php");
	//Lấy kết quả trả về từ ngân lượng
    
	//Lấy thông tin giao dịch
	$transaction_info=$_GET["transaction_info"];
	//Lấy mã đơn hàng 
	$order_code=$_GET["order_code"];
	//Lấy tổng số tiền thanh toán tại ngân lượng 
	$price=$_GET["price"];
	//Lấy mã giao dịch thanh toán tại ngân lượng
	$payment_id=$_GET["payment_id"];
	//Lấy loại giao dịch tại ngân lượng (1=thanh toán ngay ,2=thanh toán tạm giữ)
	$payment_type=$_GET["payment_type"];
	//Lấy thông tin chi tiết về lỗi trong quá trình giao dịch
	$error_text=$_GET["error_text"];
	//Lấy mã kiểm tra tính hợp lệ của đầu vào 
	$secure_code=$_GET["secure_code"];
	
	//Xử lí đầu vào 
	
	$nl=new NL_Checkout();
	$check= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
	if($check)	
	$html .="<div align=\"center\">Cám ơn quý khách, quá trình thanh toán đã được hoàn tất. Chúng tôi sẽ kiểm tra và chuyển hàng sớm!</div>";
	else
	$html.="Quá trình thanh toán không thành công bạn vui lòng thực hiện lại";
	
	echo $html;
?>