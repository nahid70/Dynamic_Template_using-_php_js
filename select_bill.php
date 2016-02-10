<?php
include("../lib/db.php");
$company_id=$_GET['company'];
?>
<div class="form-row" >
                <div class="form-label col-md-2">
                    <label for="company">
                      Bill No
                    </label>
                </div>
                <div class="form-input col-md-4" >
                          <div class="form-input">
                        <select data-placeholder="select customer" id="bill_no" name="bill_no" class="chosen-select">
					
						<?php
							$select_companys="select *from company_bills where company_id='$company_id' order by id desc";
							$query_company=mysql_query($select_companys);
                            while($company=mysql_fetch_assoc($query_company)){
								$bill_no=$company['no'];
								$bill_id=$company['id'];
								
								 echo "<option value='$bill_id' />".$bill_no;
							}
						?>   
                        </select>
                    </div>
              </div>
             </div>
            