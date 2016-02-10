<?php
include("header.php");

			$query_products=mysql_query("select *from product where type_id='1'");
			while($product=mysql_fetch_assoc($query_products)){
				$medical_name=$product['medical_name'];
				$company_name=$product['company_name'];
				$id=$product['id'];								
			 $inject="<option value='$id' />.$medical_name.' '.$company_name";
			}
							
 $injection="<div class='form-input col-md-4' >
                          <div class='form-input'>
                        <select data-placeholder='select customer' class='chosen-select'>
						<option value='' /> Soup
						$inject;
                        </select>
                    </div>
              </div>
           ";
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
                        CUstomer:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                        <select data-placeholder="select customer" class="chosen-select">
						<option value='' /> OPD
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
			 <div class="col-md-3">

                <a href="javascript:;" class="primary-bg medium radius-all-2 display-block btn white-modal-80">
                    <span class="button-content text-center float-none font-size-11 text-transform-upr">Add New Customer</span>
                </a>

                <div class="hide" id="white-modal-80" title="Add New Customer">
					
					<div class="form-row" style="margin-left:8.3%">
						<div class="form-label col-md-2" >
							<label for="fname">
								First Name:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="fname" name="fname" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>	
					<div class="form-row" style="margin-left:8.3%">
						<div class="form-label col-md-2" >
							<label for="lname">
								Last Name:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="lname" name="lname" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>	
					<div class="form-row" style="margin-left:8.3%">
						<div class="form-label col-md-2" >
							<label for="phone">
								Phone:
							</label>
						</div>
						<div class="form-input col-md-4" style="width:50%;">
							<input type="text" id="phone" name="phone" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
					</div>
					
					<div class="divider"></div>
					<div class="form-row">
						<input type="hidden" name="superhidden" id="superhidden" />
						<div class="form-input col-md-10 col-md-offset-2">
							<button type="submit" class="btn large primary-bg text-transform-upr font-size-11" onclick="add_customer();" title="Validate!">
										<span class="button-content">
											SUBMIT
										</span>
							</button>
							
						</div>
					</div>
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
                <input type="text" class="col-md-12" id="datepicker2" name="datepicker2" /></div>
				
            </div>
			            
            <div class="divider"></div>
            <div class="form-row" id="inject">
                <div class="form-label col-md-2">
                    <label for="">
                        Product:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                       <select data-placeholder="select customer" id="in" class="chosen-select">
						<option value='' /> Product
						<?php
							$select_products="select *from product ";
							$query_products=mysql_query($select_products);
                            while($product=mysql_fetch_assoc($query_products)){
								$medical_name=$product['medical_name'];
								$company_name=$product['company_name'];
								$type_id=$product['type_id'];
								$id=$product['id'];
								
								 echo "<option value='$id' />".$medical_name."-".$company_name."-".$type_id;
							}
						?>   
                        </select>
                    </div>
              </div>
			  <div class="form-row pad0B">
                
                <div class="form-input col-md-2">
                    <input class="spinner-input" name="" placeholder="Quantity" id="quantity" />
                </div>
          
			  	<a onclick="Add_inject();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#s-sign-alt"><i class="glyph-icon icon-plus-sign-alt"></i></a>
			  </div>
			</div>
			
			<div class="divider"></div>
			<div class="form-row" >
						<div class="form-label col-md-2" >
							<label for="lname">
								Total Price:
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="lname" name="lname" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
			</div>	
			<div class="form-row" >
						<div class="form-label col-md-2" >
							<label for="lname">
								Amount
							</label>
						</div>
						<div class="form-input col-md-4">
							<input type="text" id="lname" name="lname" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
			</div>	
				<div class="form-row">
					<div class="form-label col-md-2">
						<label for="toDate">
							Due Date
						</label>
					</div>
					<div class="form-input col-md-4">
					<input type="text" class="toDate" id="toDate" name="toDate" /></div>
					
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
               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
	
</html>
 <script >
 
  var i=1;
  function Add_inject(){
	var product=$("#in option:selected").text();
	var product_id=$("#in option:selected").val();
	var quantity=$("#quantity").val();
	
var append = "<div class='form-row' ><div class='form-label col-md-2' ><label for='lname'>Product"+i+":</label></div><div class='form-input col-md-4'><input type='text' id='lname' name='lname' data-trigger='change' data-type='url' class='parsley-validated'  value="+product+"></div><div class='form-row pad0B'><div class='form-input col-md-2'><input class='spinner-input' name='' value="+quantity+" /></div></div>";	
	$('#inject').append(append);
	
	i++;
    	document.getElementById("quantity").value='';
  }

</script>
