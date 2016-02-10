<?php
include('header.php');
 ?>
 <script>
	function Add(){
		var append = "<div id='shelf'  class='form-row' style='margin-left:-3px;'><div class='form-label col-md-2'><label for=''></label></div><div id='shelf'><div class='form-input col-md-4'><input type='text' id='shelf' name='shelf[]' data-trigger='change' data-type='url' class='parsley-validated' /></div></div></div>";
		$('#shelf').append(append);
	}
	function Remove(){
		var element = document.getElementById('shelfs');
		var length = shelfs.rows.length;
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

        <form id="demo-form-2" action="	shelf_registration.php" class="col-md-10 center-margin" method="post" />
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="stock">
                        Select Stock:
                    </label>
                </div>
               <div class="form-input col-md-4">
                    <select id="stock" name="stock">
                       <?php
								$stocks = "select * from stock";
								$result = mysql_query($stocks);
								while($row = mysql_fetch_assoc($result)){
									$stock_name = $row["name"];
									$stock_id = $row["id"];
									
									echo "<option value='$stock_id'/>".$stock_name;
								}
							?>
                    </select>
                </div>
            </div>
			
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Stock Shelfs:
                    </label>
                </div>
				<div id="shelf">
					<div class="form-input col-md-4">
						<input type="text" id="shelf" name="shelf[]" data-trigger="change" data-type="url" class="parsley-validated" />
					</div>
					<a onclick="Add();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#"><i class="glyph-icon icon-plus-sign-alt"></i></a>
					<a onclick="Remove();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Remove" href="#"><i class="glyph-icon icon-minus"></i></a>
				</div>
			</div>
			
			<div id="type">
			</div>

            <div class="divider"></div>
		
            <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" name="submit" class="btn large primary-bg text-transform-upr font-size-11" id="submit" title="Validate!">
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
				$stock_id = $_POST['stock'];
				for($i = 0;$i < sizeof($_POST['shelf']); $i++){
					$shelf = $_POST['shelf'][$i];
					$sql = "insert into shelf(name,stock_id) values('$shelf','$stock_id')";
					mysql_query($sql) or die(mysql_error());
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
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
	<tbody>
				<?php
					$shelf = "select * from shelf";
					$result = mysql_query($shelf);
					$no = 0;
					while($row = mysql_fetch_assoc($result)){
						$no++;
						$name = $row['name'];
						$stock_id = $row['stock_id'];
						
						$query = "select name from stock where id = '$stock_id'";
						$stock = mysql_query($query);
						$row = mysql_fetch_assoc($stock);
						$stock_name = $row['name'];
						
						
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$name</td>
                    <td><a href='javascript:;'>$stock_name</a></td>
                    
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
			<th>Stock</th>
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
