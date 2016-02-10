<?php
include("header.php");

 ?>
 <?php
 include_once("../lib/db.php");
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
				

			<div id="page-content">
			
         <h2> Purchase Regestration Form </h2></br>
         
         <form action="purchaseform2.php" method = "POST">
         
         <div class="form-row pad0B row">
         <div class="form-row">
         <div class="form-label col-md-2">
         
                    <label for="">
                        Companey :
        <span class="required">*</span>						
                    </label>
                </div>
			
         
         <div class="form-input col-md-10">
                    <select id="" class="col-md-4" name="company">
                        <option /> 
                <?php
				
				$select_company=mysql_query("select * from company");
				
				While($row_company=mysql_fetch_assoc($select_company)){
					
				$company_name=$row_company["name"];	
				$company_id=$row_company["id"];	
				
				echo "<option value='$company_id'/> ".$company_name;
				}
						
				?>        

					</select>
                </div>
            
           </div>
         	</div>
         
         <div class="form-row pad0B row">    
         <div class="form-row">
			<div class="form-label col-md-2">
				
                    <label for="">
                        Bill_Number : 
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="123" class="col-md-4" type="text" name="bill" id="" />
                
				</div>
            </div>
			</div>
         

            			<div class="form-row pad0B row">
            		
					<div class="form-row">
                <div class="form-label col-md-2">
                    
					<label for="">
                        Date :
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="date" id="" />
                </div>
            	</div>
				</div>


			<div class="form-row pad0B row">
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Categorey:
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <select id="" class="col-md-4" name="cat">
                        <option />Drug
                        <option />Healte &Beauty
                        <option />Option
                        <option />Option
                    </select>
                </div>
            </div> 
          </div>
          
		   <div class="form-row pad0B row">
		   <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Type:
						<span class="required">*</span>
                    </label>
                </div>
				
                <div class="form-input col-md-10">
                    <select id="" class="col-md-4" name="type">
                        <option />Injection
                        <option />Option 2
                        <option />Option 3
                        <option />Option 4
                    </select>
                
			</div>
			</div>
            </div>
          
			</form>
            <br><br>
			
   <form action="purchaseform2.php" method = "POST" style= " margin-right:200px; height:420px;border:1px solid gray; padding:20px; padding-left :50px;">
			   
			 </br>
			
            
   
             <div class="form-row pad0B row">
			 
             <div class="form-row">
             <div class="form-label col-md-2">
				
                    <label for="">
                     Proudect_Name:
						<span class="required">*</span>
											
                    </label>
                </div>
			
                <div class="form-input col-md-10">
                    <select id="" class="col-md-4" name="">
                        <option />Herat Farma
                        <option />Asia pharmacy
                        <option />Afghan pharma
                        <option />kabul pharmacy
                    </select>
                </div>
                </div>
            </div> 
            

            			<div class="form-row pad0B row">
            			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Product_Date:  
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="" id="" />
                </div>
            </div>
			</div>


			
			<div class="form-row pad0B row">
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Expire_Date : 
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="" id="" />
                </div>
            </div>
            </div>
            
            
			<div class="form-row pad0B row">
<div class="form-row">
			<div class="form-label col-md-2">
                    <label for="">
                        Unit Price :  
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="" id="" />
                </div>
            </div>
            </div>
            
			<div class="form-row pad0B row">
                <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Quantity : 
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="" id="" />
                </div>
            </div>
            </div>
            
			<div class="form-row pad0B row">
                
                <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Total Price : 
						<span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input placeholder="000" class="col-md-4" type="text" name="" id="" />
                </div>
            </div>
            </div>
            
            
			 <div class="form-row pad0B row">
                <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Stock  : 
						<span class="required">*</span>
                    </label>
                </div>
			
                <div class="form-input col-md-10">
                    <select id="" class="col-md-4" name="">
                        <option />Herat Farma
                        <option />Asia pharmacy
                        <option />Afghan pharma
                        <option />kabul pharmacy
                    </select>
                </div>
            </div> 
			</div>
			
			<a href="#" class="btn large primary-bg" title=""  Style = "float:right;">
			
            <span class="btn large primary-bg">Add</span>
			</a>
			
            </div>
				<button class="btn large primary-bg" name= "submit">
            <span class="button-content">Submit</span> 
			</button>
     &nbsp
            <a href="#" class="btn large primary-bg" title="">
            <span class="button-content">Reset</span>
            
        </a>
		
            </form>
            
            
            
         
        
         
        
		    
                
			
		  	

			
			
		
	   

            </div>

            <?php 
            
            
             if (isset($_POST['submit']) )
			 {
			 $company = $_POST['company'];
             		$sql="INSERT INTO company(`name`) VALUES('$companey')";
					mysql_query($sql) or die(mysql_error());
					
             		header('Location:new.php');
             		             	}
            	
            ?>
            
            
            
   </div><!-- #page-content -->
            </div><!-- #page-main -->
        </div><!--
    </body>
</html>
