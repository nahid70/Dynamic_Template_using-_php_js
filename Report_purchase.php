<?php
session_start();
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

		   <div id="page-content-wrapper" id="showdata">
				<?php include("page-title.php");
				?>
				
				
				<div id="page-content">
				
					<div class="example-box">
					
					
					<br><br>
					
					
  <?php
	 $_SESSION['url']= $_SERVER["SCRIPT_NAME"];
	//code delete
	if(isset($_GET['idd']))
	{
	
		$sql = "UPDATE purchase
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:Report_purchase.php" );
		}
	
	}
	if(isset($_GET['idd_b']))
	{
	
		$sql = "UPDATE company_bills
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd_b]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:Report_purchase.php" );
		}
	
	}
	//end delete
		
?>
		

 <form id="demo-form-2" action="Report_purchase.php" class="col-md-10 center-margin" method="post" >
 <div class="example-code clearfix">
	<div class="form-row col-lg-3 float-left form-vertical">
			<div class="form-label">
			<label for="from">
				From:
			</label>
			</div>
			<div class="form-input">
	<input type="text" size="10" class="fromDate" name="from" />
			</div>
			</div>

	<div class="form-row col-lg-3 float-left form-vertical">
			<div class="form-label">
			<label for="to">
				To:
			</label>
			</div>
			<div class="form-input">
			<input type="text" size="10" class="toDate" name="to" />
				</div>
				</div>
				</div>		
				<br><br>	
				
		<div class="form-row">
            <div class="form-label col-md-2">
                    <label for="company">
                      CompanyName:
                    </label>
                </div>
                <div class="form-input col-md-3" >
                        <div class="form-input">
                        <select data-placeholder="Select" id="com" Onchange = "select_Companey(this.value)" name="com" class="chosen-select">
						<option value='' />Select
						<?php
						$from = $_POST['from'];
						$to = $_POST['to'];
						
						echo "<option value='all_companey' />All Companey";
						$select_companys="select * from company ";
						$query_company=mysql_query($select_companys);
                        while($company=mysql_fetch_assoc($query_company)){
						$company_name=$company['name'];
						$company_id=$company['id'];					
								 echo "<option value='$company_id' />". $company_name;
							}
							
							
                           
						?>   
                        </select>
						</div>
							
						
						
						
						</div>
				

					<div class="form-label col-md-2" style="margin-left:100px;">
                    <label for="balance">
              
			  SelectBlance:
                    </label>
                </div>
                <div class="form-input col-md-2" >
                        <div class="form-input">
                        <select data-placeholder="Select" id="company" name="company" class="chosen-select">
							<option value='all_companey' />All company
						<?php
						$from = $_POST['from'];
						$to = $_POST['to'];
						
						$select_companys="select * from company ";
						$query_company=mysql_query($select_companys);
                        while($company=mysql_fetch_assoc($query_company)){
						$company_name=$company['name'];
						$company_id=$company['id'];					
								 echo "<option value='$company_id' />".$company_name;
							}
                           
						?>   
                        </select>
						</div>
						
						</div>
				<button type="submit" name="select" id="select" class="btn large primary-bg text-transform-upr font-size-11" title="Validate!">
                            <span class="button-content">
                                Submit
                            </span>
							</button>
			
						
						</div>
	
			<div id="type2">		
                <div class="form-row">
					<div class="form-label col-md-2">
						<label for="bill">
						  BillNumbers:
						</label>
					</div>
					<div class="form-input col-md-3">
					
						<div class="form-input">
							<select id="type2" name="type2" data-placeholder="All Bills" class="chosen-select">
							
							</select>
						</div>
						
					</div>
					
				</div>
			</div>	
				
				
						
						<button type="submit" name="submit" id="select" class="btn large primary-bg text-transform-upr font-size-11" title="Validate!">
                            <span class="button-content">
                                Submit
                            </span>
							</button>
		
	</form>	
		
		
		<?php
		if(isset($_POST['select'])){
		echo '<br>Selected Companey  between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
		$Companey = $_POST['company'];
		
     echo "<table class='table' id='example1'>
	 
	<thead>
		<tr>
	        <th>No</th>
			<th>Companey Name</th>
			<th> Bill Number</th>
			<th>Blance</th>
		</tr>
	</thead><tbody>";
         	
	$i = 0;
	if($Companey == 'all_companey'){	
	    $query= "select* from purchase where deleted !='deleted'";
	}
	 else{
	   $query= "select* from purchase where company_bills_id='$Companey' ";
	 }
	 
	$query_run = mysql_query($query);
		while($row=mysql_fetch_array($query_run)){
	
			    $i++;
				$id = $row['id'];
				$company_bills_id = $row['company_bills_id']; 
				
				$totalprice_id = $row['total_price'];
				
					$bill_query= mysql_query("select * from company_bills where id = '$company_bills_id'");
					$companey_id_row = mysql_fetch_assoc($bill_query);
					$company_id=$companey_id_row['company_id'];
					
					
					$payment= mysql_query("select * from company_payments where company_id = '$company_id'");
					$Blance_id_row = mysql_fetch_assoc($payment);
					$amount = $Blance_id_row['amount'];
					
						
					$company_query= mysql_query("select * from company where id = '$company_id'");
					$company_id_row = mysql_fetch_assoc($company_query);
					
					
					echo"<tr><td>".$i."</td>";
				
					
					echo"<td>". $company_id_row['name']."</td>";	

					 
		            echo"<td>". $companey_id_row['no']."</td>";
					
					$balance = $totalprice_id - $amount; 
					
					
		           echo"<td>".$balance."</td>";
					
					echo "<td class='center'>
											
											";?>
											
										</td>
										</tr>
										
										<?php
					
					
					}
					

		    ?>

	</tbody>
	<tfoot>
		<tr>
	        
	        <th>No</th>
			<th>Companey Name</th>
			<th> Bill Number</th>
			<th>Blance</th>
		</tr>
	</tfoot>
    </table>
  <?php
  }
  
  ?>
  
		

  
  
  <?php
		if(isset($_POST['submit'])){
		echo '<br>Selected Bill Number   between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
		$Bill = $_POST['bill'];
		
     echo "<table class='table' id='example1'>
	 
	<thead>
		<tr>
	        <th>No</th>
	        <th>Date</th>
			<th>Companey Name</th>
			<th> Bill Number</th>
			<th>Total Price</th>
			
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Operation</th>
		</tr>
	</thead><tbody>";
         	
	$i = 0;
	echo $c = $_POST['com'];
	echo $bill = $_POST['bill'];
	
	if($Bill == 'all_bill' && $c=='all_companey'){	
	    $query= "select* from company_bills  where deleted != 'deleted' ";
	}
	else if($Bill == 'all_bill'){
		$query= "select* from company_bills  where deleted != 'deleted' && company_id='$c'";
	}
	else{
		$query= "select* from company_bills  where deleted != 'deleted' && company_id='$c' && id='$bill'";
	}
	
	 
		$query_run = mysql_query($query);
		while($row=mysql_fetch_array($query_run)){
	
			    $i++;
				$id_bill = $row['id'];
				$company_id = $row['company_id'];
				$totalprice_id = $row['total_price'];
				
				 echo"<tr>
					 <td>".$i."</td>
					 <td>".$row['date']."</td>";
					
					 $Companey_query= mysql_query("select * from company where id = '$company_id'");
					 while($companey_id_row = mysql_fetch_assoc($Companey_query))
					 echo"<td>". $companey_id_row['name']."</td>";
					
					 echo"<td>". $row['no']."</td>";
					 echo"<td>". $row['amount']."</td>";
					 echo "<td class='center'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											<a href='Report_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
											  data-placement='top' title='View'>
											 <i class='glyph-icon icon-flag'></i>
											 </a>
											 <a href='purchase_bill_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>
											 ";?>
											<a href='Report_purchase.php?idd_b=<?php echo $id_bill; ?>' 
											onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
											data-placement='top' title='Delete'>
												<i class='glyph-icon icon-remove'></i>
											</a>
										</td>
									</tr><?php
					
					
					}
					

		    ?>


		    

	</tbody>
	<tfoot>
		<tr>
	        <th>No</th>
			<th>CompaneyName</th>
			<th> Bill Number</th>
			<th>TotalPrice</th>
			
			<th> Operation</th>
		</tr>
	</tfoot>
<?php

}
?>
  
  		 <!--<?php
		
		// if(isset($_POST['submit'])){
		// echo '<br>Selected Companey Bill Number  between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
		
		 // $Bill = $_POST['bill'];
		 
		
     // echo "<table class='table' id='example1'>
	 
	// <thead>
		// <tr>
	        // <th>No</th>
			// <th>Companey Name</th>
			// <th>Bill Number</th>
			// <th>Total Price</th>
			// <th>Operation</th>
		// </tr>
	// </thead>
	
	// <tbody>";
         	
	// $i = 0;
	// if($Bill == 'all_bill'){	
	    // $query= "select* from company_bills where deleted != 'deleted'";
	// }
	 // else{
	   // $query= "select* from company_bills where company_bills_id='$Bill' and deleted != 'deleted'";
	 // }
	// if($query_run = mysql_query($query)){
		// while($row=mysql_fetch_assoc($query_run)){
	
			    // $i++;
				// //$id = $row['id'];
				// $company_id = $row['company_id'];
				// //$totalprice_id = $row['total_price'];
				
				// echo"<tr>
					// <td>".$i."</td>";
					
					// $Companey_query= mysql_query("select * from company where id = '$company_id'");
					// while($companey_id_row = mysql_fetch_assoc($Companey_query))
					// echo"<td>". $companey_id_row['name']."</td>";
					
					// echo"<td>". $row['no']."</td>";
					// echo"<td>". $row['amount']."</td>";
					// echo "<td class='center'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											// <a href='Report_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
											 // data-placement='top' title='View'>
												// <i class='glyph-icon icon-flag'></i>
											// </a>
											// <a href='Report_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											// data-placement='top' title='Edit'>
												// <i class='glyph-icon icon-edit'></i>
										//	</a>";?>-->
											<!--<a href='Report_purchase.php?idd=<?php echo $id; ?>' 
											onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
											data-placement='top' title='Delete'>
												<i class='glyph-icon icon-remove'></i>
											</a>
										</td>-->
									<!--	</tr><?php
					
					
					//}
					//}

		    ?>-->

	
	</tbody>
	<tfoot>
		<tr>
	       <th>No</th>
			<th>Companey Name</th>
			<th>Bill Number</th>
			<th>Total Price</th>
			<th>Operation</th>
		</tr>
	</tfoot>
    </table>
 <!-- <?php
  //}
  
  ?>-->


		
			<div class="divider"></div>
				
			
         </div>
         <br><br><br><br>		
		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>