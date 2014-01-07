<!--
  - File Name: HomePage/index.php
  - Program Description: home page
  -->
<?php
	$root = "../"; // root folder
	$pageTitle = "Home";
	$currentMenu = "homepage";
	
	session_start();
	if(!isset($_SESSION['username'])) header("Location: ../");
	
	include "../RegistrationManager.php";
	$rm = new RegistrationManager();
?>
<html>
	<?php include $root."head.php"; ?>
	
	<body id='searchProfile'>
		<div id='centerArea'>
			<?php include $root."menu.php"; // display menu options ?>
			
			<div id="content">
				<form name="disp"  method="post" action="RegistrationManager.php">
				<?php 
					
						echo "<div style=''>";
							switch($_SESSION['profileType']){
								//case "PRIVATE":
								//case "PUBLIC":
								//case "OPERATOR":
								case "APPLICANT":
									$rm->showProfile($_SESSION['username']);
									$vehicles = $rm->retrieveVehicle($_SESSION['profileID']);
									if(isset($_SESSION['driverID']) && $_SESSION['driverID'] != ""){
										$violations = $rm->retrieveViolations("driverID=".$_SESSION['driverID']);
										$drivers = $rm->retrieveDrivers($_SESSION['profileID']);
									}
									
									/* print the vehicles */
									if($vehicles != "")
									{
										$row = mysql_fetch_array($vehicles);
										if($row != null){
											echo "Vehicle/s Information:";
										
											echo "<table id='result'>";
											echo "
												<tr>
													<th>Plate Number</th>
													<th>Sticker Number</th>
													<th>Status</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											";
										
											while($row != null){
												echo"
													<tr>
														<td>".$row['plateNumber']."</td>
														<td>".$row['stickerNumber']."</td>
														<td align='center'>";
															if($row['status'] == "released"){
																echo $row['status'];
															}elseif($row['paid'] != "0000-00-00"){
																echo "paid";
															}else{
																echo $row['status'].($row['status']=="disapproved" ? ("<br>-<br>".$row['condition']) : "");
															}
												echo	"</td>";
														if($row['paid'] == '0000-00-00'){
															echo "<td><a title='Edit Vehicle' href='../Vehicle/Update/?pn=".$row['plateNumber']."'><img src='".$root."assets/images/icons/edit24.png'></a></td>";
															echo "<td><a title='Delete Vehicle' href='../Vehicle/DeleteVehicle.php/?pn=".$row['plateNumber']."'><img src='".$root."assets/images/icons/delete24.png'></a></td>";
														} else {
															echo "<td><img title='Cannot Edit Vehicle' src='".$root."assets/images/icons/edit24_x.png'></td>";
															echo "<td><img title='Cannot Delete Vehicle' src='".$root."assets/images/icons/delete24_x.png'></td>";
														}
												echo "</tr>";
												$row = mysql_fetch_array($vehicles);
											}
											echo "</table>";
										}
									}
									
									/* print violations */
									if(isset($_SESSION['driverID']) && $_SESSION['driverID'] != ""){
										$row = mysql_fetch_assoc($violations);
										if($row != null){
											echo "<br>";
											echo "User Violation/s:";
											echo "<table id='result'>";
											echo "
												<tr>
													<th>Plate Number</th>
													<th>Violation</th>
													<th>Date</th>
													<th>Time</th>
													<th>Location</th>
													<th>Penalty</th>
												</tr>
											";
											while($row != ""){
												//echo "<pre>"; print_r($row); echo "</pre>";
												if($row['approve']==1){
													echo "<tr>";
														echo "<td>".$row['plateNumber']."</td>";
														echo "<td>".$row['violation']."</td>";
														echo "<td>".$row['violationDate']."</td>";
														echo "<td>".$row['violationTime']."</td>";
														echo "<td>".$row['violationLocation']."</td>";
														echo "<td>".$row['penalty']."</td>";
														//echo "<td>".$row['reporter']."</td>";
													echo "</tr>";
												}
												$row = mysql_fetch_assoc($violations);
												
											}
											echo "</table>";
										}
									}
									
									/* print the drivers */
									$row = mysql_fetch_assoc($drivers);
									if($row != null){
										echo "<br>";
										echo "Driver/s:";
										echo "<table id='result'>";
											echo "
												<tr>
													<th>Driver ID</th>
													<th>Name</th>
													<th>License Number</th>
												</tr>
											";
										while($row != ""){
											echo "<tr>";
												//echo "<pre>"; print_r($row); echo "</pre>";
												echo "<td>".$row['driverID']."</td>";
												echo "<td>".$row['lastName'].", ".$row['givenName']." ".$row['middleName']."</td>";
												echo "<td>".$row['licenseNumber']."</td>";
											echo "</tr>";
											$row = mysql_fetch_assoc($drivers);
										}
										echo "</table>";
									}
									
									break;
								case "ADMIN":
									echo "Welcome <b>Administrator</b>. <br>
										<br>
										<i>Guidelines on how to use the application:</i><br><br>
										<b>Profile</b> Tab:<br> -	you can change your password.<br><br>
										<b>Users</b> Tab:<br>	-	Search for a User according to your filter/s.<br>
																-	Add, Edit or Delete a User.<br>
																-	Block a User to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Vehicle</b> Tab:<br> -	Search for a Vehicle according to your filter/s.<br>
																-	Add, Edit or Delete a Vehicle.<br>
																-	Change the status to 'approved' or 'disapproved'.<br>
																-	Block a Vehicle to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Driver</b> Tab:<br>	-	Search for a Driver according to your filter/s.<br>
																-	Add, Edit or Delete a Driver.<br>
																-	Block a Driver to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Violation</b> Tab:<br>	-	Search for a Violation according to your filter/s.<br>
																-	Add, Edit or Delete a Violation.<br>
																-	Approve/Disapprove Violations reported by Civilians.<br>
																-	Print or save to pdf.<br><br>
										<b>Inspection</b> Tab:<br>	-	Search for an Inspected vehicle according to your filter/s.<br>
																-	Add, Edit or Delete a vehicle that has been inspected.<br>
																-	Print or save to pdf.<br><br>
										<b>Sticker</b> Tab:<br>	-	You will just have to input the Plate Number, Sticker number and the Date when a sticker is released.<br><br>
										<b>Logs</b> Tab:<br>	-	Search or View ALL logs/changes to the database according to your filter/s..<br>
																-	Print or save to pdf.<br><br>
										<b>Option</b> Tab:<br>	-	A place to input the maximum number of violations if it is set already by the OVCCA.<br>
																-	A place to set the maximum number of inspections per day (for scheduling of inspections). <br>
																-	Reset ALL Vehicle information (To be used for renewal each year).<br><br>
									";
									break;
								case "OVCCA":
									echo "Welcome <b>Vice Chancellor</b>. <br>
										<br>
										<i>Guidelines on how to use the application:</i><br><br>
										<b>Profile</b> Tab:<br> -	you can change your password.<br><br>
										<b>Users</b> Tab:<br>	-	Search for a User according to your filter/s.<br>
																-	Add, Edit or Delete a User.<br>
																-	Block a User to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Vehicle</b> Tab:<br> -	Search for a Vehicle according to your filter/s.<br>
																-	Add, Edit or Delete a Vehicle.<br>
																-	Change the status to 'approved' or 'disapproved'.<br>
																-	Block a Vehicle to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Driver</b> Tab:<br>	-	Search for a Driver according to your filter/s.<br>
																-	Add, Edit or Delete a Driver.<br>
																-	Block a Driver to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Violation</b> Tab:<br>	-	Search for a Violation according to your filter/s.<br>
																-	Add, Edit or Delete a Violation.<br>
																-	Approve/Disapprove Violations reported by Civilians.<br>
																-	Print or save to pdf.<br><br>
										<b>Logs</b> Tab:<br>	-	Search or View ALL logs/changes to the database according to your filter/s..<br>
																-	Print or save to pdf.<br><br>
									";
									break;
								case "CASHIER":
									echo "Welcome <b>Cashier</b>. <br>
										<br>
										<i>Guidelines on how to use the application:</i><br><br>
										<b>Profile</b> Tab:<br> -	you can change your password.<br><br>
										<b>Vehicle</b> Tab:<br> -	Search for a Vehicle according to your filter/s.<br>
																-	Add, Edit or Delete a Vehicle.<br>
																-	Change the status to 'approved' or 'disapproved'.<br>
																-	Block a Vehicle to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Payment</b> Tab:<br> -	Search for a Vehicle according to your filter/s.<br>
																-	Change the status to 'paid'.<br>
																-	Print or save to pdf.<br><br>
										<b>Sticker</b> Tab:<br>	-	You will just have to input the Plate Number, Sticker number and the Date when a sticker is to be released.<br><br>
									";
									break;
								case "OPERATIONS":
									echo "Welcome <b>Operations</b>. <br>
										<br>
										<i>Guidelines on how to use the application:</i><br><br>
										<b>Profile</b> Tab:<br> -	you can change your password.<br><br>
										<b>Users</b> Tab:<br>	-	Search for a User according to your filter/s.<br>
																-	Add, Edit or Delete a User.<br>
																-	Block a User to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Driver</b> Tab:<br>	-	Search for a Driver according to your filter/s.<br>
																-	Add, Edit or Delete a Driver.<br>
																-	Block a Driver to prevent registration in the following years.<br>
																-	Print or save to pdf.<br><br>
										<b>Violation</b> Tab:<br> -	Search for a Violation according to your filter/s.<br>
																-	Add, Edit or Delete a Violation.<br>
																-	Approve/Disapprove Violations
																reported by Civilians.<br>
																-	Print or save to pdf.<br><br>
										<b>Inspection</b> Tab:<br>	-	Search for an Inspected vehicle according to your filter/s.<br>
																-	Add, Edit or Delete a vehicle that has been inspected.<br>
																-	Print or save to pdf.<br><br>
									";
									break;
									case "INVESTIGATION":
									echo "Welcome <b>Investigation</b>. <br>
										<br>
										<i>Guidelines on how to use the application:</i><br><br>
										<b>Profile</b> Tab:<br> -	you can change your password.<br><br>
										<b>Users</b> Tab:<br>	-	Search for a User according to your filter/s.<br>
																-	Print or save to pdf.<br><br>
										<b>Vehicle</b> Tab:<br> -	Search for a Vehicle according to your filter/s.<br>
																-	Print or save to pdf.<br><br>
										<b>Driver</b> Tab:<br>	-	Search for a Driver according to your filter/s.<br>
																-	Print or save to pdf.<br><br>
										<b>Violation</b> Tab:<br> -	Search for a Violation according to your filter/s.<br>
																-	Print or save to pdf.<br><br>
									";
									break;
							}
						echo "</div>";
					?>
				</form>
			</div>
		</div>
	</body>
</html>
<?php
	if(isset($_SESSION['searchnull'])) unset($_SESSION['searchnull']);
?>