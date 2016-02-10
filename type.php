<?php
include('header.php');
 ?>
 <script>
	function Add(){
		var append = "<div id='type'  class='form-row' style='margin-left:-3px;'><div class='form-label col-md-2'><label for=''></label></div><div id='shelf'><div class='form-input col-md-4'><input type='text' id='type' name='type[]' data-trigger='change' data-type='url' class='parsley-validated' /></div></div></div>";
		$('#type').append(append);
	}
	function Remove(){
	var div = document.getElementById("type");
	var length = div.rows.length;
	if(length > 1){
		div.deleteRow(length - 1);
	}
  }
 
 </script>
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

        <form id="demo-form-2" action="type.php" class="col-md-10 center-margin" method="post" />
            
            <div id="staff" class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Select Category:
                    </label>
                </div>
			<div id="Category" class="form-input col-md-4">
                          <div class="form-input">
                        <select data-placeholder="Select Staff" id="category" name="category" class="chosen-select">
                            <?php
								$Category = "select * from Category";
								$result = mysql_query($Category);
								while($row = mysql_fetch_assoc($result)){
									$Category_name = $row["name"];
									$Category_id = $row["id"];
									
									echo "<option value='$Category_id'/>".$Category_name;
									
								}
							?>
                
                        </select>
                    </div>
              </div>
            </div>
			
			
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Types of Category:
                    </label>
                </div>
				<div id="type">
					<div class="form-input col-md-4">
						<input type="text" id="type" name="type[]" data-trigger="change" data-type="url" class="parsley-validated" />
					</div>
					<a onclick="Add();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#"><i class="glyph-icon icon-plus-sign-alt"></i></a>
					<a onclick="Remove();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Remove" href="#"><i class="glyph-icon icon-minus"></i></a>
				</div>
			</div>
			
            <div class="divider"></div>
			
            <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" name="submit" class="btn large primary-bg text-transform-upr font-size-11"  title="Submit">
                                <span class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					
            </div>
			        </br>      
			        </br>      
        </form>
	<?php
		if(isset($_POST['submit'])){
			$category = $_POST['category'];
			for($i = 0;$i < sizeof($_POST['type']); $i++){
				$types = $_POST['type'][$i];
				$sql = "insert into type(name,category_id) values('$types','$category')";
				echo sizeof($_POST['type'])."<br>";
				mysql_query($sql) or die(mysql_error());
			}
			
		}
	?>	

    </div>
    
</div>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" style="width:80%; margin:0 auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
				<?php
					$no = 0;
					$types = "select * from type";
					$result = mysql_query($types);
					while($row = mysql_fetch_assoc($result)){
						$name = $row['name'];
						
						$category_id = $row['category_id'];
						$sql = "select name from category where id='$category_id'";
						$type_result = mysql_query($sql);
						$type_row = mysql_fetch_assoc($type_result);
						$category_name = $type_row['name'];
						
						$no++;
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$name</td>
                    <td class='font-bold text-left'>$category_name</td>
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
