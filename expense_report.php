<?php
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

	//code delete
	if(isset($_GET['idd']))
	{
	
		$sql = "UPDATE expense
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:expense_report.php" );
		}
	
	}
	//end delete
	
?>
	
					

					<form id="demo-form-2" action="expense_report.php" class="col-md-10 center-margin" method="post" />
						<div class="form-row">
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
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="type">
									Type of Expense:
								</label>
							</div>
							<div class="form-input col-md-4">
								<div class="form-input">
									<select data-placeholder="Select" id="type" name="type" class="chosen-select">
										<option value='' />Select
										<?php
											$query_type="select id, name from expense_types where deleted != 'deleted'";
											$query_type_run=mysql_query($query_type);
											while($row=mysql_fetch_assoc($query_type_run)){
												$name=$row['name'];
												$id=$row['id'];
												
												 echo "<option value='$id' />".$name;
											}
										?> 
									</select>
								</div>
							</div>
							
						</div>
	
						<div class="divider"></div>
						
						<button type="submit" name="save" class="btn large primary-bg text-transform-upr font-size-11" id="save" title="Validate!">
                            <span class="button-content">
                                Submit
                            </span>
						</button>
						
					</form>

					<div class="divider"></div>
					<br><br><br><br>
					
<table class="table" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Type of Expense</th>
			<th>Amount </th>
			<th>Staff</th>
			<th>Bank</th>
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Operation</th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
					$i = 0;
					$query ="select * from expense where deleted != 'deleted'";
					if($query_run = mysql_query($query)){
						while($row = mysql_fetch_assoc($query_run)){
							
				
								echo "<tr>";
										$i++;
										$id = $row['id'];
										$expense_types_id = $row['expense_types_id'];
										$staff_id = $row['staff_id'];
										$bank_id = $row['bank_id'];
										
										$expense_types = mysql_query("select * from expense_types where id='$expense_types_id' and deleted != 'deleted'");
										$staff_query = mysql_query("select * from staff where id='$staff_id' and deleted != 'deleted'");
										$bank_query = mysql_query("select * from bank where id='$bank_id' and deleted != 'deleted'");
										while($rows = mysql_fetch_assoc($expense_types)){
										//echo $expense_types['name'];
									  echo" <td>$i</td>
									   
									   
									   
									   <td>".$row['date']."</td> 
										<td>".$rows['name']."</td>";
										}
										
										echo "<td>".$row['amount']."</td>";
										
										while($staff_rows = mysql_fetch_assoc($staff_query)){
										echo "<td class='center'>".$staff_rows['first_name']. '&nbsp&nbsp&nbsp' .$staff_rows['last_name']."</td>";
										}
										
										while($bank_rows = mysql_fetch_assoc($bank_query)){
										echo "<td class='center'>".$bank_rows['name']."</td>";
										}
										
										echo "<td class='center'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											<a href='expense_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
											 data-placement='top' title='View'>
												<i class='glyph-icon icon-flag'></i>
											</a>
											<a href='expense_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>";?>
											<a href='expense_report.php?idd=<?php echo $id; ?>' 
											onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
											data-placement='top' title='Delete'>
												<i class='glyph-icon icon-remove'></i>
											</a>
										</td>
										</tr><?php
									
								}
					}
				?>
         
	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Type of Expense</th>
			<th>Amount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
			<th>Staff</th>
			<th>Bank</th>
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Operation</th>
			
		</tr>
	</tfoot>
</table>
 
                </div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->
    </body>
</html>
