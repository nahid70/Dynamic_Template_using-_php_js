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
           
		   <div id="page-content-wrapper">
				<?php include("page-title.php");?>
				
				
				<div id="page-content">
					
					<br><br>

<?php
	$_SESSION['url'] = $_SERVER["SCRIPT_NAME"];
	
	//code insert
	if(isset($_POST['save'])){
							
							$type_id = $_POST['type'];
							$date = $_POST['datepicker2'];
							$amount = $_POST['amnt'];
							$description = $_POST['description'];
							$bank_id = $_POST['bank'];
							$staff_id = $_POST['staff'];
							
							$query = "INSERT INTO income(income_types_id, amount, date, description, bank_id, staff_id, deleted) values('$type_id', '$amount', '$date', '$description', '$bank_id', '$staff_id', '')";
							$query_run = mysql_query($query);
							
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
							// $type=0;
							// if($blance>0)
								// $type='Credit';
							// else if($blance<0)
								// $type='Debit';
							
							
							$query_bank_update = mysql_query("update bank set blance='$blance', receive='$income_amount' where id='$bank_id'");
							
							
							unset($_SESSION['staff']);
							unset($_SESSION['amnt']);
							unset($_SESSION['date']);
							unset($_SESSION['des']);
							unset($_SESSION['bank']);
							
							header("Location:income.php" );
	}

	//code delete
	if(isset($_GET['idd']))
	{
	
		$sql = "UPDATE income
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:income.php" );
		}
	}
	//end delete
?>					
					
					<form id="demo-form-2" action="income.php" class="col-md-10 center-margin" method="post" />
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="type">
									Type of Income:
								</label>
							</div>
							<div class="form-input col-md-4">
								<div class="form-input">
									<select data-placeholder="Select" id="type" name="type" class="chosen-select">
										<option value='' />Select
										<?php
											$query="select id, name from income_types where deleted != 'deleted'";
											$query_run=mysql_query($query);
											while($row=mysql_fetch_assoc($query_run)){
												$name=$row['name'];
												$id=$row['id'];
												
												 echo "<option value='$id' />".$name;
											}
										?> 
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								
								<button name="new_income" class="btn large primary-bg text-transform-upr font-size-11">
									<span  class="button-content">
										Add New Income Type
									</span>
								</button>
								<?php
								if(isset($_POST['new_income'])){
						
									$_SESSION['staff']=$_POST['staff'];	
									$_SESSION['amnt']=$_POST['amnt'];	
									$_SESSION['date']=$_POST['datepicker2'];	
									$_SESSION['des']=$_POST['description'];	
									$_SESSION['bank']=$_POST['bank'];
									
									header("location:new_income_type.php");
								}					
								?>
								
							</div>
							
							
						</div>
					
					<div class="form-row">
							<div class="form-label col-md-2">
								<label for="staff">
									Select Staff:
								</label>
							</div>
							<div class="form-input col-md-4">
								<div class="form-input">
									<select data-placeholder="Select" id="staff" name="staff" class="chosen-select">
										<option value='' />Select
										<?php
										
										
											$query_staff="select id, photo, first_name, last_name from staff ";
											$query_staff_run=mysql_query($query_staff);
											while($row=mysql_fetch_assoc($query_staff_run)){
												$first_name=$row['first_name'];
												$last_name=$row['last_name'];
												$id=$row['id'];
												
												 
												 echo "<option value='$id'  style='text-indent: 25px; background-image:url(../data/uploads/".$row['photo']."); background-repeat: no-repeat; background-size: 35px 33px; margin :10px;'>".$first_name." ".$last_name."</option>";
												
											}
										?> 
									</select>
								</div>
							</div>
						</div>
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="datepicker2">
									Date:
								</label>
							</div>
							<div class="form-input col-md-4" >
								<input placeholder="" value="<?php echo $_SESSION['date'];?>" class="col-md-12" type="text" name="datepicker2" id="datepicker2" />
							</div>
						</div>
						
					    <div class="form-row">
							<div class="form-label col-md-2">
								<label for="amnt">
									Amount:
								</label>
							</div>
							<div class="form-input col-md-4" >
								<input placeholder="" value="<?php echo $_SESSION['amnt'];?>" class="col-md-12" type="text" name="amnt" id="amnt" />
							</div>
						</div>
	
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="description">
									Description:
								</label>
							</div>
							<div class="form-input col-md-4">
								<textarea name="description" id="description" class="col-md-12"><?php echo $_SESSION['des'];?></textarea>
								
							</div>
						</div>

					<div class="form-row">
							<div class="form-label col-md-2">
								<label for="bank">
									Select Bank:
								</label>
							</div>
							<div class="form-input col-md-4">
								<div class="form-input">
									<select data-placeholder="Select" id="bank" name="bank" class="chosen-select">
									
										<?php
										if(isset($_SESSION['bank'])){
											$b_id = $_SESSION['bank'];
											$query_b=mysql_query("select id, name from bank where id=$b_id");
											$row_b = mysql_fetch_assoc($query_b);
											$name_b = $row_b['name'];
											$id_b = $row_b['id'];
											echo "<option value='$id_b' />".$name_b;
											}
										else
											echo "<option value='' />Select";
											
										
											$query_bank="select id, name from bank where deleted != 'deleted'";
											$query_bank_run=mysql_query($query_bank);
											while($row=mysql_fetch_assoc($query_bank_run)){
												$name=$row['name'];
												$id=$row['id'];
												
												 echo "<option value='$id' />".$name;
											}
										?> 
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								
								<a href="bank.php" class="primary-bg medium radius-all-2 display-block btn white-modal-80">
									<span class="button-content text-center float-none font-size-11 text-transform-upr">Add New Bank</span>
								</a>

							</div>

							
						</div>

						
						
						<div class="divider"></div>
						
						<button type="submit" name="save" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Insert data into table!">
                            <span class="button-content">
                                Submit
                            </span>
						</button>
						<button type="reset" class="btn large bg-blue-alt" id="demo-form-valid" title="Reset!">
                            <span class="button-content">
                                Reset
                            </span>
                        </button>
					</form>
					<br>
					<div class="divider"></div>

