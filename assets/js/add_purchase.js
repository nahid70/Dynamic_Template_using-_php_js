function add_purchase(){
$(function() {

		var company = $("#company").val();
		
		var bill_no = $("#bill_no").val();
		var date = $("#date").val();
		var product = $("#product").val();
		var product_date = $("#product_date").val();
		var expire_date = $("#expire_date").val();
		var unit_price = $("#unit_price").val();
		var quantity = $("#quantity").val();
		var total_price = unit_price * quantity;
		var barcode = $("#barcode").val();
		var batch_no = $("#batch_no").val();
		var stock = $("#stock").val();
						
		var dataString = 'bill_no='+bill_no+'&product='+product+'&product_date='+product_date+'&expire_date='+expire_date+'&quantity='+quantity+'&barcode='+barcode+'&batch_no='+batch_no+'&unit_price='+unit_price+'&total_price='+total_price+'&stock='+stock;
		
			$.ajax({
			type: "POST",
			url: "../www/add_purchase.php",
			data: dataString,
			cache: false,
			success: function(html){
            
			document.getElementById("product").value='';
			document.getElementById("product_date").value='';
			document.getElementById("expire_date").value='';
			document.getElementById("unit_price").value='';
			document.getElementById("total_price").value='';
			document.getElementById("quantity").value='';
			document.getElementById("stock").value='';
			document.getElementById("barcode").value='';
			document.getElementById("batch_no").value='';
			document.getElementById('product').focus();
			}
			
			});	
});
}

function purchase_totalprice(){

		var unit_price = $("#unit_price").val();
		var quantity = $("#quantity").val();
		var total= unit_price*quantity;
		document.getElementById("total_price").value=total;
		
}

function select_bill(company){
	
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
					document.getElementById("select_bill").innerHTML=xmlhttp.responseText;    }
					//window.location.href = "sales.php";}
			  }
			 
				xmlhttp.open('GET','select_bill.php?company='+company,true);
				xmlhttp.send();				
	
		
}

