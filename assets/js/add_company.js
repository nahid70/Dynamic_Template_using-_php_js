function add_company(){

		var com_name = document.getElementById("com_name").value;
		var com_address = document.getElementById("com_address").value;
		var com_Coordinator = document.getElementById("com_Coordinator").value;
		var com_phone = document.getElementById("com_phone").value;
		var com_phone = document.getElementById("com_phone").value;
		var com_email = document.getElementById("com_email").value;
		

	if (window.XMLHttpRequest)//az html dage mikhsatim bagrim
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();//bin safa file wa bironi
 		 }
		else
		  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');//az in now object bazazim
 		 }
			xmlhttp.onreadystatechange=function()
			  {
 			 if (xmlhttp.readyState==4 && xmlhttp.status==200)//hamisha 4 hast 200=on
 			   {
			   //element payda kon
					window.location.href = "new_purchase.php";}
			  }

				xmlhttp.open('POST','add_company.php',true);	
				
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("com_name="+com_name+"&com_address="+com_address+"&com_Coordinator="+com_Coordinator+"&com_phone="+com_phone+"&com_email="+com_email);
	
}
  