<table class="table" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Type of Income</th>
			<th>Amount </th>
			<th>Bank</th>
			<th>Operation</th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
					$i = 0;
					$query ="select * from income where deleted != 'deleted'";
					if($query_run = mysql_query($query)){
						while($row = mysql_fetch_assoc($query_run)){
							
				
								echo "<tr>";
										$i++;
										$id = $row['id'];
										$income_types_id = $row['income_types_id'];
										$staff_id = $row['staff_id'];
										$bank_id = $row['bank_id'];
										
										$income_types = mysql_query("select * from income_types 
										where id='$income_types_id' and deleted != 'deleted'");
										
										$bank_query = mysql_query("select * from bank
										where id='$bank_id' and deleted != 'deleted'");
										
										while($rows = mysql_fetch_assoc($income_types)){
										//echo $expense_types['name'];
									  echo" <td>$i</td>
									   
									   
									   
									   <td>".$row['date']."</td> 
										<td>".$rows['name']."</td>";
										}
										$am =$row['amount']; 
										$amount=substr($am, 0, -3);
										echo "<td>".$amount." &nbsp&nbsp; Af</td>";
										
										
										while($bank_rows = mysql_fetch_assoc($bank_query)){
										echo "<td>".$bank_rows['name']."</td>";
										}
										
										echo "<td>
											
											<a href='income_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
											 data-placement='top' title='View'>
												<i class='glyph-icon icon-flag'></i>
											</a>
											<a href='income_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>";?>
											<a href='income.php?idd=<?php echo $id; ?>' 
											onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button' 
											data-placement='top' title='Delete'>
												<i class='glyph-icon icon-remove'></i>
											</a>
										</td>
										</tr>
										<?php
								}
					}
				?>
         
	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Type of Expense</th>
			<th>Amount</th>
			<th>Bank</th>
			<th>Operation</th>
			
		</tr>
	</tfoot>
</table>					
					
                </div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->
    </body>
</html>
