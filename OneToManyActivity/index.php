<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>FILIPINA COSMETICS INVENTORY MONITORING SYSTEM</h1>
	<form action="core/handleForms.php" method="POST">
	<p> Register your account first, before you encode the inventory. </p>
		<p>
			<label for="firstName">Username</label> 
			<input type="text" name="username">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="firstName">Department</label> 
			<input type="text" name="department">
		</p>
		<p>
			<label for="firstName">Position</label> 
			<input type="text" name="position">
			<input type="submit" name="insertEmployeeBtn">
		</p>
	</form>
	<?php $getAllEmployee = getAllEmployee($pdo); ?>
	<?php foreach ($getAllEmployee as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Department: <?php echo $row['department']; ?></h3>
		<h3>Position: <?php echo $row['position']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewproduct.php?staff_id=<?php echo $row['staff_id']; ?>">View Stocks</a>
			<a href="editstaff.php?staff_id=<?php echo $row['staff_id']; ?>">Edit</a>
			<a href="deletestaff.php?staff_id=<?php echo $row['staff_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>