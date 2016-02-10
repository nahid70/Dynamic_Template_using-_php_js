<?php
include("../lib/db.php");

	$bill_no=$_POST['bill_no'];
	$product=$_POST['product'];
	$product_date=$_POST['product_date'];
	$expire_date=$_POST['expire_date'];
	$quantity=$_POST['quantity'];
	$batch_no=$_POST['batch_no'];
	$barcode=$_POST['barcode'];
	$unit_price=$_POST['unit_price'];
	$total_price=$_POST['total_price'];
	$shelf_id=$_POST['stock'];

	$sql = "INSERT INTO `pharmacy`.`purchase` (company_bills_id,product_id,product_date,expire_date,quantity,batch_no,bar_code,unit_price,total_price,type) VALUES ('$bill_no','$product','$product_date','$expire_date','$quantity','$batch_no','$barcode','$unit_price','$total_price','purchase');";
	mysql_query($sql);

	$query=mysql_query("select id from purchase order by id desc limit 1");
	$row=mysql_fetch_assoc($query);
	$purchase_id=$row['id'];
	
	mysql_query("insert into kept (shelf_id,purchase_id,quantity) values('$shelf_id','$purchase_id','$quantity')");
	
	?>