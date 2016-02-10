<?php
include('header.php');
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

        <form id="demo-form-2" action="" class="col-md-10 center-margin" method="" />
            
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Stock Name:
                    </label>
                </div>
                <div class="form-input col-md-4">
                    <input type="text" id="website" name="website" data-trigger="change" data-type="url" class="parsley-validated" />
                </div>
            </div>
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Address:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <textarea name="" id="" class="col-md-4" style="width:38.6%;"></textarea>
                </div>
            </div>	
			<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Stock Shelfs:
                    </label>
                </div>
				<div id="shelf">
					<div class="form-input col-md-4">
						<input type="text" id="website" name="website" data-trigger="change" data-type="url" class="parsley-validated" />
					</div>
					<a onclick="Add();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#"><i class="glyph-icon icon-plus-sign-alt"></i></a>
					<a onclick="Remove();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Remove" href="#"><i class="glyph-icon icon-minus"></i></a>
				</div>
			</div>
			
            <div id="staff" class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Select Category
                    </label>
                </div>
                <div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select data-placeholder="Select Staff" class="chosen-select">
                            <option value="" /> 
                            <option value="United States" />United States 
                            <option value="United Kingdom" />United Kingdom 
                            <option value="Afghanistan" />Afghanistan 
                
                        </select>
                    </div>
              </div>
			  <a onclick="Add_staff();" class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Add Another Staff" href="#"><i class="glyph-icon icon-plus-sign-alt"></i></a>
              <a class="btn medium radius-all-4 mrg5A ui-state-default tooltip-button" title="Remove" href="#us"><i class="glyph-icon icon-minus"></i></a>
  
			</div>

            <div class="divider"></div>
				
				
			
            <div class="form-row">
                <input type="hidden" name="superhidden" id="superhidden" />
                <div class="form-input col-md-10 col-md-offset-2">
                    <a href="javascript:;" class="btn medium primary-bg radius-all-4" id="demo-form-2-valid" onclick="javascript:$(&apos;#demo-form-2&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                        <span class="button-content">
                            Submit
                        </span>
                    </a>
                </div>
            </div>

        </form>

    </div>
    
</div>

<div class="example-box">
    <div class="example-code">

        <table class="table table-condensed" style="width:90%; margin:0 auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="font-bold text-left">John Clark</td>
                    <td><a href="javascript:;">پنج راه باد مرغان جاده فردوسی ۱۵</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="View">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="font-bold text-left">Kenny Davis</td>
                    <td><a href="javascript:;">Development</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="Flag">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="font-bold text-left">David Robertson</td>
                    <td><a href="javascript:;">Support</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="Flag">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="font-bold text-left">John Doe</td>
                    <td><a href="javascript:;">Testing</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="Flag">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td class="font-bold text-left">Sofia Williams</td>
                    <td><a href="javascript:;">IT</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="Flag">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td class="font-bold text-left">Katy Lewis</td>
                    <td><a href="javascript:;">Business</a></td>
                    <td>
                        <a href="javascript:;" class="btn small bg-yellow tooltip-button" data-placement="top" title="Flag">
                            <i class="glyph-icon icon-flag"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-blue-alt tooltip-button" data-placement="top" title="Edit">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn small bg-red tooltip-button" data-placement="top" title="Remove">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    
</div>

               	</div><!-- #page-content -->         
        </div><!-- #page-wrapper -->

    </body>
</html>
