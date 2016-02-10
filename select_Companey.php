<?php
session_start();
include_once("../lib/db.php");
$selct_type = $_POST['Select'];

if(isset($_POST['bank'])){
	
$_SESSION['select_bank_id'] = $_POST['bank'];
}
?>

<div class="form-row">



								<div class="form-label col-md-2">
									<label for="bank">
									   BillNumbers:
									</label>
								</div>
								<div id="bank" name="bank" class="form-input col-md-3">
								
									<div class="form-input">
										<select id="type2" name="type2" data-placeholder="Change statistics area" />
											
											<option value='all_bill'/>All Bills
											<?php
								
								
								
							
							if($selct_type=='all_companey'){
							$select_Bills="select * from company_bills WHERE  deleted !='deleted'";
							}
							else{
							$select_Bills="select * from company_bills WHERE deleted !='deleted' && company_id='$selct_type'";
							}
							
							$query_BillNumber=mysql_query($select_Bills);
							while($company=mysql_fetch_assoc($query_BillNumber)){
							$Bill_name=$company['no'];
							$Bill_id=$company['id'];
							echo "<option value='$Bill_id' />".$Bill_name;	
							}
							
							
								
							?>
                
									</div>
							  </div>
						
							</div>
					