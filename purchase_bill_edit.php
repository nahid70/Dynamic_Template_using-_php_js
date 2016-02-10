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
           
		   <div id="page-content-wrapper">
	<?php include("page-title.php");
	if(isset($_GET['edit'])){
	
		$bill_id = $_GET['edit'];
		// select number from company bill
		$select_query = mysql_query("select * from company_bills where id='$bill_id' and deleted !='deleted' ");
		$bill_row=mysql_fetch_assoc($select_query);
			
		$bill_target=$bill_row['id'];
		$bill_no=$bill_row['no'];
		$bill_date=$bill_row['date'];
		$bill_due_date=$bill_row['due_date'];
		$staff=$bill_row['staff_id'];
		$bill_amount=$bill_row['amount'];
		$company_target=$bill_row['company_id'];	
		echo $company_id;
	}
	?>

<div id="page-content">

<div class="example-box">
    <div class="example-code">
		 <form  id="demo-form-2"   method="post" >
		 
	<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="company">
                      Company:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                        <select data-placeholder="select customer" id="company" name="company" class="chosen-select">					
						<?php
							$select_companys="select *from company ";
							$query_company=mysql_query($select_companys);
                            while($company=mysql_fetch_assoc($query_company)){
								$company_name=$company['name'];
								$company_id=$company['id'];
								if($company_target==$company_id){
								 echo "<option value='$company_id' selected='selected'/>".$company_name;
								 }
								else {
								 echo "<option value='$company_id' selected='selected'/>".$company_name;
								}
							}
						?>   
                        </select>
                    </div>
              </div>
		<div class="row" >

            <div class="col-md-2" >

                <a href="javascript:;" class="primary-bg medium radius-all-2 display-block btn white-modal-80">
                    <span class="button-content text-center float-none font-size-11 text-transform-upr">Add New Company</span>
                </a>

            </div>
            <div class="hide" id="white-modal-80" title="Add New Company" >
                <div class="pad10A">
                   <div class="form-row" >
						<div class="form-label col-md-2" >
							<label for="com_name">
								Name:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="com_name" name="com_name" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>	
					<div class="form-row"  >
						<div class="form-label col-md-2" >
							<label for="com_address">
								Address:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="com_address" name="com_address" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>	
					<div class="form-row" >
						<div class="form-label col-md-2" >
							<label for="com_Coordinator">
								Coordinator:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="com_Coordinator" name="com_Coordinator" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>
					<div class="form-row"  >
						<div class="form-label col-md-2" >
							<label for="com_phone">
								Phone:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="com_phone" name="com_phone" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>
					<div class="form-row"  >
						<div class="form-label col-md-2" >
							<label for="com_email">
								Email:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="com_email" name="com_email" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>
					
					<div class="divider"></div>
					<div class="form-row">
						<input type="hidden" name="superhidden" id="superhidden" />
						<div class="form-input col-md-10 col-md-offset-2">
							<button type="button" class="btn large primary-bg text-transform-upr font-size-11" onclick="add_company();" title="Validate!">
								<span class="button-content">
									SUBMIT
								</span>
							</button>
							
						</div>
					</div>
                </div>

                </div>
            </div>

        </div>
	</div>
	
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="bill_no">
                      Bill No
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                        <select data-placeholder="select customer"  id="bill_no" name="bill_no" class="chosen-select">					
						<?php
							$select_bill="select *from company_bills";
							$query_bill=mysql_query($select_bill);
                            while($bill=mysql_fetch_assoc($query_bill)){
								$bill_number=$bill['no'];
								$bill_id=$bill['id'];
								
								if($bill_target==$bill_id){
								 echo "<option value='$bill_id' selected='selected'/>".$bill_number;
								}
								else{
								 echo "<option value='$bill_id' />".$bill_number;
								}
							}
						?>   
                        </select>
                    </div>
              </div>
			</div>		
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Date
                    </label>
                </div>
                <div class="form-input col-md-4">
                <input type="text" class="col-md-12" value="<?php echo $bill_date;?>" id="datepicker2" name="date" /></div>
				
            </div>
			<div class="form-row">
						<div class="form-label col-md-2" >
							<label for="amounts">
								Amount
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="amounts" name="amounts" value="<?php echo $bill_amount;?>" class="parsley-validated" />
						</div>
			</div>	
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="due_date">
                        Due Date
                    </label>
                </div>
                    <div class="form-input col-md-4">
                <input type="text" class="toDate" id="due_date" value="<?php echo $bill_due_date;?>" name="due_date"  /></div>				
           
            </div>
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="staff">
                      Staff
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                        <select data-placeholder="select staff" id="staff" name="staff" class="chosen-select">
						<?php
						
							$query_staff=mysql_query("select *from staff");
                            while($staff_query=mysql_fetch_assoc($query_staff)){
								$staff_name=$staff_query['first_name'];
								$staff_id=$staff_query['id'];
								if($staff==$staff_id){
								echo "<option value='$staff_id' selected='selected' >".$staff_name;
								}
								else{
								echo "<option value='$staff_id' >".$staff_name;
								}
								
								
						}	
						?>   
                        </select>
                    </div>
              </div>
            </div>
			
			<div class="divider"></div>  
				
            <div class="form-row">
                <input type="hidden" name="superhidden" id="superhidden" />
                <div class="form-input col-md-10 col-md-offset-2">
                    <button name="submit" type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                                <span  class="button-content">
                                    UPDATE
                                </span>
                    </button>
					<a href="purchase_bill.php" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                            <span class="button-content">
                                Cancel
                            </span>
                        </a>
                </div>
            </div>
			
		</form>
			<?php
		if(isset($_POST['submit'])){	
			$company_id=$_POST['company'];	
			$bill_no=$_POST['bill_no'];	
			$date=$_POST['date'];	
			$amounts=$_POST['amounts'];	
			$due_date=$_POST['due_date'];	
			$staff=$_POST['staff'];	
			
			$sql = "update company_bills set no='$bill_no' ,amount='$amounts',date='$date',due_date='$due_date',staff_id='$staff',company_id='$company_id' where id='$_GET[edit]'";
			mysql_query($sql);
			echo $sql;
			//header("location:purchase_bill.php");
			}
		?>
				</div>
			</div><!-- #page-content -->         
	</div><!-- #page-wrapper -->

    </body>
</html>
