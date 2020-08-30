	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="home.php">Akruti</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item "><a href="home.php" class="nav-link">Home</a></li>
				
				<?php if($row['type']!="owner") { ?>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Owner</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="viewallO.php">Flat Owner Details</a>
						<?php if($row['type']=="secretary") { ?>
							<a class="dropdown-item" href="register.php">Register Flat Owner</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				<?php } ?>
				<?php if($row['type']=="president" || $row['type']=="ofc") { ?>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Approval</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					  <?php if($row['type']=="ofc" || $row['type']=="president") { ?>
							
						<a class="dropdown-item" href="approval.php">Approve Expenditure</a>
						<?php } ?>
							<a class="dropdown-item" href="appowner.php">Approve OwnerDetails</a>
							<a class="dropdown-item" href="applett.php">Approve Letter</a>
							<a class="dropdown-item" href="appNot.php">Approve Notice</a>
						
					  </div>
					  </div>
				  </li>
				<?php } ?>
				<?php if($row['type']!="tenant") { ?>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Expenditure/MMC Sheet</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="expenditurepdf.php">View Expenditure</a>
						<?php if($row['type']=="treas" || $row['type']=="secretary" || $row['type']=="president") { ?>
							<a class="dropdown-item" href="mmsheet.php">View MMMC Sheet</a>
						<?php } ?>
						<?php if($row['type']=="treas") { ?>
							<a class="dropdown-item" href="expanditure.php">Submit Expenditure Record</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				<?php } ?>
				
				<?php if($row['type']=="secretary") { ?>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Employee</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="employee.php">Add Employee</a>
						<a class="dropdown-item" href="employee_view.php">View Employee</a>
						<a class="dropdown-item" href="edit_employee1.php">Update/Delete Employee</a>
					  </div>
					  </div>
				  </li>
				<?php } ?>
				
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Pay/Due</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="newpay.php">Pay Charges</a>
						<a class="dropdown-item" href="paydue.php">Pay/View Due</a>
						<?php if($row['type']=="treas") { ?>
							<a class="dropdown-item" href="pay.php">Create Payment Record</a>
							<a class="dropdown-item" href="adddue.php">Add Due</a>
							<a class="dropdown-item" href="viewAllD.php">View All Dues</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Notice/Letter</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="viewL.php">View Letters</a>
						<a class="dropdown-item" href="viewN.php">View Notices</a>
						<?php if($row['type']=="secretary") { ?>
							<a class="dropdown-item" href="letter.php">Send Letter</a>
							<a class="dropdown-item" href="notice.php">Send Notice</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Complaints</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="complaint.php">New Complaint</a>
						<a class="dropdown-item" href="viewcomplaint.php">View Complaint</a>
						<?php if($row['type']!="owner") { ?>
							<a class="dropdown-item" href="viewallC.php">View All Complaints</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				<?php if($row['type']!="tenant") { ?>
				<li class="nav-item ">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tenant</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="addtenant.php">Add Tenant</a>
						<a class="dropdown-item" href="tenant.php">View Tenant</a>
					  </div>
					  </div>
				  </li>
				<?php } ?>
				
	          <li class="nav-item "><a href="editdetails.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item "><a href="logout.php" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>