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
	<?php
		 if(isset($_POST['na']) && isset($_POST['Ad']) && isset($_POST['cont']) && isset($_POST['Em']) && isset($_POST['cord'])){
		$name = $_POST['na'];
		$Address = $_POST['Ad'];
		echo  $date;
		$contact = $_POST['cont'];
		$Email = $_POST['Em'];
		$cordinator = $_POST['cord'];
		//echo 'ok';
		if(!empty($name) && !empty($Address) && !empty($contact) && !empty($Email) && !empty($cordinator)){
		$query = "INSERT INTO company ( name, address, contact, email, cordinator) values('$name','$Address','$contact','$Email','')";
		if($query_run = mysql_query($query)){
		
		}								
		$que = "INSERT INTO purchase(date,unit_price, total_price, product_date, expire_date,quantity) 
		VALUES('$date','$unite','$total','$product','$Expire','$quantity')";
		mysql_query($que);						
		}
		
		}
		?>
		</br>
		<form id="demo-form-2" action="AddnewCompaney.php" class="col-md-10 center-margin" method="post" />
		</br>
		</br>
		</br>
		</br>
			<div class="form-row">
			<div class="form-label col-md-2" >
			<label for="na">
								Name:
								<span class="required">*</span>
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="na" name="na" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>			
			<div class="form-row">
			<div class="form-label col-md-2" >
			<label for="Ad">
								Address:
								<span class="required">*</span>
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="Ad" name="Ad" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>
			<div class="form-row">
			<div class="form-label col-md-2" >
			<label for="cont">
								Contact:
								<span class="required">*</span>
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="cont" name="cont" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>
			<div class="form-row">
			<div class="form-label col-md-2" >
			<label for="Em">
								Email:
								<span class="required">*</span>
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="Em" name="Em" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>
			<div class="form-row">
			<div class="form-label col-md-2" >
			<label for="cord">
								Coordinator:
								<span class="required">*</span>
							</label>
						</div>
						<div class="form-input col-md-4" >
							<input type="text" id="cord" name="cord" data-trigger="change" data-type="url" class="parsley-validated" />
						</div>
						
			</div>
			</br>
			</br>
			</br>
			</br>
			</br>
			
				<div class="divider"></div>
				<div class="form-row">
			    
				<div class="form-input col-md-10 col-md-offset-2">
				<button type="submit" class="btn large primary-bg text-transform-upr font-size-11" title="Validate!" name = "btn">
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
	</form>
    </div>
</div>

	<table class="table" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Companey</th>
			<th>Bill Number</th>
			<th>Total price</th>
			<th>Payment</th>
			<th>Unit Left</th>
			<th>Operation</th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>2/3/2015
				 </td>
			<td>AfghanPharma</td>
			<td class="center">4</td>
			<td class="center">1000 Af</td>
			<td class="center">500 Af</td>
			<td class="center">500 Af</td>
			<td class="center"><div class="dropdown">
<a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
		<span class="button-content">
		<i class="glyph-icon font-size-11 icon-cog"></i>
		<i class="glyph-icon font-size-11 icon-chevron-down"></i>
			</span>
			</a>
			<ul class="dropdown-menu float-right">
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-unchecked mrg5R"></i>
			  View
				</a>
			</li>									
		<li>
		<a href="javascript:;" title="">
		<i class="glyph-icon icon-edit mrg5R"></i>
		Edit
		</a>
	 </li>
		<li class="divider"></li>
		<li>
		<a href="javascript:;" class="font-red" title="">
		<i class="glyph-icon icon-remove mrg5R"></i>
			Delete
			</a>
			</li>
			</ul>
			</div>
			</td>
		</tr>
		<tr>
			<td>2 </td>
			<td>2/3/2015
				 </td>
			<td>AfghanPharma</td>
			<td class="center">4</td>
			<td class="center">1000 Af</td>
			<td class="center">500 Af</td>
			<td class="center">500 Af</td>
			<td class="center"><div class="dropdown">
