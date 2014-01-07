<?php
	$login = isset($_SESSION['profileType']);
	if($login){
		$admin = $_SESSION['profileType'] == "ADMIN";
		$ovcca = $_SESSION['profileType'] == "OVCCA";
		$cashier = $_SESSION['profileType'] == "CASHIER";
		$operator = $_SESSION['profileType'] == "OPERATOR";
		$private = $_SESSION['profileType'] == "PRIVATE";
		$public = $_SESSION['profileType'] == "PUBLIC";
		$operations = $_SESSION['profileType'] == "OPERATIONS";
		$applicant = $_SESSION['profileType'] == "APPLICANT";
		$investigation = $_SESSION['profileType'] == "INVESTIGATION";
	}
?>
<div id="header"></div>
<div id='options'>
	<ul>
		<?php if($applicant){ ?>
			<li><a class="howtoM menuitem" href="<?php echo $root; ?>RegistrationProcess.php">Registration Process</a></li>
			<? } ?>
		<?php if($login){ ?>
			<!-- for all users -->
			
			<li><a class="homepageM menuitem" href="<?php echo $root; ?>HomePage/">Homepage</a></li>
			
			<li><a class="profileM menuitem" href="<?php echo $root; ?>UpdateProfile/">Profile</a></li>
			
			<!-- admin -->
			<?php if($admin || $ovcca || $operations || $investigation){ ?>
				<li><a class="applicantM menuitem" href="<?php echo $root; ?>Applicant/">Users</a></li>
			<?php } ?>
			
			<?php if(!$cashier && !$operations || $investigation){ ?>
				<li><a class="vehicleM menuitem" href="<?php echo $root; ?>Vehicle/">Vehicle</a></li>
			<?php } ?>
			
			<?php if(!$cashier || $investigation){ ?>
				<li><a class="driverM menuitem" href="<?php echo $root; ?>Driver/">Driver</a></li>
			<?php } ?>
			
			<!-- cashier -->
			<?php if($cashier){ ?>
				<li><a class="vehicleM menuitem" href="<?php echo $root; ?>Vehicle/">Vehicle</a></li>
				<li><a class="paymentM menuitem" href="<?php echo $root; ?>Payment/">Payment</a></li>
			<?php } ?>
			
			<!-- admin, ovcca -->
			<?php if($admin || $ovcca || $operations || $investigation){ ?>
				<li><a class="violationM menuitem" href="<?php echo $root; ?>Violation/">Violation</a></li>
			<?php } ?>
			
			<?php if($admin || $operations){ ?>
				<li><a class="inspectionM menuitem" href="<?php echo $root; ?>Inspection/">Inspection</a></li>
			<?php } ?>
			
			<?php if($admin || $cashier){ ?>
				<li><a class="stickerM menuitem" href="<?php echo $root; ?>Sticker/">Sticker</a></li>
			<?php } ?>
			
			<?php if($ovcca || $admin){ ?>
				<li><a class="logM menuitem" href="<?php echo $root; ?>Log/">Logs</a></li>
			<?php } ?>
			
			<?php if($admin){ ?>
				<li><a class="optionM menuitem" href="<?php echo $root; ?>Option/">Option</a></li>
			<?php } ?>
			
			<!-- for all users -->
			<li style="float: right;"><a class="menuitem" href="<?php echo $root; ?>logout.php">Logout</a></li>
		<?php } else { ?>
			<li style="float: right;"><a class="menuitem" href="<?php echo $root; ?>">Login</a></li>
			<li style="float: right;"><a class="reportM menuitem" href="<?php echo $root; ?>Report/">Report a Violation</a></li>
		<?php } ?>
	</ul> 
</div>