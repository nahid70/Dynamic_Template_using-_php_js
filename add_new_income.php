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

	//code insert
	if(isset($_POST['name']) &&  isset($_POST['description'])){
							
						    $name = $_POST['name'];
							$description = $_POST['description'];
							
							$query = "INSERT INTO income_types(name, description, deleted) values('$name', '$description', '')";
							$query_run = mysql_query($query);
							
							header("Location:add_new_income.php" );
	}
	
	//code delete
	if(isset($_GET['idd']))
	{
	
		$sql = "UPDATE income_types
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:add_new_income.php" );
		}
	}
?>
					
					<form id="demo-form-2" class="col-md-10 center-margin" method="post">
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="name">
									Name:
								</label>
							</div>

							<div class="form-input col-md-4">
								<input placeholder="" required class="col-md-12" type="text" name="name" id="name" value="<?php echo $row['name']; ?>" />
							</div>
						</div>
						
						
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="description" >
									Description:
								</label>
							</div>
							<div class="form-input col-md-4">
								<textarea placeholder="" required name="description" id="description" class="col-md-12"><?php echo $row['description']; ?></textarea>
								
							</div>
						</div>
					
						<div class="divider"></div>
						
								
						<button action="add_new_income.php" name="Submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
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
			<th>Type of Expense</th>
			<th>Description </th>
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Operation</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
					$i = 0;
					$query ="select * from income_types where deleted != 'deleted'";
					if($query_run = mysql_query($query)){
						while($row = mysql_fetch_assoc($query_run)){
							$id=$row['id'];
				
								echo "<tr>";
										$i++;
										
									  echo" <td>$i</td>
									   
									   
									   
									   <td>".$row['name']."</td> 
										<td>".$row['description']."</td>";
										
										
										echo "<td class='center'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											<a href='add_new_income_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>";?>
											<a href='add_new_income.php?idd=<?php echo $id; ?>' 
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
			<th>Type of Expense</th>
			<th>Description </th>
			<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Operation</th>
		</tr>
	</tfoot>
</table>					
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
