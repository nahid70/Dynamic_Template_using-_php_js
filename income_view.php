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
				<?php include("page-title.php");?>
				
				
				<div id="page-content">
				
					<div class="example-box">
					
					
					<br><br>
					
					<?php
						$id = $_GET['id'];
						$query = "select * from income where id = $id";
						
						$query_run = mysql_query($query);
						while($row = mysql_fetch_assoc($query_run)){
						$id_income =  $row['income_types_id'];
						$id_staff =  $row['staff_id'];
						$id_bank =  $row['bank_id'];
						
					
				echo"<form id='demo-form-2' action='income.php' class='col-md-10 center-margin' method='post'>
					
					<div class='form-row'>
							
							
								
									";
									  $query_staff = mysql_query("select id,photo , first_name, last_name from staff where id ='$id_staff' ");
						
									  while($row_staff = mysql_fetch_assoc($query_staff)){
									  echo "<label style='text-indent: 25px; background-image:url(../data/uploads/".$row_staff['photo'].");
									  background-repeat: no-repeat; background-size: 80px 60px; margin :10px; margin-left:-70px; padding:50px; padding-top:30px;'>"."
									  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row_staff['first_name']."&nbsp&nbsp&nbsp".
									  $row_staff['last_name']."</label>
									  <label></label>";
									  } echo"
								
							
							
						</div>
						<br><br>
					
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Date
								</label>
							</div>
							<div class='col-md-2'>
								<label>".
									 $row['date']
								."</label>
							</div>
						</div>
					
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Type of Income
								</label>
							</div>

							<div class='col-md-2'>
								<label>
									  ";
									  $query_income_type = mysql_query("select id, name from income_types where id ='$id_income' ");
						
									  while($income_type = mysql_fetch_assoc($query_income_type)){
									  echo $income_type['name'];} echo"
								</label>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-md-3'>
								<label >
									Amount
								</label>
							</div>
							<div class='col-md-2'>";
							$am =$row['amount']; 
							$amount=substr($am, 0, -3);
								echo"<label >
									". $amount." &nbsp&nbsp; Af
								</label>
							</div>
						</div>
										
						<div class='form-row'>
							<div class='col-md-3'>
								<label>
									Bank
								</label>
							</div>
							
							<div class='col-md-2'>
								<label>";
									  $query_bank = mysql_query("select id, name from bank where id ='$id_bank' ");
						
									  while($row_bank = mysql_fetch_assoc($query_bank)){
									  echo $row_bank['name'];} echo"
								
								</label>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-md-3'>
								<label for='date'>
									Description
								</label>
							</div>

							<div class='col-md-2'>
								<label>".$row['description']."</label>
							</div>
						</div>
						<br>
						"; } ?>
            			
					
						<div class="divider"></div>
						<?php
						
						echo "<a href='";
							if($url == "/pharmacy/www/income.php")
								echo 'income.php';
							
							else if($url == "/pharmacy/www/expense_income_report.php")
								echo 'expense_income_report.php';
						
						echo"' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='close and back to main page!'>
                            <span class='button-content'>
                                Close
                            </span>
						</a>";
						?>
					</form>

					
					
					<div class="divider"></div>

		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
