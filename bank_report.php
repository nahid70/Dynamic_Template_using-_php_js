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
			header("Location:bank_report.php" );
		}
	
	}
	//end delete
?>					
					
					<form id="demo-form-2" action="bank_report.php" class="col-md-10 center-margin" method="post" />
					
					<div class="form-row">
							<div class="form-label col-md-2">
								<label for="bank">
									Select Bank:
								</label>
							</div>
							<div class="form-input col-md-3">
								<div class="form-input">
									<select data-placeholder="Select" id="bank" name="bank" class="chosen-select">
									<option value='all_bank' />All Banks
										<?php
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
							
					</div>

					
						<div class="divider"></div>
						
						<button type="submit" id="submit" name="submit" class="btn large primary-bg text-transform-upr font-size-11" title="Show data into table!">
                            <span class="button-content">
                                Submit
                            </span>
						</button>
					</form>
					<br>
					<div class="divider"></div>


            <?php if(isset($_POST['submit'])){
				echo"<table class='table' id='example1'>";
			
			$i = 0;
					$bank_id = $_POST['bank'];
					if($bank_id == 'all_bank'){
						$query ="select * from bank where deleted != 'deleted'";
					}
					else{
						$query ="select * from bank where deleted != 'deleted' and id='$bank_id' ";
					}
					$query_run = mysql_query($query);
				
			echo"<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Blance</th>
					<th>Type</th>
					<th>Date</th>>
					<th>Operation</th>
                </tr>
            </thead>
            <tbody >";
					
						while($row = mysql_fetch_assoc($query_run)){
							
				
								echo "<tr>";
										$i++;
										$id = $row['id'];
									  echo" <td>$i</td>
									   
									   
									   
									   <td class='font-bold text-left'>".$row['name']."</td> 
										<td class='font-bold text-left'>
										<div "; 
										
										if($row['blance']>0){
											echo"class='label bg-green'";
										}
										else if($row['blance']<0){
											echo"class='label bg-red'";
										}
										else{
											echo"class='label bg-blue'";
										}
										
										echo">".$row['blance']."</div>
										</td>
										<td class='font-bold text-left'>".$row['type']."</td>
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
											<a  href='bank_report.php?idd=<?php echo $id; ?>' 
											onclick="return confirm('Are you sure you want to delete it!');" class='btn small bg-red tooltip-button'
											data-placement='top' title='Delete'>
												<i class='glyph-icon icon-remove'></i>
											</a>
										</td>
										</tr>
										<?php
								}
					
				?>
              
			</tbody>
			
			<?php
			
			
			echo "</table>";
			}?>
			
        						
					
                </div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->
    </body>
</html>
