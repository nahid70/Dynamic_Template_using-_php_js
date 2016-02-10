function select_Companey(Select){

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
			   document.getElementById("type2").innerHTML=xmlhttp.responseText;    }
			  }
              
				xmlhttp.open('POSTo','select_Companey.php',true);	
				
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("Select="+Select);
	
	}