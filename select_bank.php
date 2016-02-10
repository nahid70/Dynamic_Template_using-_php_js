<?php
session_start();
include_once("../lib/db.php");
$selct_type = $_POST['select_type'];

if(isset($_POST['bank'])){
	
$_SESSION['select_bank_id'] = $_POST['bank'];
}
?>

<div class="form-row">



								<div class="form-label col-md-2">
									<label for="bank">
									   Select Bank:
									</label>
								</div>
								<div id="bank" name="bank" class="form-input col-md-3">
								
									<div class="form-input">
										<select id="type2" name="type2" data-placeholder="Change statistics area" />
											
											<option value='all_bank'/>All Banks
											<?php
								
								
								if($selct_type == "expense"){
								
									$query_bank_id="select * from expense where  deleted != 'deleted'";
											$query_bank_run=mysql_query($query_bank_id);
											while($row_id=mysql_fetch_assoc($query_bank_run)){
												$name_id=$row_id['bank_id'];
												$query_bank = mysql_query("select * from bank where id='$name_id'");
												while($row_bank = mysql_fetch_assoc($query_bank)){
													$name = $row_bank['name'];
													$id = $row_bank['id'];
													
													echo "<option value='$id' />".$name;
													
													
												}
											}	
								}
								else if($selct_type == income){
									$query_bank_id="select * from income where  deleted != 'deleted'";
											$query_bank_run=mysql_query($query_bank_id);
											while($row_id=mysql_fetch_assoc($query_bank_run)){
												$name_id=$row_id['bank_id'];
												$query_bank = mysql_query("select * from bank where id='$name_id'");
												while($row_bank = mysql_fetch_assoc($query_bank)){
													$name = $row_bank['name'];
													$id = $row_bank['id'];
													
													echo "<option value='$id' />".$name;
												}
											}
								}
								
							?>
                
									</div>
							  </div>
						
							</div>
					