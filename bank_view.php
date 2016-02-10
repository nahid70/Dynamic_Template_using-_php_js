<?php
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
				<?php include("page-title.php");
				
				
				echo "<div id='page-content'>
				
					<div class='example-box'>
					
					
					<br><br>
					
					";
						$id = $_GET['id'];
						$query = "select * from bank where id = $id";
						
						$query_run = mysql_query($query);
						while($row = mysql_fetch_assoc($query_run)){
						
					echo "<form id='demo-form-2' class='col-md-10 center-margin' method='post'>
					
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Name
								</label>
							</div>

							<div class='col-md-2'>
								<label>
									".$row['name']."
								</label>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Date
								</label>
							</div>
							<div class='col-md-2'>
								<label>
									".$row['date']."
								</label>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Description
								</label>
							</div>
							<div class='col-md-2'>
								<label>
									".$row['description']."
								</label>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-3'>
								<label >
									Blance
								</label>
							</div>
							<div class='col-md-2'>"; 
							$b =$row['blance']; 
							//$bl= ltrim ($b, '-');
							$blance=substr($b, 0, -3);
							echo"<label >
									".$blance." &nbsp&nbsp; Af
								</label>
							</div>
						</div></form><br>";
						
						







if($row['blance']>0 || $row['blance']<0){
echo'
<div class="example-code">

        <table class="table" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Name</th>
					<th>Amount</th>
                </tr>
            </thead>
            <tbody>';
				
				$i = 0;
				if($row['blance']>0 || $row['blance']<0){
							$query_income = mysql_query("select * from income where bank_id='$id' and 
							deleted!='deleted'");
							$query_expense = mysql_query("select * from expense where bank_id='$id' and 
							deleted!='deleted'");
							
							$query_company_payment = mysql_query("select * from company_payments where bank_id='$id' and 
							deleted!='deleted'");
							
							$query_customer_payment = mysql_query("select * from customer_payment where bank_id='$id' and 
							deleted!='deleted'");
							
							$query_staff_slary = mysql_query("select * from staff_salary where bank_id='$id' and 
							deleted!='deleted'");
							
							$query_sales = mysql_query("select * from sale_bills where bank_id='$id' and 
							deleted!='deleted'");
							
							//for sales 
							while($row_sales = mysql_fetch_assoc($query_sales)){
							$i++;
								$amount_sales = $row_sales['amount'];
								$no = $row_sales['no'];
								
								$row_staff_name = mysql_fetch_assoc($query_staff_name);
								
								$staff_name=$row_staff_name['first_name'];
								echo"<tr>
                    <td>".$i."</td>
                    <td>".$row_sales['date']."</td>
                    <td class='font-bold text-left'>Sales</td>
                    <td class='font-bold text-left'>".$no." Bill nomber</td>";
					$am_sles=substr($amount_sales, 0, -3);
                   echo"<td><div class='label bg-red'>".$am_sles." &nbsp&nbsp; Af</div></td>
                    
                </tr>
								
								";
							}
							
							
							//for staff salary 
							while($row_staff_slary = mysql_fetch_assoc($query_staff_slary)){
							$i++;
								$amount_staff_slary = $row_staff_slary['amount'];
								$staff_id = $row_staff_slary['staff_id'];
								$query_staff_name = mysql_query("select * from staff where id='$staff_id'");
								$row_staff_name = mysql_fetch_assoc($query_staff_name);
								
								$staff_name=$row_staff_name['first_name'];
								echo"<tr>
                    <td>".$i."</td>
                    <td>".$row_staff_slary['date']."</td>
                    <td class='font-bold text-left'>Staff sallary</td>
                    <td class='font-bold text-left'>".$staff_name."</td>";
					$am_staff=substr($amount_staff_slary, 0, -3);
                   echo"<td><div class='label bg-red'>".$am_staff." &nbsp&nbsp; Af</div></td>
                    
                </tr>
								
								";
							}
							
							
							//for customer payment 
							while($row_customer_payment = mysql_fetch_assoc($query_customer_payment)){
							$i++;
								$amount_customer_payment = $row_customer_payment['amount'];
								$customer_id = $row_customer_payment['customer_id'];
								$query_customer_name = mysql_query("select * from customer where id='$customer_id'");
								$row_customer_name = mysql_fetch_assoc($query_customer_name);
								
								$customer_name=$row_customer_name['first_name'];
								echo"<tr>
                    <td>".$i."</td>
                    <td>".$row_customer_payment['date']."</td>
                    <td class='font-bold text-left'>Customer payment</td>
                    <td class='font-bold text-left'>".$customer_name."</td>";
					$am_cus=substr($amount_customer_payment, 0, -3);
                   echo"<td><div class='label bg-red'>".$am_cus." &nbsp&nbsp; Af</div></td>
                    
                </tr>
								
								";
							}
							
							
							//for company payment 
							while($row_company_payment = mysql_fetch_assoc($query_company_payment)){
							$i++;
								$amount_expense_company_payment = $row_company_payment['amount'];
								$company_id = $row_company_payment['company_id'];
								$query_company_name = mysql_query("select * from company where id='$company_id'");
								$row_company_name = mysql_fetch_assoc($query_company_name);
								
								$company_name=$row_company_name['name'];
								echo"<tr>
                    <td>".$i."</td>
                    <td>".$row_company_payment['date']."</td>
                    <td class='font-bold text-left'>Company payment</td>
                    <td class='font-bold text-left'>".$company_name."</td>";
					$am_com=substr($amount_expense_company_payment, 0, -3);
                   echo"<td><div class='label bg-red'>".$am_com." &nbsp&nbsp; Af</div></td>
                    
                </tr>
								
								";
							}
							
							
							//for expense
							while($row_expense = mysql_fetch_assoc($query_expense)){
							$i++;
								$amount_expense = $row_expense['amount'];
								$expense_types_id = $row_expense['expense_types_id'];
								$query_expense_types = mysql_query("select * from expense_types where id='$expense_types_id'");
								$row_expense_type = mysql_fetch_assoc($query_expense_types);
								
								$expense_type=$row_expense_type['name'];
								echo"<tr>
                    <td>".$i."</td>
                    <td>".$row_expense['date']."</td>
                    <td class='font-bold text-left'>Expense</td>
                    <td class='font-bold text-left'>".$expense_type."</td>";
					$am_exp=substr($amount_expense, 0, -3);
                   echo"<td><div class='label bg-red'>".$am_exp." &nbsp&nbsp; Af</div></td>
                    
                </tr>
								
								";
							}
							
							//for income
							while($row_income = mysql_fetch_assoc($query_income)){
							$i++;
								$amount = $row_income['amount'];
								$income_types_id = $row_income['income_types_id'];
								$query_income_types = mysql_query("select * from income_types where id='$income_types_id'");
								$row_income_type = mysql_fetch_assoc($query_income_types);
								
								$income_type=$row_income_type['name'];
								echo"
								
								<tr>
                    <td>".$i."</td>
                    <td>".$row_income['date']."</td>
                    <td class='font-bold text-left'>Income</td>
                    <td class='font-bold text-left'>".$income_type."</td>";
					 
					$am=substr($amount, 0, -3);
                    echo"<td><div class='label bg-green'>".$am." &nbsp&nbsp; Af</div></td>
                    
                </tr>";		
							}
						}
            echo'</tbody>
        </table>

    </div>';
}













						
						
						echo"<div class='divider'></div>
						
								
						<a href='";
							if($url == "/pharmacy/www/bank.php")
								echo 'bank.php';
							
							else if($url == "/pharmacy/www/bank_report.php")
								echo 'bank_report.php';
						
						echo"' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='close and back to main page!'>
                            <span class='button-content'>
                                Close
                            </span>
						</a>
						
					
					";} ?>
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
