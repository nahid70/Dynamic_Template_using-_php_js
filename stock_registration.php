<?php
include('header.php');
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
    <div class="example-code">

        <form id="demo-form-2" action="stock_registration.php" class="col-md-10 center-margin" method="post" />
            
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="name">
                        Stock Name:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="name" name="name" data-trigger="change" data-type="url" class="parsley-validated" />
                </div>
            </div>
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="address">
                        Address:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <textarea name="address" id="address" class="col-md-4" style="width:38.6%;"></textarea>
                </div>
            </div>	
			
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="staff">
                        Select Staffs:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <select id="staff" name="staff[]" data-placeholder="Choose Staffs..." multiple="" class="chosen-select">
                        <?php
								$staffs = "select * from staff";
								$result = mysql_query($staffs);
								while($row = mysql_fetch_assoc($result)){
									$staff_name = $row["first_name"];
									$staff_id = $row["id"];
									
									echo "<option value='$staff_id'/>".$staff_name;
								}
						?> 
                    </select>
                </div>
            </div>

            <div class="divider"></div>
				
				
			
            <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" name="submit" id="submit" class="btn large primary-bg text-transform-upr font-size-11"  title="Submit">
                                <span class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					<button type="reset" class="btn large bg-blue-alt"  title="Reset">
                                <span class="button-content">
                                    RESET
                                </span>
                    </button>
            </div>
				</br>
				</br>

        </form>
		<?php
		if(isset($_POST['submit'])){
			$stock_name = $_POST['name'];
			$stock_address = $_POST['address'];
			$stock = "insert into stock(name,address) values('$stock_name','$stock_address')";
				mysql_query($stock) or die(mysql_error());
				
			$select = "select * from stock order by id desc limit 1";
			$s = mysql_query($select);
			$rs = mysql_fetch_assoc($s);
			$stock_id = $rs['id'];
				
			for($i = 0;$i < sizeof($_POST['staff']); $i++){
				$staff_id = $_POST['staff'][$i];
				$sql = "insert into works(staff_id,stock_id) values('$staff_id','$stock_id')";
				mysql_query($sql) or die(mysql_error());
			}
			
		}
	?>
		
    </div>
    
</div>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" style="width:90%; margin:0 auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
				<?php 
					$stocks = "select * from stock";
					$result = mysql_query($stocks);
					$no = 0;
					while($row = mysql_fetch_assoc($result)){
						$no++;
						$stock_name = $row['name'];
						$stock_address = $row['address'];
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$stock_name</td>
                    <td><a href='javascript:;'>$stock_address</a></td>
                    <td>
                        <a href='javascript:;' class='btn small bg-yellow tooltip-button' data-placement='top' title='View'>
                            <i class='glyph-icon icon-flag'></i>
                        </a>
                        <a href='javascript:;' class='btn small bg-blue-alt tooltip-button' data-placement='top' title='Edit'>
                            <i class='glyph-icon icon-edit'></i>
                        </a>
                        <a href='javascript:;' class='btn small bg-red tooltip-button' data-placement='top' title='Remove'>
                            <i class='glyph-icon icon-remove'></i>
                        </a>
                    </td>
                </tr>";
					}
				?>
                
               
            </tbody>
        </table>

    </div>
    
</div>

               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
</html>
