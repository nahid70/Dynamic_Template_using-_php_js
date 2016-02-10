<?php
include("../lib/db.php");

$com_name= $_POST['com_name'];
$com_address= $_POST['com_address'];
$com_Coordinator= $_POST['com_Coordinator'];
$com_phone= $_POST['com_phone'];
$com_email= $_POST['com_email'];

	 $sql = "insert into  company (name,address,contact,email,cordinator) values('$com_name','$com_address','$com_phone','$com_email','$com_Coordinator') ";
	
	mysql_query($sql);
