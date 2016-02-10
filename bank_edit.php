<?php
session_start();
$url = $_SESSION['url'];
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
				<?php include("page-title.php");
				
				
				echo "<div id='page-content'>
				
					<div class='example-box'>
					
					<br><br>";
					
					
						$id = $_GET[id];
						$query = "select * from bank where id = $id";
						
						$query_run = mysql_query($query);
						if($row = mysql_fetch_assoc($query_run)){
						if(isset($_POST['save'])){
							$name = $_POST['name'];
							$datepicker2 = $_POST['datepicker2'];
							$description = $_POST['description'];
							
							$update_query = "UPDATE bank set name = '$name',
								date='$datepicker2', description='$description' where id = '$id'";
								$update_query_run = mysql_query($update_query);
							
						}
						if(isset($_POST['save'])){
							
							if($url == "/pharmacy/www/bank.php")
								header("Location:bank.php" );
							
							else if($url == "/pharmacy/www/bank_report.php")
								header("Location:bank_report.php" );
						}
						
					
					
					echo "<form id='demo-form-2' class='col-md-10 center-margin' method='post'>
					
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label for='name'>
									Name
								</label>
							</div>

							<div class='form-input col-md-3'>";
							if($row['blance']>0 || $row['blance']<0)
							{
								echo"<label>".$row['name']."</label>";
							}
							else{
								echo "<input placeholder='' class='col-md-12' type='text'
								name='name' id='name' value='".$row['name']."' />";
							}
							echo"</div>
						</div>
						
            					
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label for='datepicker2'>
									Date
								</label>
							</div>
							<div class='form-input col-md-3'>
								<input placeholder='' class='col-md-12' type='text' name='datepicker2' id='datepicker2' value='".$row['date']."'/>
							</div>
						</div>
					
						<div class='form-row'>
							<div class='form-label col-md-2'>
								<label for='description'>
									Description
								</label>
							</div>
							<div class='form-input col-md-3'>
								<textarea placeholder='' name='description' id='description' class='col-md-12'>". $row['description']."</textarea>
								
							</div>
						</div>
					
						<div class='divider'></div>
						
								
						<button name='save' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='Update and back to main page!'>
                            <span class='button-content'>
                                Update
                            </span>
						</button>
						<a href='";
							if($url == "/pharmacy/www/bank.php")
								echo 'bank.php';
							
							else if($url == "/pharmacy/www/bank_report.php")
								echo 'bank_report.php';
						
						echo"' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='Cancel and back to main page!'>
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
