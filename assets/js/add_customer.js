function as(){
alert(56746);
var fname=document.getElementById("fname").value;
var lname=document.getElementById("lname").value;
var phone =document.getElementById("phone").value;
 
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
					//document.getElementById(divid).innerHTML=xmlhttp.responseText;    }
					window.location.href = "expense.php";}
			  }
			 
				xmlhttp.open('GET','add_customer.php?fname='+fname+'&lname='+lname+'&phone='+phone,true);
				xmlhttp.send();				
	
}
  