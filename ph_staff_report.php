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
				<h3>
				   Staff Report
				</h3>
						<div class="divider mrg10T mrg10B"></div>
				
				<table class="table" id="example1">
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
					<?php
								$select = "SELECT * FROM `staff` order by id desc";
								$return= mysql_query($select)or die ("noting select");
								while ($row = mysql_fetch_assoc($return)){
								$staff_id=$row['id'];
								echo "<tr><td>".$row['first_name']." ".$row['last_name']."</td>
											<td class='font-bold text-left'>" .$row['contact']."</td>
											<td><a href='javascript:;'>" .$row['sallary']. "</a></td>
											<td>";?>
											<?php 
											echo "<img src = \"../data/uploads/".$row['photo']."\"width= '45px' height= '40px'></td>
											<td>
											  <a href='staff_datails.php?staff_id=$staff_id' class='btn small bg-yellow tooltip-button' data-placement='top' title='View'>
												<i class='glyph-icon icon-flag'></i>
											</a>
											<a href='staff_edit.php?staff_id=$staff_id'  class='btn small bg-blue-alt tooltip-button' data-placement='top' title='Edit'>
												<i class='glyph-icon icon-edit'></i>
											</a>
											<a href='javascript:;' class='btn small bg-red tooltip-button' data-placement='top' title='Remove'>
												<i class='glyph-icon icon-remove'></i>
											</a>
											</td>";		
											}
											?>
						 
										</tr>
									 
									</tbody>
								</table>

				</div>
					</div>
					</br>
					</br>
					
<div class="divider"></div>


            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
