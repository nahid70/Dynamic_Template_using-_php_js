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
				
					<div class="example-box">
					
					
					<br><br>
					
					<?php
						$id = $_GET[id];
						$query = "select * from income_types where id = $id";
						$id;
						$query_run = mysql_query($query);
						if($row = mysql_fetch_assoc($query_run)){
						
						$name = $row['name'];
						$description = $row['description'];
						
						
						if(isset($_POST['save'])){
							$name = $_POST['name'];
							$description = $_POST['description'];
							
							$update_query = mysql_query("UPDATE income_types set name = '$name',
							 description='$description' 
							where id = '$id'");
								
							
							
							
							
								header("Location:add_new_income.php" );
								
								
						}
						
						
					
				
					echo"<form id='demo-form-2' class='col-md-10 center-margin' method='post'>
					
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label for='name'>
									Type of Income:
								</label>
							</div>

							<div class='form-input col-md-4'>
								<input placeholder='' class='col-md-12' type='text' name='name' id='name' value='".$name."' />
							</div>
						</div>
						
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label for='description'>
									Description:
								</label>
							</div>

							<div class='form-input col-md-4'>
							
								<textarea placeholder='' class='col-md-12' type='textarea' name='description' id='description' value='' >". $description ."</textarea>
							</div>
						</div>
						
						
						<div class='divider'></div>
						
						<button name='save' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='Validate!'>
                            <span class='button-content'>
                                Update
                            </span>
						</button>
						<a href='add_new_income.php' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='Validate!'>
                            <span class='button-content'>
                                Cancel
                            </span>
                        </a>
						
					</form>";	
					}
					?>
					
						
					
					

					
				
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
