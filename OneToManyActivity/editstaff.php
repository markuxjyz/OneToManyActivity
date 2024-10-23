<?php require_once 'core/handleForms.php'; ?>
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
	<?php $getEmployeeByID = getEmployeeByID($pdo, $_GET['staff_id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getEmployeeByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getEmployeeByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Department</label> 
			<input type="text" name="department" value="<?php echo $getEmployeeByID['department']; ?>">
		</p>
		<p>
			<label for="firstName">Position</label> 
			<input type="text" name="position" value="<?php echo $getEmployeeByID['position']; ?>">
			<input type="submit" name="editEmployeeBtn">
		</p>
	</form>
</body>
</html>
