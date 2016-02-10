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
	<?php include("page-title.php");?>

<div id="page-content">

<div class="example-box">
    <div class="example-code">
		 <form  method="post" >
		 
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
								
								 echo "<option value='$company_id' />".$company_name;
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
			<div id="lk"></div>
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
			<div class="form-row">
						<div class="form-label col-md-2" >
							<label for="bill_no">
								Bill No
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="bill_no" name="bill_no" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
			</div>		
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Date
                    </label>
                </div>
                <div class="form-input col-md-4">
                <input type="text" class="col-md-12" id="datepicker2" name="date" /></div>
				
            </div>
			<div class="form-row">
						<div class="form-label col-md-2" >
							<label for="amounts">
								Amount
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="amounts" name="amounts" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
			</div>	
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="due_date">
                        Due Date
                    </label>
                </div>
                    <div class="form-input col-md-4">
                <input type="text" class="toDate" id="due_date" name="due_date" placeholder="Expire Date" /></div>				
           
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
							<option value=' ' />
						<?php
							$query_staff=mysql_query("select *from staff");
                            while($staff=mysql_fetch_assoc($query_staff)){
								$staff_name=$staff['first_name'];
								$staff_id=$staff['id'];								
								echo "<option value='$staff_id' />".$staff_name;
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
                                    SUBMIT
                                </span>
                    </button>
					<button type="reset" class="btn large bg-blue-alt"  title="Validate!">
                                <span class="button-content">
                                    reset
                                </span>
                    </button>
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
			
			$sql = "INSERT INTO company_bills(no,amount,date,due_date,staff_id,company_id) VALUES ('$bill_no','$amounts','$date','$due_date','$staff','$company_id');";

			mysql_query($sql);
			header("location:purchase_bill.php");
			}
		?>
		<br>
		<br>
		<br>
		 <table class="table table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Company</th>
                    <th>Bill No</th>
                    <th>date</th>
                    <th>amount</th>
                    <th>Due date</th>
                    <th>Staff</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
			<?php
		
		// select number from company bill
		
		$select_query = mysql_query("select * from company_bills where deleted !='deleted'  order by id desc");
		while($bill_row=mysql_fetch_assoc($select_query)){
			
		$bill_id=$bill_row['id'];
		$bill_no=$bill_row['no'];
		$bill_date=$bill_row['date'];
		$bill_due_date=$bill_row['due_date'];
		$staff_id=$bill_row['staff_id'];
		$bill_amount=$bill_row['amount'];
		$company_id=$bill_row['company_id'];
		
		// select name from company
		$select_company = mysql_query("select company_bills.*,company.name as cname from company,company_bills where company.id=company_bills.company_id and company_id='$company_id'");
		$company_row=mysql_fetch_assoc($select_company);
		$company_name=$company_row['cname'];
		
		// select Staff 
		$staff=mysql_fetch_assoc(mysql_query("select first_name from staff where id='$staff_id'"));
		$staff_name=$staff['first_name'];

		echo "<tr>
                    <td>$bill_id</td>
                    <td class='font-bold text-left'>$company_name</td>
                    <td><a href=''>$bill_no</a></td>
                    <td><a href=''>$bill_date</a></td>
                    <td><a href=''>$bill_amount</a></td>
                    <td><a href=''>$bill_due_date</a></td>
					<td><a href=''>$staff_name</a></td>
                    <td>
                        <a href='purchase_bill_edit.php?edit=$bill_id' class='btn small bg-blue-alt tooltip-button' data-placement='top' title='Edit'>
                            <i class='glyph-icon icon-edit'> </i>
                        </a>
                        <a href='purchase_bill.php?delete=$bill_id' class='delete' style='color:red;'  title='Remove'>
                             <i class='glyph-icon icon-remove'> </i>
                        </a>
                    </td>
                </tr>";
			}	
           ?>                 
            </tbody>
        </table>
		<?php
		if(isset($_GET['delete'])){

		mysql_query("update company_bills set deleted='deleted' where id='$_GET[delete]'");
		header("location:purchase_bill.php");
		}
		
		?>
				</div>
			</div><!-- #page-content -->         
	</div><!-- #page-wrapper -->

    </body>
</html>
