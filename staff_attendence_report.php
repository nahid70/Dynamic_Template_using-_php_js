<?php
//require_once ("../lib/db.php");
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
			<form id="demo-form" action="staff_attendence_report.php" method="POST" enctype="multipart/form-data" />

			<div class="pad10A">
				<div id="page-content">
				
					<div class="example-box">
						<div class="example-code clearfix">
							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="from">
										From:
									</label>
								</div>
								<div class="form-input">
									<input type="text" size="10" class="fromDate" name="from_date" />
								</div>
							</div>

							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="to">
										To:
									</label>
								</div>
								<div class="form-input">
									<input type="text" size="10" class="toDate" name="to_date" />
								</div>
							</div>
						</div>
					</div>
				
				
					<div class="example-code clearfix">
						<div class="form-label col-md-2">
							<label for="">
								Select Staff:
							</label>
						</div>
						
						 <div class="form-input col-md-2" >
							<div class="form-input">
								<select id="" class="" name="shift">
									<option />All Staff
									<option />Day Staff
									<option />Night Staff
								</select>
							</div>
						</div>
					</div>
				</br>
								
					<div class="example-code clearfix">
						<div class="form-label col-md-2">
							<label for="">
								Select Shift:
							</label>
						</div>
						
						<div class="form-input col-md-2" >
							<div class="form-input">
								<select id="" class="" name="staff_status">
									<option/>Present
									<option/>Upsent
									<option/>Vocation
								</select>
							</div>
						</div>
					</div>
				</div>	
				</br>
				</br>
				<div class="form-input col-md-4" >
					<button type ="submit"class="btn primary-bg medium" name ="submit">
						<span class="button-content">Submit </span>
					</button>
				</div>
			</div>
					
			</br>	
			<div class="divider"></div>
			
				
			<div class="pad10A">
				<div class="example-box">
					<div class="example-code">
						<table class="table table-condensed">
							<thead>
							
								<tr>
									<th>No</th>
									<th>Profile</th>
									<th>Present</th>
									<th>Upsent</th>
									<th>Vocation</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							

			<?php
			
				if (isset($_POST['submit'])){
	
				$from = $_POST['from_date'];
				$to = $_POST['to_date'];
				$shift = $_POST['shift'];
	
				
				$select = mysql_query("select * from staff ")or die
				("nothing selected");
				$i=0;
				while ($row = mysql_fetch_assoc($select)){
		
					$staff_name = $row['first_name'];
					$staff_status = $row['status'];
					$st_id = $row['staff_id'];
					$id = $row['id'];
					
					
					
						
					
					//echo $staff_status."<br>";
					
					$i++;
			
				
							echo 	"<tr><td>$i</td>
									<td><img src = \"../data/uploads/".$row['photo']."\"width= '45px' height= '40px'><br>".$staff_name."</td>
									
									";
					$staff_present = mysql_query("select * from attendence where staff_id = $id 
					and status='present' and date >= '$from' and date <= '$to' ");
						$p=0;
						while($row_present = mysql_fetch_assoc($staff_present ))
							$p++;
							echo"<td>".$p."</td>";
							
					$staff_absent = mysql_query("select * from attendence where staff_id = $id 
					and status='absent' and date >= '$from' and date <= '$to' ");
						$up=0;
						while($row_absent = mysql_fetch_assoc($staff_absent ))
							$up++;	
							echo "<td>".$up."</td>";
							
					$staff_vocation = mysql_query("select * from attendence where staff_id = $id 
					and status='vocation' and date >= '$from' and date <= '$to' ");
						$vo=0;
						while($row_vocation = mysql_fetch_assoc($staff_vocation ))
							$vo++;
							echo"<td>".$vo."</td>
							
									<td>
										<a href='staff_datails.php?staff_id=$staff_id' class='btn small bg-yellow tooltip-button' data-placement='top' title='View'>
											
											<i class='glyph-icon icon-flag'></i>
										</a>
										<a href='javascript:;' class='btn small bg-blue-alt tooltip-button' data-placement='top' title='Edit'>
											<i class='glyph-icon icon-edit'></i>
										</a>
										
									</td>";
								}
							}
						?>
		
								</tr>
							 
							</tbody>
						</table>

					</div>
						
				</div>
				<div class="divider"></div> 
			</div>
		</div>
	</form>
		</div>						
	</div><!-- #page-content -->
</div><!-- #page-main -->
</body>
</html>
