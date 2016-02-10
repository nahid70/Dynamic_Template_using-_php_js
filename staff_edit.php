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
				<form method="post" action="ph_staff_report.php">

			 <div class="pad10A">

				<div class="dashboard-panel content-box remove-border bg-green">
                    <div class="content-box-wrapper">
                        <div class="heading medium">
                            	<h4>Edit Staff Information</h4>
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
                    
														<td><input type="text" value="<?php echo $row['first_name'];?>" name="name" id="" style ="border:none;"/></td>
											
											</div>
														    
										
										</tr>
										
										<tr>
											<td>Last Name</td>
											<td><input type="text" value="<?php echo $row['last_name'];?>" name="lname" id="" style ="border:none;"/></td>
										</tr>
										
										<tr>
											<td>Contact</td>
											<td><input type="text" value="<?php echo $row['contact'];?>" name="contact" id="" style ="border:none;"/></td>
										</tr>
										
										<tr>
											<td>Email</td>
											<td><input type="text" value="<?php echo $row['email'];?>" name="email" id="" style ="border:none;"/></td>
										</tr>
										
										<tr>
											<td>Address</td>
											<td><input type="text" value="<?php echo $row['address'];?>" name="address" id="" style ="border:none;"/></td>

										</tr>
										
										<tr>
											<td>Type</td><td>
											<select id="" class="col-md-4" name="type">
												<option /><?php echo $row['type'];?>
												<option />Staff
											</select></td>
										
											</td>
										</tr>
										
										<tr>
											<td>Salary</td>
											<td><input type="text" value="<?php echo $row['sallary'];?>" name="salary" id="" style ="border:none;"/></td>
										</tr>
										
										<tr>
											<td>Gender</td>
											<td>
												<div class="form-checkbox-radio col-md-10">
													<input type="radio" name="gender" id="gender" checked="" value ="male"/>
													<label for="">Male</label>

													<input type="radio" name="gender" id="gender" value= "female"/>
													<label for="">Female</label>
												</div>
											</td>
										</tr>
										
										<tr>
											<td>Sheft</td><td>
											<select id="" class="col-md-4" name="sheft">
												<option /><?php echo $row['shift'];?>
												<option />Night
											</select></td>
										</tr>
										
										<tr>
											<td>Working Hours</td>
										  <div class="form-input bootstrap-timepicker dropdown">
											<td>
												<div class="example-code clearfix">
							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="from">
									From:
									</label>
								</div>
							  <div class="form-input bootstrap-timepicker dropdown">
								<input class="timepicker input" id="timepicker_24" name="from" type="text" value= '<?php echo $row['time_in'];?>'/>
							  </div>
							</div>

							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="to">
										To:
									</label>
								</div>
								  <div class="form-input bootstrap-timepicker dropdown">
										<input class="timepicker input" id="timepicker_24" name="to" type="text"  value='<?php echo $row['time_out'];?>'/>
								  </div>
							</div>
								</div>
											</td>
											</tr>
										
										<tr>
											<td>Date</td>
											<td>
										
							
								<div class="form-input col-md-4">
									<input type="text"  name="date" id="date" class="fromDate" value='<?php echo $row['date'];?>'/>
								</div>
					
											
											</td>
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
									<tfoot>
									</tfoot>
								</table>
							</div>
						
							
						
							
						<div class="divider"></div>
					<div class="form-row">
						<div class="form-input col-md-2 col-md-offset-10">
							  <a href="staff_edit.php" class="btn medium primary-bg radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
							
									<button type ="submit"class="btn primary-bg medium" name ="submit">
										<span class="button-content">Submit </span>
									</button>
												
								</a>
	
						</div>
					</div>
						</form>
						<?php
							if(isset($_POST['submit'])){
							
						$name		= $_POST['name'];
						$lname		= $_POST['lname'];
						$contact	= $_POST['contact'];
						$email		= $_POST['email'];
						$address	= $_POST['address'];
						$type		= $_POST['type'];
						$gender		= $_POST['gender'];
						$salary		= $_POST['salary'];
						$date		= $_POST['date'];
						$sheft		= $_POST['sheft'];
						$from		= $_POST['from'];
						$to			= $_POST['to'];
						
							
							
							$update_query ="UPDATE `staff` SET `first_name`= '$name',`last_name`='$lname',`contact`='$contact',`email`='$email',`address`='$address',`shift`='$sheft',`gender`='$gender',`sallary`='$salary',`date`='$date',`type`='$type',`time_in`='$from',`time_out`='$to' WHERE id='$staff_id'";
							mysql_query($update_query);
							header("location : streprot.php");
							
							}
							
							?>
					
					</div>

            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
