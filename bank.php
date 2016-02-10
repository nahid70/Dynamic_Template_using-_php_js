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
				<?php include("page-title.php");?>
				
				
				<div id="page-content">
				
					<div class="example-box">
					
					
					<br><br>
					
					
<?php
	 $_SESSION['url'] = $_SERVER["SCRIPT_NAME"];
	//code insert
	if(isset($_POST['save'])){
						
							$name = $_POST['name'];
							
							$date = $_POST['datepicker2'];
							$description = $_POST['description'];
							
							$query = "INSERT INTO bank (name, blance, receive, payment, date, description, deleted) values
							('$name', '', '', '', '$date', '$description', '')";
								$query_run = mysql_query($query);
								
								header("Location:bank.php" );
								
							
							
	}	
	
	//end insert
	
	//code delete
	if(isset($_GET['idd']))
	{
	
		$sql = "UPDATE bank
				SET
					deleted = 'deleted'
				WHERE id = '$_GET[idd]'";
		$res = mysql_query($sql);
		if($res)
		{
			header("Location:bank.php" );
		}
	
	}
	//end delete
		

	if(isset($_POST['showtable']))
	{
		
		//exit();
	}

?>
					

<script type="text/javascript" src="../assets/js/minified/core/jquery-1.11.1.js"></script>
					
					<form id="demo-form-2" action="bank.php" class="col-md-10 center-margin" method="post" >
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="name">
									New Bank:
								</label>
							</div>
							<div class="form-input col-md-4" >
								<input required placeholder="" class="col-md-12" type="text" name="name" id="name" />
							</div>
						</div>
						
								
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="datepicker2">
									Date:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input required placeholder="" class="col-md-12" type="text" name="datepicker2" id="datepicker2" />
							</div>
						</div>
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="description">
									Description:
								</label>
							</div>
							<div class="form-input col-md-4">
								<textarea name="description" id="description" class="col-md-12"></textarea>
								
							</div>
						</div>
					
						<div class="divider"></div>
						
								
						<button type="submit" class="btn large primary-bg text-transform-upr font-size-11" name="save" id="save" title="Validate!">
                            <span class="button-content">
                                Submit
                            </span>
						</button>
						
						<button type="reset" class="btn large bg-blue-alt" id="" title="Validate!">
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
                    <th>Name</th>
                    <th>Blance</th>
					<th>Receive</th>
					<th>Payment</th>
					<th>Date</th>
					<th>Operation</th>
                </tr>
            </thead>
            <tbody >
				<?php
					$i = 0;
					$query ="select * from bank where deleted != 'deleted' order by date desc";
					if($query_run = mysql_query($query)){
						while($row = mysql_fetch_assoc($query_run)){
							
				
								echo "<tr>";
										$i++;
										$id = $row['id'];
									  echo" <td>$i</td>
									   
									   
									   
										<td class='font-bold text-left'>".$row['name']."</td>";
										echo"<td class='font-bold text-left'><div style='font:14px bold;' "; 
										
										if($row['blance']>0){
											echo"class='label bg-green'";
										}
										else if($row['blance']<0){
											echo"class='label bg-red'";
										}
										else{
											echo"class='label bg-blue'";
										}
										$b =$row['blance']; 
										//$bl= ltrim ($b, '-');
										$blance=substr($b, 0, -3);
										echo">".$blance." &nbsp&nbsp; Af</div></td>
										<td class='font-bold text-left'><div style='font:14px bold;' ";
										if($row['blance']==0){
											echo"class='label bg-blue'";
										}
										else{
											echo"class='label bg-green'";
										}
										echo ">".$row['receive']." &nbsp&nbsp; Af</div></td>
										<td class='font-bold text-left'><div style='font:14px bold;' ";
										if($row['blance']==0){
											echo"class='label bg-blue'";
										}
										else{
											echo"class='label bg-red'";
										}
										echo ">"; if($row['payment']!= 0){ echo '-'; } echo $row['payment']; echo" &nbsp&nbsp; Af</div></td>
										<td class='font-bold text-left'>".$row['date']."</td>
										
										
										<td>
										
											
											<a href='bank_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
											 data-placement='top' title='View'>
												<i class='glyph-icon icon-flag'></i>
											</a>
											<a href='bank_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
											data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>";?>
											<a  href='bank.php?idd=<?php echo $id; ?>' 
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
			
			
</table>
					
                </div>
           


				
		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
