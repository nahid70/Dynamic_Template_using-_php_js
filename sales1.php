<?php
include("header.php");
 ?>
 <script >
  var i=1;
  function Add_inject(){
	
	var append = "<div class='form-row' id='inject'><div class='form-label col-md-2'><label for=''>Injection"+i+" :</label></div><div class='form-input col-md-4' ><div class='form-input'><select data-placeholder='Change statistics area' class='chosen-select'><option value='' /> <option value='United States' />United States <a href='new.php'><option value='United States' />Add New Customer</a> </select></div></div><div class='form-row pad0B'><div class='form-input col-md-2'><input class='spinner-input' name='' placeholder='Quantity' id='' /></div></div></div>";
	$('#inject').after(append);
	i++;
  }
  var t=1;
  function Add_tablet(){
	
	var append = "<div class='form-row' id='tablet'><div class='form-label col-md-2'><label for=''>Tablet"+t+" :</label></div><div class='form-input col-md-4' ><div class='form-input'><select data-placeholder='Change statistics area' class='chosen-select'><option value='' /> <option value='United States' />United States <a href='new.php'><option value='United States' />Add New Customer</a> </select></div></div><div class='form-row pad0B'><div class='form-input col-md-2'><input class='spinner-input' name='' placeholder='Quantity' id='' /></div></div></div>";
	$('#tablet').after(append);
	t++;
  }
  var s=1;
  function Add_soup(){
	
	var append = "<div class='form-row' id='soup'><div class='form-label col-md-2'><label for=''>Soup"+s+" :</label></div><div class='form-input col-md-4' ><div class='form-input'><select data-placeholder='Change statistics area' class='chosen-select'><option value='' /> <option value='United States' />United States <a href='new.php'><option value='United States' />Add New Customer</a> </select></div></div><div class='form-row pad0B'><div class='form-input col-md-2'><input class='spinner-input' name='' placeholder='Quantity' id='' /></div></div></div>";
	$('#soup').after(append);
	s++;
  }
  var o=1;
  function Add_other(){
	
	var append = "<div class='form-row' id='other'><div class='form-label col-md-2'><label for=''>Other"+o+" :</label></div><div class='form-input col-md-4' ><div class='form-input'><select data-placeholder='Change statistics area' class='chosen-select'><option value='' /> <option value='United States' />United States <a href='new.php'><option value='United States' />Add New Customer</a> </select></div></div><div class='form-row pad0B'><div class='form-input col-md-2'><input class='spinner-input' name='' placeholder='Quantity' id='' /></div></div></div>";
	$('#other').after(append);
	o++;
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

        <form id="demo-form-2" action="new.php" class="col-md-10 center-margin" method="" />
            <div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="">
                        customer:
                    </label>
                </div>
               <div class="form-input col-md-4">
                    <select id="" name="" onchange="select_customer(this.value);">
                        <option value="opd"/>OPD
                        <option value="customer"/>Customer
                        
                    </select>
                </div>
            </div>
			<div id="select_customer">
			
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
                        Injection:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select data-placeholder="Change statistics area" class="chosen-select">
                            <option value="" /> 
                            <option value="United States" />United States 
                            <a href='new.php'><option value="United States" />Add New Customer</a> 
                           
                        </select>
                    </div>
              </div>
			  <div class="form-row pad0B">
                
                <div class="form-input col-md-2">
                    <input class="spinner-input" name="" placeholder="Quantity" id="" />
                </div>
          
			  	<a onclick="Add_inject();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#s-sign-alt"><i class="glyph-icon icon-plus-sign-alt"></i></a>
			  </div>
			</div>
			
            <div class="form-row" id="tablet">
                <div class="form-label col-md-2">
                    <label for="">
                        Tablet:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select data-placeholder="Change statistics area" class="chosen-select">
                            <option value="" /> 
                            <option value="United States" />United States 
                            <a href='new.php'><option value="United States" />Add New Customer</a> 
                           
                        </select>
                    </div>
              </div>
			  <div class="form-row pad0B">
                
                <div class="form-input col-md-2">
                    <input class="spinner-input" name="" placeholder="Quantity" id="" />
                </div>
          
			  	<a onclick="Add_tablet();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#s-sign-alt"><i class="glyph-icon icon-plus-sign-alt"></i></a>
			  </div>
			</div>
            <div class="form-row" id="soup">
                <div class="form-label col-md-2">
                    <label for="">
                        Soup:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select data-placeholder="Change statistics area" class="chosen-select">
                            <option value="" /> 
                            <option value="United States" />United States 
                            <a href='new.php'><option value="United States" />Add New Customer</a> 
                           
                        </select>
                    </div>
              </div>
            <div class="form-row pad0B">
                
                <div class="form-input col-md-2">
                    <input class="spinner-input" name="" placeholder="Quantity" id="" />
                </div>
          
			  	<a onclick="Add_soup();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#s-sign-alt"><i class="glyph-icon icon-plus-sign-alt"></i></a>
			  </div>
			</div>
			
            <div class="form-row" id="other">
                <div class="form-label col-md-2">
                    <label for="">
                        Others:
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select data-placeholder="Change statistics area" class="chosen-select">
                            <option value="" /> 
                            <option value="United States" />United States 
                            <a href='new.php'><option value="United States" />Add New Customer</a> 
                           
                        </select>
                    </div>
              </div>
			  <div class="form-row pad0B">
                
                <div class="form-input col-md-2">
                    <input class="spinner-input" name="" placeholder="Quantity" id="" />
                </div>
          
			  	<a onclick="Add_other();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#s-sign-alt"><i class="glyph-icon icon-plus-sign-alt"></i></a>
			  </div>
			</div>
			
			<div class="divider"></div>
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
                    <a href="javascript:;" class="btn medium primary-bg radius-all-4" id="demo-form-2-valid" onclick="javascript:$(&apos;#demo-form-2&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                        <span class="button-content">
                            Validate the form above
                        </span>
                    </a>
                </div>
            </div>

   
    
</div>
               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
</html>
