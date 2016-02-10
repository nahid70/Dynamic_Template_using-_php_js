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

        <form id="demo-form-2" action="new.php" class="col-md-10 center-margin" method="" />
           
	<div class="form-row" >
		<div class="form-label col-md-2">
			<label for="">
				Category:
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
	  <div class="form-row" >
		<div class="form-label col-md-2">
			<label for="">
				Type:
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
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center">4</td>
			<td class="center">X</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 5.0</td>
			<td>Win 95+</td>
			<td class="center">5</td>
			<td class="center">C</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 5.5</td>
			<td>Win 95+</td>
			<td class="center">5.5</td>
			<td class="center">A</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>
		<tr>
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>
			<td class="center">A</td>
		</tr>

	</tbody>
	<tfoot>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
</table>


                	</div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!-- #page-wrapper -->

    </body>
</html>
