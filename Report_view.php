<?php
session_start();
$url = $_SESSION['url'];
include("header.php");
 ?>
	
	<body style="overflow: hidden;">
      
        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="assets/images/loader-dark.gif" alt="" />
        </div>

		
        <div id="page-wrapper" class="demo-example">

			<?php
			   include("page-header.php");
			   include("page-sidebar.php");		
			?>
           
		   <div id="page-content-wrapper">
				<?php include("page-title.php");?>
				
				
				<div id="page-content">
				
					<div class="example-box">
					
					
					<br><br>
					
					<?php
						$id = $_GET['id'];
						
						$query = "select * from purchase where id = $id";
						
						$query_run = mysql_query($query);
						while($row = mysql_fetch_assoc($query_run)){
						$id = $row['id'];
				       
				        $company_bills_id = $row['company_bills_id'];
				     
					
						
						
					echo "<form id='demo-form-2' action='Report_purchase.php' class='col-md-10 center-margin' method='post'>
					
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label>
									Date:
								</label>
							</div>
							<div class='form-label col-md-2'>
								<label>".
									 $row['product_date']
								."</label>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label>
									Company Name:
								</label>
							</div>

							<div class='form-label col-md-2'>
								<label>
									  ";
	                $Companey_query= mysql_query("select * from company where id = '$company_bills_id'");
					while($companey_id_row = mysql_fetch_assoc($Companey_query)){
					echo $companey_id_row['name'];}
									  echo"
								</label>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label>
									Bill Number:
								</label>
							</div>

							<div class='form-label col-md-2'>
								<label>
						 ";
						 
						 $Bill_query= mysql_query("select * from company_bills  where id = '$company_bills_id'");
					while($Bill_id_row = mysql_fetch_assoc($Bill_query)){
					echo $Bill_id_row['no'];}
									  echo"
								</label>
							</div>
						</div>
						
						
						"; } ?>
            			
							
		<?php
		
		
     echo "<table class='table'>
	 
	<thead>
		<tr>
	       
			<th>Type</th>
			<th> Product Name</th>
			<th> Unit price</th>
				<th> quantity</th>
			<th>Total Price</th>
			
		
		</tr>
	</thead>
	";
	
	$query= "select * from purchase where company_bills_id =$company_bills_id ";
        $query_run = mysql_query($query);
		while($row=mysql_fetch_array($query_run)){
            
				$type_id = $row['type_id'];
				$product_id = $row['product_id'];
				$unitprice_id = $row['unit_price'];
				$qunitity_id = $row['quantity'];
				$totalprice_id = $row['total_price']; 
				
				$type_query = mysql_query("select * from type where id = '$type_id'");
					$type_id_row = mysql_fetch_assoc($type_query);
					$type_ids=$type_id_row['name'];
				
				
				
				$product_query= mysql_query("select * from product where id = '$product_id'");
					$product_id_row = mysql_fetch_assoc($product_query);
					$product_ids=$product_id_row['medical_name'];
					
	
	
echo "<tr>
	<td>".$type_ids."</td>
	<td>".$product_ids."</td>
	<td>".$unitprice_id."</td>
	<td>".$qunitity_id."</td>
	
	";
	$total = $qunitity_id * $unitprice_id; 
	$total_price;
	$total_price +=$total;
	$query_update = mysql_query("UPDATE purchase
				SET
					total_price = '$total_price'
				WHERE id = '$id '");
	echo "<td>$total</td>
	
</tr>
";

}

echo "
<tr><td><strong>Total Price: ".$total_price."</strong></td></tr>

	
</tbody>

    </table>
	
";
?>
						
						
						
						
						
						
					
						
						
						<div class="divider"></div>
						
						<?php
						
						echo "<a href= 'Report_purchase.php'";
							if($url == "/pharmacy2/www/expense.php")
								echo 'Report_purchase.php';
						
						
						echo"' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='Validate!'>
                            <span class='button-content'>
                                Close
                            </span>
						</a>";
						?>
					</form>

					
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
