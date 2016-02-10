<?php
include("header.php");

 ?>
	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
	<link rel="stylesheet" href="assets/multiupload/fileupload.css" />
	
	<body style="overflow: hidden;">
	

      
        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="assets/images/loader-dark.gif" alt="" />
        </div>

        <div id="page-wrapper" class="demo-example" >

           <?php
		   include("page-header.php");
		   include("page-sidebar.php");		
		   ?>
		   
		    <div id="page-content-wrapper">


				<?php include("page-title.php");?>
				<form id="demo-form" action="" method="POST" enctype="multipart/form-data" />

				<div class="pad10A">
					<div id="page-content">
					

							<div class="example-box">
								<div class="example-code clearfix">
									<div class="form-label col-md-2">
										<label for="from">
											Date:
										</label>
									</div>
									
									<div class="form-input col-md-4" >
										<div class="form-input">
											<input type="text" size="10" class="fromDate" name="date" />
										</div>
									</div>
									<div class="form-label col-md-2"></div>
									<?php $select_staf=mysql_query("select *from staff");
									
									?>
									<div class="form-input col-md-4" >
										<div class="form-input">
											<select  data-placeholder="Search " id="staff_sel" name="staff_sel" class="chosen-select" onchange ='change3(this.value)'>
												<option value=''/>
												<?php
								
												
												while($row=mysql_fetch_assoc($select_staf)){
													
													$staff_name=$row['first_name'];
													$staff_lname=$row['last_name'];
													$st_id= $row['id'];
												
													echo "<option value='$st_id'  style='text-indent: 25px; background-image:url(../data/uploads/".$row['photo']."); background-repeat: no-repeat; background-size: 35px 33px; margin :10px;'>".$staff_name." ".$staff_lname."</option>";
												
													}
												  ?>
											</select>
										</div>
									</div>
								</div>
								
								
								</br>
								<div class="example-code clearfix">
									<div class="form-label col-md-2">
										<label for="">
											Select Staff:
										</label>
									</div>
									
									 <div class="form-input col-md-2" >
										<div class="form-input">
											<select id="" class="" name="shift" onchange="filter_staff(this.value)">
												<option />All Staff
												<option />Day Staff
												<option />Night Staff
											</select>
										</div>
									</div>
								</div>
								
						<div class="divider"></div>
						
					</div>

					<div class="col-md-12" id="sts">
						<div class="pad10A">
							<div class="example-box">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th width= "10%" class="text-center">Select</th>
											<th width= "30%">Profile</th>
											<th width= "30%" >Status</th>
											<th width= "30%"></th>
										</tr>
									</thead>
									
									<tbody>
									
										<?php
											$select_staff= mysql_query("SELECT * FROM `staff`");
											while ($part_row = mysql_fetch_assoc($select_staff)){
											$id= $part_row['id'];
										
											echo"	
											<tr>
												<td>
													<input type='checkbox' name='check_staff[]' id='' value ='$id'/>
												</td>
												
												
												<td><img src = \"../data/uploads/".$part_row['photo']."\"width= '45px' height= '40px'><br>
													<label for='name:'>".$part_row['first_name']."  ".$part_row['last_name']."</label>
												</td>
												
												<td class='text-center'>
													<div class='form-input col-md-6'>
											
														<select  class='' name='status[]' onchange ='change2(value,$id)'>
															<option>Status</option>
															<option value ='present'>Present</option>
															<option value ='upsent'>Upsent</option>
															<option value ='vocation'>Vocation </option>
														</select>
													</div>
												</td>
												
												<td>
												<div id ='change2$id'>
					
												</div>	
											
												</td>
										
											</tr>";
																			
											}
											?>
											
									</tbody>
							
								</table>
							</div>
							<div class="divider"></div> 
						</div>
					</div>
			
						<?php
			
						if (isset($_POST['submit'])){
						
								$date = $_POST['date'];
								$select= $_POST['check_staff'];
								$x=0;
								$y=0;
								for ($i = 0; $i<sizeof($select);$i++){

									$sel= $_POST['check_staff'][$i];
									$selected_val =$_POST['status'][$i];
								
								 if ($selected_val == "present"){
									$time_in = $_POST['timeIn'][$x];
									$time_out = $_POST['timeOut'][$x];
									$x++;
								}
								
								else {
								   	$time_in = "";
									$time_out = "";
									}
									
								if ($selected_val == "vocation"){
									$no_days = $_POST['day'][$y];
									$decs = $_POST['desc'][$y];
									$y++;
								}
								else {
								  
									$no_days = "";
									$decs = "";
								}
								
									
								$insertQ = mysql_query("INSERT INTO `attendence`(`date`,`time_in`, `time_out`, `no_of_days`, `description`, `staff_id`, `status`) VALUES ('$date','$time_in','$time_out','$no_days','$decs','$sel','$selected_val')");
								
								
							}
							header("location:staff_attendence.php");
						}
					?>
					
					
					<button type ="submit"class="btn primary-bg medium" name ="submit">
						<span class="button-content">Submit </span>
					</button>

				

					</form>
				</div>						
			</div><!-- #page-content -->
        </div><!-- #page-main -->
        

    </body>
</html>
