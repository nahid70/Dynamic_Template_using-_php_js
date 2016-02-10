<?php
	include("../lib/db.php");
	?><div class="form-input col-md-3" >
                     <div class="form-input" >
                        <select data-placeholder="select shelf" id="shelf" name="shelf" class="chosen-select">
						<option value='' />
						<?php
							$select_category="select *from  shelf ";
							$query_category=mysql_query($select_category);
                            while($category=mysql_fetch_assoc($query_category)){
								$category_name=$category['name'];
								$category_id=$category['id'];
								
								 echo "<option value='$category_id' />".$category_name;
							}
						?>   
                        </select>
                    </div>
              </div>