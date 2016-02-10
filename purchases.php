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

        <form id="demo-form-2" action="new.php" class="col-md-10" method="" />
           
	  <div class="form-row" >
		<div class="form-label col-md-2">
			<label for="">
				Product:
			</label>
		</div>
		<div class="form-input col-md-3" >
				  <div class="form-input">
				<select data-placeholder="select customer" class="chosen-select">
				<option value='' />
				<?php
					$select_customers="select *from customer ";
					$query_customers=mysql_query($select_customers);
					while($customer=mysql_fetch_assoc($query_customers)){
						$fname=$customer['first_name'];
						$id=$customer['id'];
						 echo "<option value='$id' />".$fname;
					}
				?>   
				</select>
			</div>
	  </div>
	  
	  </div>
	  <div class="example-box">
    <div class="example-code clearfix">

        <div class="form-row col-lg-3 float-left form-vertical">
            <div class="form-label">
                <label for="from">
                    From:
                </label>
            </div>
            <div class="form-input">
                <input type="text" size="10" class="fromDate" name="from" />
            </div>
        </div>

        <div class="form-row col-lg-3 float-left form-vertical">
            <div class="form-label">
                <label for="to">
                    To:
                </label>
            </div>
            <div class="form-input">
                <input type="text" size="10" class="toDate" name="to" />
            </div>
        </div>

    </div>
    
</div>

			<div class="divider"></div>       
            <div class="form-row">
                <input type="hidden" name="superhidden" id="superhidden" />
                <div class="form-input col-md-10 col-md-offset-2">
                    <button type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                                <span class="button-content">
                                    SUBMIT
                                </span>
                    </button>
					<button type="reset" class="btn large bg-blue-alt" id="demo-form-valid" title="Validate!">
                                <span class="button-content">
                                    reset
                                </span>
                            </button>
                </div>
            </div>		
	 </div>
	</div>




<div class="divider"></div>
<table class="table" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Company</th>
			<th>Bill</th>
			<th>Total Price</th>
			<th>Operation</th>
		</tr>
	</thead>
	<tbody>
	<?php
		// select all from purchase
		$query_select=mysql_query("select *from purchase where deleted !='deleted' ");
		while($purchase_row=mysql_fetch_assoc($query_select)){
		$company_bill=$purchase_row['company_bills_id'];
		$total_price=$purchase_row['total_price'];
		$pur_id=$purchase_row['id'];
		
		// select number from company bill
		$select_query = mysql_query("select * from company_bills where id='$company_bill'");
		$bill_row=mysql_fetch_assoc($select_query);		
		$bill_id=$bill_row['id'];
		$bill_no=$bill_row['no'];
		$bill_date=$bill_row['date'];
		$bill_amount=$bill_row['amount'];
		
		// select name from company
		$select_company = mysql_query("select company_bills.*,company.name as cname from company,company_bills where company.id=company_bills.company_id and company_id='$bill_id'");
		$company_row=mysql_fetch_assoc($select_company);
		$company_name=$company_row['cname'];
		
		
		echo "<tr> 
				<td>$purchase_row[id]</td>
				<td>$bill_date</td>
				<td>$company_name</td>
				<td>$bill_no</td>
				<td>$total_price</td>
				<td>
                        <div class='dropdown'>
                            <a href='javascript:;' title='' class='btn medium bg-blue' data-toggle='dropdown'>
                                <span class='button-content'>
                                    <i class='glyph-icon font-size-11 icon-cog'></i>
                                    <i class='glyph-icon font-size-11 icon-chevron-down'></i>
                                </span>
                            </a>
                            <ul class='dropdown-menu float-right'>

                                <li>
                                    <a href='purchase_edit.php' title=''>
                                        <i class='glyph-icon icon-edit mrg5R'></i>
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <a href='javascript:;' title=''>
                                        <i class='glyph-icon icon-flag mrg5R'></i>
                                        View
                                    </a>
                                </li>
                                <li class='divider'></li>
                                <li>
                                    <a href='purchases.php?delete=$pur_id' class='delete' style='color:red' title=''>
                                        <i class='glyph-icon icon-remove mrg5R'></i>
                                        Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
			</tr>";
		}
	?>
	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Company</th>
			<th>Bill</th>
			<th>Total Price</th>
			<th>Operation</th>
		</tr>
	</tfoot>
</table>


                	</div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
<?php
if(isset($_GET['delete'])){

$query_delete=mysql_query("update purchase set deleted='deleted' where id='$_GET[delete]'");
header("location:purchases.php");
}
?>