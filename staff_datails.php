<?php
include("header.php");

 ?>
	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
	<link rel="stylesheet" href="assets/multiupload/fileupload.css" />
    
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

			 <div class="pad10A">
				
						
	
				<div class="dashboard-panel content-box remove-border bg-green">
                    <div class="content-box-wrapper">
                        <div class="heading medium">
                            	<h4>View Staff Information</h4>
                        </div>
                    </div>
	
						<?php 
						$staff_id=$_GET['staff_id'];
								$select = "SELECT * FROM `staff` where id='$staff_id'";
								$return= mysql_query($select);
								$row = mysql_fetch_assoc($return);
								?>
						
								<table class="table table-condensed">
		
									<tbody>
									
										<tr>
											<td>Name</td>
										   <div class="form-row">
                     
													<td><?php echo $row['first_name'];?></td>
												
											</div>
														    
										
										</tr>
										
										<tr>
											<td>Last Name</td>
											<td><?php echo $row['last_name'];?></td>
										</tr>
										
										<tr>
											<td>Contact</td>
											<td><?php echo $row['contact'];?></td>
										</tr>
										
										<tr>
											<td>Email</td>
											<td><?php echo $row['email'];?></td>
										</tr>
										
										<tr>
											<td>Address</td>
											<td><?php echo $row['address'];?></td>
										</tr>
										
										<tr>
											<td>Type</td>
											<td><?php echo $row['type'];?></td>
										</tr>
										
										<tr>
											<td>Salary</td>
											<td><?php echo $row['sallary'];?></td>
										</tr>
										
										<tr>
											<td>Gender</td>
											<td><?php echo $row['gender'];?></td>
										</tr>
										
										<tr>
											<td>Sheft</td>
											<td><?php echo $row['shift'];?></td>
										</tr>
										
										<tr>
											<td>Working Hours</td>
											<td><?php echo $row['time_in']."-".$row['time_out'];?></td>
										</tr>
										
										<tr>
											<td>Date</td>
											<td><?php echo $row['date'];?></td>
										</tr>
											<tr>
											<td><label>Privilege :</label></td>
											<td>
										
											<?php
											$select_part =  mysql_query("SELECT * FROM `part`"); 
											$part = mysql_fetch_assoc($select_part);
											$part_var = $part['id'];
											
											$select_privilege = "SELECT * from part, access where access.staff_id = '$staff_id' and part.id = access.part_id";
											$return_privilege= mysql_query($select_privilege)or die ("noting select");
											while ($privilege = mysql_fetch_assoc($return_privilege)){
											
												echo $privilege['name']."</br>";
										}
											
											?>
										</td>	
										</tr>
									</tbody>
									
								</table>
								</div>
			
				<div class="divider"></div>
				
					<div class="form-row">
						<div class="form-input col-md-2 col-md-offset-8">
							<!--  <a href="staff_edit.php" class="btn medium primary-bg radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
								<span class="button-content">
									Edit
								</span>
								</a>
							
							  <a href="staff_edit.php" class="btn medium primary-bg radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
								<span class="button-content">
									Remove
								</span>
							</a> -->

						</div>
					</div>
					</div>
				 </div>
			
		</div>
	</div>	
					
				
						</div>
					</div>

            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
