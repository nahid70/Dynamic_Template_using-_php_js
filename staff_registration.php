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

				<div class="pad10A">
				
					<div class="form-label col-md-12">
						<h4>
							Staff Information
						</h4>
					</div>
					<div class="divider"></div>

				<form id="demo-form" action="staff_registration.php" method="post" enctype="multipart/form-data" />
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Name:
							</label>
						</div>
						<div class="form-input col-md-4">
							<div class="form-input">
								<input type="text" id="name" name="name" data-type="text" data-trigger="change" data-required="true" class="parsley-validated" />
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Last Name:
							</label>
						</div>
							<div class="form-input col-md-4">
								<input type="text" id="lname" name="lname" data-type="text" data-trigger="change" data-required="true" class="parsley-validated" />
							</div>
					</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Contact:
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="contact" name="contact" data-type="text" data-trigger="change" data-required="true" class="parsley-validated" />
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Email:
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="email" name="email" data-type="email" data-trigger="change" data-required="true" class="parsley-validated" />
						</div>
					</div>
				
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="" class="label-description">
								Address:
							</label>
						</div>
						<div class="form-input col-md-4">
							<textarea id="address" name="address" data-trigger="keyup" data-rangelength="[20,200]" class="parsley-validated"></textarea>
						</div>
					</div>
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Type:
							</label>
						</div>
						<div class="form-input col-md-10">
							<select id="" class="col-md-2" name="type">
								<option />Admin
								<option />Staff
							   
							</select>
						</div>
					</div>
						
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								User Name:
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="username" name="username" data-type="text" data-trigger="change" data-required="true" class="parsley-validated" />
						</div>
					</div>

					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Password :
							</label>
						</div>
							<div class="form-input col-md-4">
								<input type="password"  name="password" id="password" />
							</div>
					</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
							   Confirm Password :
							</label>
						</div>
							<div class="form-input col-md-4">
								<input type="password"  name="conpassword" id="conpassword" />
							</div>
					</div>
					
						<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Gender:
							</label>
						</div>
						<div class="form-checkbox-radio col-md-10">
							<input type="radio" name="gender" id="gender" checked="" value ="male"/>
							<label for="">Male</label>

							<input type="radio" name="gender" id="gender" value= "female"/>
							<label for="">Female</label>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Salary:
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="salary" name="salary" data-type="int" data-trigger="change" data-required="true" class="parsley-validated" />
						</div>
					</div>
					
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="">
								   Date :
								</label>
							</div>
								<div class="form-input col-md-4">
									<input type="text"  name="date" id="date" class="fromDate"/>
								</div>
						</div>
					
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="">
								Sheft:
							</label>
						</div>
						<div class="form-input col-md-10">
							<select id="" class="col-md-2" name="sheft">
								<option />Day
								<option />Night
							   
							</select>
						</div>
					</div>
				
			
					<div class="form-row">
						<div class="form-label col-md-2">
							<label for="timepicker_24">
								Working Hours:
							</label>
						</div>
					</div>
						<div class="example-code clearfix">
							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="from">
									From:
									</label>
								</div>
							  <div class="form-input bootstrap-timepicker dropdown">
								<input class="timepicker input" id="timepicker_24" name="from" type="text" />
							  </div>
							</div>

							<div class="form-row col-lg-3 float-left form-vertical">
								<div class="form-label">
									<label for="to">
										To:
									</label>
								</div>
								  <div class="form-input bootstrap-timepicker dropdown">
										<input class="timepicker input" id="timepicker_24" name="to" type="text" />
								  </div>
							</div>
						</div>	
			
						<div class="form-row">
							<div class="form-label col-md-2">
							<span class="btn medium bg-green fileinput-button">
							  <span class="button-content">
								<i class="glyph-icon icon-plus"></i>
								Upload photo
							  </span>
								<input type="file" name="files"  />
							</span>
							</div>
						</div>
					
				</br>
			<div class="form-label col-md-12">
				<h4>
				Staff Privilege
				</h4>
				
				<div class="divider"></div> 
            </div>	

			 <div class="form-checkbox-radio col-md-12">
					<div class="checkbox-radio">		
				<table>
				<?php
					$select_parts= mysql_query("select * from part");
					while ($part_row = mysql_fetch_assoc($select_parts)){
 
	                 echo "<tr><td> <input type='checkbox' name='part[]' id='part'  value =".$part_row['id']."/></td>
					       <td class='font-bold text-left'><label for=''>".$part_row['name']."</label></td>";
			
					}
				?>
				</table>
                    </div>
			
                <div class="divider mrg10T mrg10B"></div>
            </div>
				
			<div class="form-row">
				<div class="form-input col-md-8 col-md-offset-8">
					<button type ="submit"class="btn primary-bg medium" name ="submit">
						<span class="button-content">Submit </span>
					</button>
					
					<button type ="submit"class="btn primary-bg medium" name= "reset">
						<span class="button-content">Reset</span>
					</button>
				</div>
			</div>
			
		</form>
		  
	
	<?php
	
	$target_dir = "../data/uploads/";
	$target_file = $target_dir . basename($_FILES["files"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	if(isset($_POST['submit'])){
	
	$name		= $_POST['name'];
	$lname		= $_POST['lname'];
	$contact	= $_POST['contact'];
	$email		= $_POST['email'];
	$address	= $_POST['address'];
	$type		= $_POST['type'];
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$conpassword= $_POST['conpassword'];
	$gender		= $_POST['gender'];
	$salary		= $_POST['salary'];
	$date		= $_POST['date'];
	$sheft		= $_POST['sheft'];
	$from		= $_POST['from'];
	$to			= $_POST['to'];

	$attachment = $name.".".$imageFileType;

	$check = getimagesize($_FILES["files"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	
	// Check file size
	if ($_FILES["files"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	}
	else{
	move_uploaded_file($_FILES['files']['tmp_name'],$target_dir.$attachment); 
	}

	$info_query = "INSERT INTO staff(first_name, last_name, contact, email,address, shift, gender,sallary,date, username,password, type,photo,time_in, time_out) VALUES('$name','$lname','$contact','$email','$address','$sheft','$gender','$salary','$date','$username','$password','$type','$attachment','$from','$to')";
	@mysql_query($info_query)or die("not inserted");
	

		$select = "SELECT id FROM `staff` where username='$username'";
	$return= mysql_query($select)or die ("noting select");
	$row = mysql_fetch_assoc($return);
	$staff_id=$row['id'];

	
	
	$parts = $_POST['part'];
	
	foreach ($parts as $part) {

		 $insert_query= mysql_query("INSERT INTO access(statuse,staff_id,part_id) VALUES ('1','$staff_id','$part')");
}
}
	$select = "SELECT * FROM `staff` order by id desc";
	$return= mysql_query($select)or die ("noting select");
	$row = mysql_fetch_assoc($return);
	$staff_id = $row['id'];
	
?>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed">
            <thead>
			
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Salary</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
			
                <tr>
                    <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                    <td class="font-bold text-left"><?php echo $row['contact'];  ?></td>
                    <td><a href="javascript:;"><?php echo $row['sallary']; ?></a></td>
                    <td><img src = <?php echo "../data/uploads/".$row['photo']; ?> width= "40px" height= "30px"></td>
                    <td>
                        <a href="staff_datails.php?staff_id=<?php echo $staff_id;?>" class="btn small bg-yellow tooltip-button" data-placement="top" title="View">
                            
							<i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
             
            </tbody>
        </table>

    </div>
    
</div>

	</div>

            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
	

</html>
