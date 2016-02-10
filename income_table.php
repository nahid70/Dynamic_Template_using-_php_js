<?php
echo"
								<table class='table' id='example1'>
										<thead>
											<tr>
												<th>No</th>
												<th>Bank</th>
												<th>Income</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Operation</th>
											</tr>
										</thead>
										<tbody>";
										
									
							
								echo '<br>Selected income types between : ( &nbsp;&nbsp;'.$from.' &nbsp;&nbsp; - &nbsp;&nbsp;'.$to.' &nbsp;&nbsp; )<div class="divider"></div><br>';
								
								if($_POST['type2'] == 'all_bank'){
								$query ="select * from income where date>= '$from' and date<='$to' and deleted != 'deleted' ";
								}
								else{
									$bank_id =  $_POST['type2'] ;
									$query ="select * from income where bank_id='$bank_id' and date>= '$from' and date<='$to' and deleted != 'deleted' ";
								}
								$query_run = mysql_query($query);
								while($row = mysql_fetch_assoc($query_run)){
									
									$bank_id = $row['bank_id'];
									$income_id = $row['income_types_id'];
										echo"
												<tr>";
												$i++;
												$id = $row['id'];
											  echo" <td>$i</td>
											   ";
													$bank_query = mysql_query("select * from bank where id= '$bank_id'");
													$bank_row = mysql_fetch_assoc($bank_query);
														echo"<td class='font-bold text-left'>".$bank_row['name']."</td> 
												";
													$income_type_query = mysql_query("select * from income_types where id= '$income_id'");
													$income_type_row = mysql_fetch_assoc($income_type_query);
														echo"<td class='font-bold text-left'>".$income_type_row['name']."</td>
												<td class='font-bold text-left'>".$row['amount']."</td>
												<td class='font-bold text-left'>".$row['date']."</td>
												
												<td>
												
													
													<a href='income_view.php?id=".$row['id']."' class='btn small bg-yellow tooltip-button'
													 data-placement='top' title='View'>
														<i class='glyph-icon icon-flag'></i>
													</a>
													<a href='income_edit.php?id=".$row['id']."'  class='btn small bg-blue-alt tooltip-button'
													data-placement='top' title='Edit'>
														<i class='glyph-icon icon-edit'></i>
													</a>";?>
													<a href='expense_income_report.php?idd=<?php echo $id; ?>' 
													onclick="return confirm('Are you sure you want to delete it!');"
													class='btn small bg-red tooltip-button' class='btn small bg-red tooltip-button' 
													data-placement='top' title='Delete'>
														<i class='glyph-icon icon-remove'></i>
													</a>
												</td>
												
												</tr>
												</tbody>
												<?php
												
										}
									echo "</table>";
?>