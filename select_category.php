<?php include("../lib/db.php");?>
<div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        Type:
                    </label>
                </div>
                <div id="staff" class="form-input col-md-4">
                          <div class="form-input">
                        <select id="type" name="type" data-placeholder="Change statistics area" class="chosen-select">
                            <?php
								$category = $_GET["category"];
								
								$types = "select * from type where category_id='$category' and deleted !='deleted'";
								$result = mysql_query($types);
								while($row = mysql_fetch_assoc($result)){
									$type_name = $row["name"];
									$type_id = $row["id"];
									
									echo "<option value='$type_id'/>".$type_name;
									
								}
							?>
                
                        </select>
                    </div>
              </div>
		
			</div>
    
       