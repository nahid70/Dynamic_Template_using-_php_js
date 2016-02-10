<?php
include("../lib/db.php");
$fname= $_GET['fname'];
$lname= $_GET['lname'];
$phone= $_GET['phone'];

 $sql = "insert into customer (first_name,last_name,contact) values('$fname','$lname','$phone') ";
	
	mysql_query($sql);
