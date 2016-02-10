 <?php
session_start();
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
    <div class="example-code">
		 <form  method="post" >
		 
	
			<div class="form-row">
						<div class="form-label col-md-2" >
							<label for="new_exp">
								Expense Type:
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="new_exp" name="new_exp" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>
			<div class="form-row">
				<div class="form-label col-md-2" >
					<label for="des">
						Description:
					</label>
				</div>
				<div class="form-input col-md-4">
					<textarea name="des" id="des" class="parsley-validated" data-trigger="change" data-type="url" ></textarea>
				</div>
			</div>
		<div class="divider"></div>  
				
            <div class="form-row">
                <input type="hidden" name="superhidden" id="superhidden" />
                <div class="form-input col-md-10 col-md-offset-2">
                    <button name="submit" type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                                <span  class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					<a href='expense.php' class='btn large primary-bg text-transform-upr font-size-11' id='demo-form-valid' title='cancel and back to main page!'>
                            <span class='button-content'>
                                Cancel
                            </span>
                    </a>
                </div>
            </div>
			
		</form>
		<?php
		if(isset($_POST['submit'])){
		
		$new_exp=$_POST['new_exp'];
		$des=$_POST['des'];
		
 $sql = "insert into expense_types(name, description, deleted) values('$new_exp','$des','') ";
		
		mysql_query($sql);
			header("location:expense.php");
			}
		?>
		<br>
		<br>
		<br>
		
				</div>
			</div><!-- #page-content -->         
	</div><!-- #page-wrapper -->

    </body>
</html>
