<?php
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

	//code insert
	if(isset($_POST['name']) && isset($_POST['blance']) && isset($_POST['type']) && isset($_POST['status']) && isset($_POST['datepicker2']) && isset($_POST['description'])){
						
							$name = $_POST['name'];
							$blance = $_POST['blance'];
							$type = $_POST['type'];
							
							$status = $_POST['status'];
							$date = $_POST['datepicker2'];
							$description = $_POST['description'];
							
							$query = "INSERT INTO pharmcy (name, blance, type, date, description, status, deleted) values
							('$name', '$blance', '$type', '$date', '$description', '$status', '')";
							
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
			echo "Success Delete";
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
									Name:
								</label>
							</div>
							<div class="form-input col-md-4" >
								<input placeholder="" class="col-md-12" type="text" name="name" id="name" />
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="blance">
									Contact:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input placeholder="" class="col-md-12" type="text" name="blance" id="blance" />
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-label col-md-2">
								<label for="blance">
									Email:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input placeholder="" class="col-md-12" type="text" name="blance" id="blance" />
							</div>
						</div>
						
					<div class="form-row">
							<div class="form-label col-md-2">
								<label for="description">
									Address:
								</label>
							</div>
							<div class="form-input col-md-4">
								<textarea name="description" id="description" class="col-md-12"></textarea>
								
							</div>
						</div>
					
							<div class="form-row">
							<div class="form-label col-md-2">
								<label for="blance">
									Logo:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input placeholder="" class="col-md-12" type="text" name="blance" id="blance" />
							</div>
						</div>
						
    
         							
					<div class="form-row">
							<div class="form-label col-md-2">
								<label for="blance">
									Owner:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input placeholder="" class="col-md-12" type="text" name="blance" id="blance" />
							</div>
						</div>
						
                         <div class="form-row">
							<div class="form-label col-md-2">
								<label for="blance">
									Website:
								</label>
							</div>
							<div class="form-input col-md-4">
								<input placeholder="" class="col-md-12" type="text" name="blance" id="blance" />
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
						
								
						<button type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="save" title="Validate!">
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
<table class="table table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th>Contact</th>
					<th class="text-center">Email</th>
					<th class="text-center">Address</th>
					<th class="text-center">Logo</th>
					<th class="text-center">owner</th>
					<th class="text-center">Website</th>
					<th class="text-center">Description</th>
                </tr>
            </thead>
            <tbody >
				<?php
					$i = 0;
					$query ="select * from bank where deleted != 'deleted'";
					if($query_run = mysql_query($query)){
						while($row = mysql_fetch_assoc($query_run)){
							
				
								echo "<tr>";
										$i++;
										$id = $row['id'];
									  echo" <td>$i</td>
									   
									   
									   
									   <td class='font-bold text-left'>".$row['name']."</td> 
										<td class='font-bold text-left'>".$row['blance']."</td>
										<td class='font-bold text-center'>".$row['type']."</td>
										<td class='font-bold text-center'>".$row['date']."</td>
										<td><div class='label bg-white'>";
											 
												if($row['status'] == 0){
													echo"
													<div class='label bg-red'>";
													echo 'inActive';
													}
												else {
													echo"
													<div class='label bg-green'>";
													echo 'Active';
												}
											echo"
											</div>
											
											
										</div></td>
										
										<td>
											<div class='dropdown'>
												<a href='javascript:;' title='' class='btn medium bg-blue' data-toggle='dropdown'>
													<span class='button-content'>
														<i class='glyph-icon font-size-11 icon-cog'></i>
														<i class='glyph-icon font-size-11 icon-chevron-down'></i>
													</span>
												</a>
												<ul class='dropdown-menu float-right'>


													<li>
														<a href='bank_view.php?id=".$row['id']."' title=''>
															<i class='glyph-icon icon-unchecked mrg5R'></i>
															View
														</a>
													</li>
												
													<li>
														<a href='bank_edit.php?id=".$row['id']."' title=''>
															<i class='glyph-icon icon-edit mrg5R'></i>
															Edit
														</a>
													</li>
													<li class='divider'></li>
													<li>
														<a  class='delete' href='bank.php?idd=$id' title=''>
															<i class='glyph-icon icon-edit mrg5R'></i>
															Delete
														</a>
													
													</li>
												</ul>
											</div>
										</td>
										</tr>";
								}
					}
				?>
              
			</tbody>
			
			
        </table>
					
                </div>
           
<br><br><br><br>

				
		   </div><!-- #page-content -->
        </div><!-- #page-wrapper -->
    </body>
</html>
