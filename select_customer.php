<?php 
include("header.php");
?>
<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="">
                        CUstomer:
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
			 <div class="col-md-3">

                <a href="javascript:;" class="primary-bg medium radius-all-2 display-block btn white-modal-80">
                    <span class="button-content text-center float-none font-size-11 text-transform-upr">Add New Customer</span>
                </a>

                <div class="hide" id="white-modal-80" title="Add New Customer">
                  
				<form action="" id="login-validation" class="col-md-3 center-margin form-vertical mrg25T" method="" />
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
					<div class="button-pane text-center">
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
			