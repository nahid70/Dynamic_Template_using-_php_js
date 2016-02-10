<?php
session_start();
ob_start();
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
				<?php include("page-title.php");?>
				
				
				<div id="page-content">
				
					<div class="example-box">
					
					
					<br><br>
					
					
<?php
	 $_SESSION['url'] = $_SERVER["SCRIPT_NAME"];
	//code delete
	if(isset($_GET['idd_incom']))
	{
	
		$sql = "UPDATE income
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd_incom]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:expense_income_report.php" );
		}
	
	}
	if(isset($_GET['idd_expense']))
	{
	
		$sql = "UPDATE expense
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd_expense]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:expense_income_report.php" );
		}
	
	}
	//end delete
		
?>
	
<?php
$_SESSION['from'] = $_POST['from'];
$_SESSION['to'] = $_POST['to'];
?>	

					<form id="demo-form-2" action="expense_income_report.php" class="col-md-10 center-margin" method="post" >
					
						<div class="example-code clearfix">

							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="from">
										From:
									</label>
								</div>
								<div class="form-input">
									<input type="text" value="<?php echo $_SESSION['from']; ?>" size="10" class="fromDate" name="from" />
								</div>
							</div>

							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="to">
										To:
									</label>
								</div>
								<div class="form-input">
									<input type="text" value="<?php echo $_SESSION['to']; ?>" size="10" class="toDate" name="to" />
								</div>
							</div>

						</div>
						
						<br><br>

						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="selct_type">
									Select Type:
								</label>
							</div>
							<div class="form-input col-md-3">
							
								<select id="selct_type" onchange="select_bank(this.value)" class="col-md-12" name="selct_type">
									<option value=''/>Select
									<option value='expense'/>Expense
									<option value='income'/>Income
									
								</select>
							</div>
							
						</div>
					
						<div id="type2">
							<div class="form-row">



								<div class="form-label col-md-2">
									<label for="bank">
									   Select Bank:
									</label>
								</div>
								<div id="bank" name="bank" class="form-input col-md-3">
								
									<div class="form-input">
										<select id="type2" name="type2" data-placeholder="Select" 
											class="chosen-select">
										</select>
									</div>
							  </div>
						
							</div>
						</div>


					
						<div class="divider"></div>
						
								
						<button type="submit" name="save" class="btn large primary-bg text-transform-upr font-size-11" id="save" title="Show data into table!">
                            <span class="button-content">
                                Submit
                            </span>
						</button>
						
	</form>				
					
					<br>
					<div class="divider"></div>
					
	<div>
<table class='table' id='example1'>

	
				<?php
				
					if(isset($_POST['save'])){
					
							 $from = $_POST['from'];
							 $to = $_POST['to'];
							 $i = 0;
							//echo $_SESSION['select_bank_id'];
							if($_POST['selct_type'] == 'income')
							{
							
							echo"
								<thead>
									<tr>
										<tr>
												<th>No</th>
												<th>Bank</th>
												<th>Income</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Operation</th>
										</tr>
								</thead>
								<tbody>
							";
										
									
							
								echo '<br>Selected income types between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
								
								if($_POST['type2'] == 'all_bank'){
								$query ="select * from income where date>= '$from' and date<='$to' and deleted != 'deleted' order by date desc";
								}
								else{
									$bank_id =  $_POST['type2'] ;
									$query ="select * from income where bank_id='$bank_id' and date>= '$from' and date<='$to' and deleted != 'deleted' ";
								}
								$query_run = mysql_query($query);
								while($row = mysql_fetch_assoc($query_run)){
									
									$bank_id = $row['bank_id'];
									$income_id = $row['income_types_id'];
										echo"
												<tr>";
												$i++;
												$id = $row['id'];
											  echo" <td>$i</td>
											   ";
													$bank_query = mysql_query("select * from bank where id= '$bank_id'");
													$bank_row = mysql_fetch_assoc($bank_query);
														echo"<td class='font-bold text-left'>".$bank_row['name']."</td> 
												";
													$income_type_query = mysql_query("select * from income_types where id= '$income_id'");
													$income_type_row = mysql_fetch_assoc($income_type_query);
														echo"<td class='font-bold text-left'>".$income_type_row['name']."</td>
												<td class='font-bold text-left'>".$row['amount']."</td>
												<td class='font-bold text-left'>".$row['date']."</td>
												
												<td>
												
													
													<a href='income_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
													 data-placement='top' title='View'>
														<i class='glyph-icon icon-flag'></i>
													</a>
													<a href='income_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
													data-placement='top' title='Edit'>
														<i class='glyph-icon icon-edit'></i>
													</a>";?>
													<a href='expense_income_report.php?idd_incom=<?php echo $id; ?>' 
													onclick="return confirm('Are you sure you want to delete it!');"
													class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
													data-placement='top' title='Delete'>
														<i class='glyph-icon icon-remove'></i>
													</a>
												</td>
												
												</tr>
												
												<?php
												
										}
								echo "</tbody>";	
								
							}
							
							
							else if($_POST['selct_type'] == 'expense')
							{
							echo"
										<thead>
											<tr>
												<th>No</th>
												<th>Bank</th>
												<th>Expenses</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Operation</th>
											</tr>
										</thead>
										<tbody>
							";
							
								echo '<br>Selected expense types between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
								if($_POST['type2'] == 'all_bank'){
								$query ="select * from expense where date>= '$from' and date<='$to' and deleted != 'deleted' order by date desc";
								}
								else{
									$bank_id =  $_POST['type2'] ;
									$query ="select * from expense where bank_id='$bank_id' and date>= '$from' and date<='$to' and deleted != 'deleted' ";
								}
								$query_run = mysql_query($query);
								while($row = mysql_fetch_assoc($query_run)){
									$bank_id = $row['bank_id'];
									$expense_id = $row['expense_types_id'];
						
										echo "
										
												<tr>";
												$i++;
												$id_exp = $row['id'];
											  echo" <td>$i</td>
											   ";
													$bank_query = mysql_query("select * from bank where id= '$bank_id'");
													while($bank_row = mysql_fetch_assoc($bank_query))
														echo"<td class='font-bold text-left'>".$bank_row['name']."</td> 
												";
													$expense_type_query = mysql_query("select * from expense_types where id= '$expense_id'");
													while($expense_type_row = mysql_fetch_assoc($expense_type_query))
														echo"<td class='font-bold text-left'>".$expense_type_row['name']."</td>
												<td class='font-bold text-left'>".$row['amount']."</td>
												<td class='font-bold text-left'>".$row['date']."</td>
												
												<td>
												
													
													<a href='expense_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
													 data-placement='top' title='View'>
														<i class='glyph-icon icon-flag'></i>
													</a>
													<a href='expense_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
													data-placement='top' title='Edit'>
														<i class='glyph-icon icon-edit'></i>
													</a>";?>
													<a href='expense_income_report.php?idd_expense=<?php echo $id_exp; ?>' 
													onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
													data-placement='top' title='Delete'>
														<i class='glyph-icon icon-remove'></i>
													</a>
												</td>
												
												</tr>
												
												<?php
										}
									
								echo "</tbody>";
							}
							
							
						
					//header("Location:expense_income_report.php" );
					}
					
				//echo "</table>";	
				?>
				
			</table>
      </div>
					
                </div>
           

				
		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
