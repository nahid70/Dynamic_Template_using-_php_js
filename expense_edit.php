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
						$id = $_GET[id];
						$query = "select * from expense where id = $id";
						$id;
						$query_run = mysql_query($query);
						if($row = mysql_fetch_assoc($query_run)){
						
						$id_expense = $row['expense_types_id'];
						$id_staff = $row['staff_id'];
						$id_bank = $row['bank_id'];
						$description = $row['description'];
						$amount = $row['amount'];
						
						
						if(isset($_POST['save'])){
							$date = $_POST['datepicker2'];
							$type_expense = $_POST['type_expense'];
							$amt = $_POST['amt'];
							$staff = $_POST['staff'];
							$bank_id = $_POST['bank'];
							$description = $_POST['description'];
							
							$update_query = mysql_query("UPDATE expense set date = '$date',
							amount='$amt', description='$description', staff_id = '$staff',
							bank_id='$bank_id', expense_types_id='$type_expense'
							where id = '$id'");
								
							$expense_amount=0;
							$query_expense_amount_select = mysql_query("select * from expense where bank_id='$bank_id' 
							and deleted != 'deleted'");
							while($row_expense = mysql_fetch_assoc($query_expense_amount_select))
								$expense_amount += $row_expense['amount'];
							
							$income_amount=0;
							$query_income_amount_select = mysql_query("select * from income where bank_id='$bank_id' 
							and deleted != 'deleted'");
							while($row_income = mysql_fetch_assoc($query_income_amount_select))
								$income_amount += $row_income['amount'];
							
							$blance = $income_amount-$expense_amount;
							
							
							$query_bank_update = mysql_query("update bank set blance='$blance', payment='$expense_amount' where id='$bank_id'");
							 if($query_bank_update)
								$blance;
								
							
							if($url == "/pharmacy/www/expense.php")
								header("Location:expense.php" );
							
							else if($url == "/pharmacy/www/expense_income_report.php")
								header("Location:expense_income_report.php" );
								
								
						}
						
						
					
				
					echo"<form id='demo-form-2' class='col-md-10 center-margin' method='post'>
					
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='datepicker2'>
									Date
								</label>
							</div>

							<div class='form-input col-md-4'>
								<input placeholder='' class='col-md-12' type='text' name='datepicker2' id='datepicker2' value='".$row['date']."' />
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='type_expense'>
									Type of Expense
								</label>
							</div>

							<div class='form-input col-md-4'>
							
								<select data-placeholder='Select' id='type_expense' name='type_expense' class='chosen-select'>
									<option value='$id_expense' />";
									
										$query_expense_type = mysql_query("select id, name from expense_types where id ='$id_expense' ");
						
									  while($row_expense_type = mysql_fetch_assoc($query_expense_type))
									  echo $row_expense_type['name'];
									  
											$query_expense_types="select id, name from expense_types where deleted != 'deleted'";
											$query_expense_run=mysql_query($query_expense_types);
											while($row=mysql_fetch_assoc($query_expense_run)){
												$name=$row['name'];
												$id_expense_type=$row['id'];
												
												 echo "<option value='$id_expense_type' />".$name;
											}
										 
								echo "</select>
								
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='amt'>
									Amount
								</label>
							</div>

							<div class='form-input col-md-4'>";
							
							$am=substr($amount, 0, -3);
								echo"<input placeholder='' class='col-md-12' type='text' name='amt' id='amt' value='".$am."' />
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='staff'>
									Staff
								</label>
							</div>

							<div class='form-input col-md-4'>";
							
							$query_staff_id = mysql_query("select id, photo, first_name, last_name from staff 
										where id ='$id_staff'");
								$row_staff = mysql_fetch_assoc($query_staff_id);
								echo"<select data-placeholder='". $row_staff['first_name']."&nbsp&nbsp&nbsp;". $row_staff['last_name']."' id='staff' name='staff' class='chosen-select'>
									<option value='".$id_staff."'/>";
										
											$query_staff_ids="select id, photo, first_name, last_name from staff 
											where deleted != 'deleted'";
											$query_staff_run=mysql_query($query_staff_ids);
											while($row_staffs=mysql_fetch_assoc($query_staff_run)){
												$staff_id=$row_staffs['id'];
												 echo "<option value='$staff_id' style='text-indent: 25px; background-image:url(../data/uploads/".$row_staffs['photo']."); background-repeat: no-repeat; background-size: 35px 33px; margin :10px;' >".$row_staffs['first_name']."&nbsp&nbsp&nbsp;". $row_staffs['last_name']."</option>";
											}
								echo "</select>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='bank'>
									Bank
								</label>
							</div>
							<div class='form-input col-md-4'>
								<select data-placeholder='Select' id='bank' name='bank' class='chosen-select'>
									<option value='$id_bank' />";
										$query_bank = mysql_query("select id, name from bank where id ='$id_bank' ");
									  while($row_bank = mysql_fetch_assoc($query_bank))
									  echo $row_bank['name'];
									  
											$query_bank="select id, name from bank where deleted != 'deleted'";
											$query_bank_run=mysql_query($query_bank);
											while($row_banks=mysql_fetch_assoc($query_bank_run)){
												$name=$row_banks['name'];
												$id_bank=$row_banks['id'];
												
												 echo "<option value='$id_bank' />".$name;
											}
								echo "</select>
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-md-2'>
								<label for='description'>
									Description
								</label>
							</div>

							<div class='form-input col-md-4'>
							
								<textarea placeholder='' class='col-md-12' type='textarea' name='description' id='description' value='' >". $description ."</textarea>
							</div>
						</div>
						
						
						<div class='divider'></div>
						
						<button name='save' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='update and back to main page!'>
                            <span class='button-content'>
                                Update
                            </span>
						</button>
						<a href='";
							if($url == "/pharmacy/www/expense.php")
								echo 'expense.php';
							
							else if($url == "/pharmacy/www/expense_income_report.php")
								echo 'expense_income_report.php';
						
						echo"' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='cancel and back to main page!'>
                            <span class='button-content'>
                                Cancel
                            </span>
                        </a>
						
					</form>";	
					}
					?>
					
						
					
					

					
				
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
