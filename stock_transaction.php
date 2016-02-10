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

        <form id="demo-form-2" action="stock_transaction.php" class="col-md-10 center-margin" method="post" />
            
			<div id="staff" class="form-row">
                <div class="form-label col-md-2">
                    <label for="purchase_id">
                        Name:
                    </label>
                </div>
			<div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select data-placeholder="Select Product" id="purchase_id" name="purchase_id" class="chosen-select">
                            <?php
								$producs = "select purchase.id as id,company_name,medical_name from purchase,product where product.id = purchase.product_id";
								$result = mysql_query($producs);
								while($row = mysql_fetch_assoc($result)){
									$company_name = $row["company_name"];
									$medical_name = $row["medical_name"];
									$purchase_id = $row["id"];
									
									echo "<option value='$purchase_id'/>".$company_name." ".$medical_name;
									
								}
							?>
                
                        </select>
                    </div>
              </div>
            </div>
			
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Quantity:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="quantity" name="quantity" data-trigger="change" data-type="url" class="spinner-input" />
                </div>
            </div>
			<div id="staff" class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        From Shelf:
                    </label>
                </div>
			<div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select data-placeholder="Select Shelf" id="from_shelf" name="from_shelf" class="chosen-select">
                            <?php
								$shelf = "select * from shelf";
								$result = mysql_query($shelf);
								while($row = mysql_fetch_assoc($result)){
									$shelf_name = $row["name"];
									$shelf_id = $row["id"];
									
									echo "<option value='$shelf_id'/>".$shelf_name;
									
								}
							?>
                
                        </select>
                    </div>
              </div>
            </div>
			<div id="staff" class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        To Shelf:
                    </label>
                </div>
			<div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select data-placeholder="Select Shelf" id="to_shelf" name="to_shelf" class="chosen-select">
                            <?php
								$shelf = "select * from shelf";
								$result = mysql_query($shelf);
								while($row = mysql_fetch_assoc($result)){
									$shelf_name = $row["name"];
									$shelf_id = $row["id"];
									
									echo "<option value='$shelf_id'/>".$shelf_name;
									
								}
							?>
                
                        </select>
                    </div>
              </div>
            </div>
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="date">
                        Date
                    </label>
                </div>
                <div class="form-input col-md-4">
                <input type="text"  class="col-md-12" id="datepicker2" name="date" /></div>
				
            </div>
			
            <div class="divider"></div>
			
            <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" name="submit" class="btn large primary-bg text-transform-upr font-size-11" id="submit" title="Submit">
                                <span class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					<button type="reset" class="btn large bg-blue-alt" id="demo-form-valid" title="Validate!">
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
				$purchase_id = $_POST['purchase_id'];
				$quantity = $_POST['quantity'];
				$from_shelf = $_POST['from_shelf'];
				$to_shelf = $_POST['to_shelf'];
				$date = $_POST['date'];
				
				$sql = "insert into transact(purchase_id,quantity,from_shelf,to_shelf,date)
				values('$purchase_id','$quantity','$from_shelf','$to_shelf','$date')";
				mysql_query($sql);
				
				//Subtract when transaction done!!!
				$update_kept = "update kept set quantity = (quantity-'$quantity') where shelf_id = '$from_shelf' and purchase_id = '$purchase_id'";
				mysql_query($update_kept);
				
				$kept = "select * from kept where shelf_id = '$to_shelf' and purchase_id = '$purchase_id'";
				$select_kept = mysql_query($kept);
				$check_kept = mysql_fetch_assoc($select_kept);
				if($check_kept){
					$update = "update kept set quantity = (quantity+'$quantity') where shelf_id = '$to_shelf' and purchase_id = '$purchase_id'";
					mysql_query($update);
				}else{
					$insert = "insert into kept(shelf_id,purchase_id,quantity) values('$to_shelf','$purchase_id','$quantity');";
					mysql_query($insert);
				}
				
			}
		?>

    </div>
    
</div>

<div class="example-box">
    <div class="example-code">

        
            <table class="table" id="example1">
			<thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>From Shelf</th>
                    <th>To Shelf</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
	<tbody>
				<?php
					$transacts = "select * from transact";
					$result = mysql_query($transacts);
					$no = 0;
					while($row = mysql_fetch_assoc($result)){
						$no++;
						$quantity = $row['quantity'];
						$date = $row['date'];
						
						$purchase_id = $row['purchase_id'];
						$purchase_query = "select company_name,medical_name from product,purchase where product.id = purchase.product_id and purchase.id = '$purchase_id'";
						$purchase = mysql_query($purchase_query);
						$purchase_row=mysql_fetch_assoc($purchase);
						$company_name = $purchase_row['company_name'];
						$medical_name = $purchase_row['medical_name'];
						
						$from_shelf = $row['from_shelf'];
						$shelf_query = "select name from shelf where id = '$from_shelf'";
						$shelf_result = mysql_query($shelf_query);
						$shelf_row = mysql_fetch_assoc($shelf_result);
						$from_shelf_name = $shelf_row['name'];
					
						$to_shelf = $row['to_shelf'];
						$new_shelf_query = "select name from shelf where id = '$to_shelf'";
						$new_shelf_result = mysql_query($new_shelf_query);
						$new_shelf_row = mysql_fetch_assoc($new_shelf_result);
						$to_shelf_name = $new_shelf_row['name'];
					
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$company_name $medical_name</td>
                    <td class='font-bold text-left'>$quantity</td>
                    <td><a href='javascript:;'>$from_shelf_name</a></td>
                    <td><a href='javascript:;'>$to_shelf_name</a></td>
                    <td><a href='javascript:;'>$date</a></td>
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
	<tfoot>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>From Shelf</th>
			<th>To Shelf</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</tfoot>
</table>

    </div>
    
</div>

               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
</html>
