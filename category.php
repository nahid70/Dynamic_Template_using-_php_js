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

        <form id="demo-form-2" action="category.php" class="col-md-10 center-margin" method="post" />
            
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Category Name:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="category" name="category" data-trigger="change" data-type="url" class="parsley-validated" />
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
			$category_insert = "insert into category(name) values('$category')";
			mysql_query($category_insert) or die(mysql_error());
			
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
				<?php
					$no = 0;
					$categories = "select * from category";
					$result = mysql_query($categories);
					while($row = mysql_fetch_assoc($result)){
						$name = $row['name'];
						$id = $row['id'];
						$no++;
						echo "<tr>
                    <td>$no</td>
                    <td class='font-bold text-left'>$name</td>
                    <td>
                        <a href='type.php?id='$id'' class='btn small bg-yellow tooltip-button' data-placement='top' title='View'>
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
