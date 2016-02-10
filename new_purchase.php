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

			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="company">
                      Company:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select onchange="select_bill(this.value);" data-placeholder="select customer" id="company" name="company" class="chosen-select">
						<option value='' />
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
							<button type="submit" class="btn large primary-bg text-transform-upr font-size-11" onclick="add_company();" title="Validate!">
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
		<div id="select_bill">
		 </div>
			
			<div class="divider"></div>
			  <div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="product">
                      Product
                    </label>
                </div>
                <div class="form-input col-md-4" >
                    <div class="form-input">
                        <select data-placeholder="select customer" id="product"  name="product" class="chosen-select">
					
						<?php
							$select_products="select *from product ";
							$query_products=mysql_query($select_products);
                            while($product=mysql_fetch_assoc($query_products)){
								$medical_name=$product['medical_name'];
								$company_name=$product['company_name'];
								$type_id=$product['type_id'];
								$id=$product['id'];
									$query_type=mysql_query("select name from type where id='$type_id'");
									$type_row=mysql_fetch_assoc($query_type);
									$type_name=$type_row['name'];
								 echo "<option value='$id' />".$medical_name." ".$company_name." ".$type_name;
							}
						?>   
                        </select>
                    </div>
				</div>
				<div class="form-row pad0B">
                
                <div class="form-input col-md-3">
                    <input onchange="purchase_totalprice();" type="text" id="quantity" name="quantity" class="spinner-input" placeholder="Quantity"  />
                </div>
          
			 </div>
			 
			</div>
			<div class="form-row" >
						<div class="form-label col-md-2" >
							<label for="unit_price">
								unit price
							</label>
						</div>
						<div class="form-input col-md-4">
							<input onchange="purchase_totalprice();" type="text" id="unit_price" name="unit_price" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
			
						<div class="form-input col-md-3">
							<input type="text" id="total_price" name="total_price"  class="parsley-validated" placeholder="Total Price" />
						</div>
			</div>
		
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="product_date">
                        Product Date
                    </label>
                </div>
                <div class="form-input col-md-4">
                <input type="text" class="fromDate" id="product_date" name="product_date" /></div>				
           
                <div class="form-input col-md-3">
                <input type="text" class="toDate" id="expire_date" name="expire_date" placeholder="Expire Date" /></div>				
            </div> 
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="batch_no">
                        Batch Number
                    </label>
                </div>
                <div class="form-input col-md-4">
                <input type="text" class="parsley-validated" id="batch_no" name="batch_no" /></div>				
           
                <div class="form-input col-md-3">
                <input type="text" class="parsley-validated" id="barcode" name="barcode" placeholder="Bar Code" /></div>				
            </div> 
			<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="stock">
                      Shelf & Stock
                    </label>
                </div>
                <div class="form-input col-md-4" >
                     <div class="form-input">
                        <select  data-placeholder="select stock" id="stock" name="stock" class="chosen-select">
						<option value='' />
						<?php
			
							$query_shelf=mysql_query("select *from shelf ");
                            while($shelf=mysql_fetch_assoc($query_shelf)){
								
								$shelf_name=$shelf['name'];
								$shelf_id=$shelf['id'];
								$stock_id=$shelf['stock_id'];
								$query_stock=mysql_query("select name from stock where id='$stock_id'");
									$select_stock=mysql_fetch_assoc($query_stock);
									$stock_name=$select_stock['name'];
								echo "<option value='$shelf_id' />".$shelf_name." ".$stock_name;
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
                    <button type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                                <span onclick="add_purchase();" class="button-content">
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