<a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
		<span class="button-content">
		<i class="glyph-icon font-size-11 icon-cog"></i>
		<i class="glyph-icon font-size-11 icon-chevron-down"></i>
			</span>
			</a>
			<ul class="dropdown-menu float-right">
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-unchecked mrg5R"></i>
			  View
				</a>
				</li>
												
		<li>
		<a href="javascript:;" title="">
		<i class="glyph-icon icon-edit mrg5R"></i>
		Edit
		</a>
	 </li>
		<li class="divider"></li>
		<li>
		<a href="javascript:;" class="font-red" title="">
		<i class="glyph-icon icon-remove mrg5R"></i>
			Delete
			</a>
			</li>
			</ul>
			</div>
			</td>
		</tr>
		<tr>
			<td>3</td>
			<td>2/3/2015
				 </td>
			<td>AfghanPharma</td>
			<td class="center">4</td>
			<td class="center">1000 Af</td>
			<td class="center">500 Af</td>
			<td class="center">500 Af</td>
			<td class="center"><div class="dropdown">
<a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
		<span class="button-content">
		<i class="glyph-icon font-size-11 icon-cog"></i>
		<i class="glyph-icon font-size-11 icon-chevron-down"></i>
			</span>
			</a>
			<ul class="dropdown-menu float-right">
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-unchecked mrg5R"></i>
			  View
				</a>
													</li>
												
		<li>
		<a href="javascript:;" title="">
		<i class="glyph-icon icon-edit mrg5R"></i>
		Edit
		</a>
	 </li>
		<li class="divider"></li>
		<li>
		<a href="javascript:;" class="font-red" title="">
		<i class="glyph-icon icon-remove mrg5R"></i>
			Delete
			</a>
			</li>
			</ul>
			</div>
			</td>
		</tr>
		<tr>
			<td>4</td>
			<td>2/3/2015
				 </td>
			<td>AfghanPharma</td>
			<td class="center">4</td>
			<td class="center">1000 Af</td>
			<td class="center">500 Af</td>
			<td class="center">500 Af</td>
			<td class="center"><div class="dropdown">
<a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
		<span class="button-content">
		<i class="glyph-icon font-size-11 icon-cog"></i>
		<i class="glyph-icon font-size-11 icon-chevron-down"></i>
			</span>
			</a>
			<ul class="dropdown-menu float-right">
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-unchecked mrg5R"></i>
			  View
				</a>
													</li>
												
		<li>
		<a href="javascript:;" title="">
		<i class="glyph-icon icon-edit mrg5R"></i>
		Edit
		</a>
	 </li>
		<li class="divider"></li>
		<li>
		<a href="javascript:;" class="font-red" title="">
		<i class="glyph-icon icon-remove mrg5R"></i>
			Delete
			</a>
			</li>
			</ul>
			</div>
			</td>
		</tr>
		<tr>
			<td>5</td>
			<td>1/2/2014
				</td>
			<td>Asyapharma</td>
			<td class="center">5</td>
			<td class="center">3000  Af</td>
			<td class="center">2000  Af</td>
			<td class="center">1000 Af</td>
			<td class="center"><div class="dropdown">
			<a href="javascript:;" title="" class="btn medium bg-blue" data-toggle="dropdown">
			<span class="button-content">
			<i class="glyph-icon font-size-11 icon-cog"></i>
	        <i class="glyph-icon font-size-11 icon-chevron-down"></i>
					</span>
			</a>
			<ul class="dropdown-menu float-right">
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-unchecked mrg5R"></i>
					View
			</a>
			</li>
												
			<li>
			<a href="javascript:;" title="">
			<i class="glyph-icon icon-edit mrg5R"></i>
				Edit
			</a>
			</li>
			<li class="divider"></li>
			<li>
			<a href="javascript:;" class="font-red" title="">
			<i class="glyph-icon icon-remove mrg5R"></i>
			Delete
			</a>
			</li>
			</ul>
			</div>
			</td>
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