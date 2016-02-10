<?php
ob_start();
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

        <form id="demo-form-2" action="product_registration.php" class="col-md-10 center-margin" method="post" />
            
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="name">
                         Name:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="name" name="name" data-trigger="change" data-type="url" class="parsley-validated" />
                </div>
            </div>
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="medical_name">
                        Medical Name:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="medical_name" name="medical_name" data-trigger="change" data-type="url" class="parsley-validated" />
                </div>
            </div>
			
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="category">
                        Category:
                    </label>
                </div>
               <div class="form-input col-md-4">
                    <select id="category" name="category" onchange="select_category(this.value);">
						<option value=''/>Select Category
                       <?php
								$categories = "select * from category where deleted != 'deleted'";
								$result = mysql_query($categories);
								while($row = mysql_fetch_assoc($result)){
									$category_name = $row["name"];
									$category_id = $row["id"];
									
									echo "<option value='$category_id'/>".$category_name;
								}
							?>
                    </select>
                </div>
            </div>
			<div id="type">
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Type:
                    </label>
                </div>
                <div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select id="type"  data-placeholder="Change statistics area" class="chosen-select">
                        
                        </select>
                    </div>
              </div>
		
			</div>
			</div>
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="category">
                        Store Unit:
                    </label>
                </div>
               <div class="form-input col-md-4">
                    <select id="store_unit" name="store_unit">
                       <option value='bean'/>Bean	
                       <option value='pocket'/>Pocket	
                       <option value='package'/>Package	
                    </select>
                </div>
            </div>
			
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="min_stock_level">
                         Min Stock Level:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="min_stock_level" name="min_stock_level" data-trigger="change" data-type="url" class="parsley-validated" />
                </div>
            </div>
			
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="description">
                        Description:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <textarea name="description" id="description" class="col-md-4" style="width:38.6%;"></textarea>
                </div>
            </div>	

            <div class="divider"></div>
		
            <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" name="submit" class="btn large primary-bg text-transform-upr font-size-11" id="submit" title="Validate!">
                                <span class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					<button type="reset" name="reset" class="btn large bg-blue-alt" id="reset" title="Validate!">
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
				$name = $_POST['name'];
				$medical_name = $_POST['medical_name'];
				$type = $_POST['type'];
				$store_unit = $_POST['store_unit'];
				$min_stock_level = $_POST['min_stock_level'];
				$description = $_POST['description'];
				
				$sql = "insert into product(company_name,medical_name,min_stock_level,description,store_unit,type_id) values('$name','$medical_name','$min_stock_level','$description','$store_unit','$type')";
				mysql_query($sql) or die(mysql_error());
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
                    <th>Medical Name</th>
                    <th>Type</th>
                    <th>Min Stock Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
	<tbody>
				<?php
					$products = "select * from product where deleted != 'deleted'";
					$result = mysql_query($products);
					$no = 0;
					while($row = mysql_fetch_assoc($result)){
						$no++;
						$product_id = $row['id'];
						$name = $row['company_name'];
						$medical_name = $row['medical_name'];
						$min_stock_level = $row['min_stock_level'];
						
						$type_id = $row['type_id'];
						$query = "select name from type where id = '$type_id' and deleted != 'deleted'";
						$type = mysql_query($query);
						$row=mysql_fetch_assoc($type);
						$type_name = $row['name'];
					
						
						
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$name</td>
                    <td><a href='javascript:;'>$medical_name</a></td>
                    <td><a href='javascript:;'>$type_name</a></td>
                    <td><a href='javascript:;'>$min_stock_level</a></td>";
					?>
					
					
                    <td>
                        <a href="product_view.php?product_id=<?php echo $product_id; ?>" class="btn small bg-yellow tooltip-button" data-placement="top" title="View">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="product_edit.php?product_id=<?php echo $product_id; ?>" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="product_registration.php?product_id=<?php echo $product_id; ?>" onclick="return confirm('Are you Sure You want to delete this record?');" class="btn small bg-red tooltip-button" data-placement="top" title="Delete">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
					
				</tr>
					
				<?php
					} 
				?>
				
              
            </tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Medical Name</th>
			<th>Type</th>
			<th>Min Stock Level</th>
			<th>Actions</th>
		</tr>
	</tfoot>
</table>
<?php
	if(isset($_GET['product_id'])){
		$id = $_GET['product_id'];
		$purchase = "select * from purchase where product_id='$id' and deleted != 'deleted'";
		echo $purchase;
		$purchase_result = mysql_query($purchase);
		$purchase_row = mysql_fetch_assoc($purchase_result);
		
		if($purchase_row){
			echo "<script> alert('You cant delete this record because its used!'); </script>";
		}else{
		$product = "update product set deleted = 'deleted' where id = '$id'";
		mysql_query($product);
		header("location:product_registration.php");
		}
	}
?>

    </div>
    
</div>

               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
</html>
