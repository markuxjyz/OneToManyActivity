<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this employee record?</h1>
	<?php $getEmployeeByID = getEmployeeByID($pdo, $_GET['staff_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Username: <?php echo $getEmployeeByID['username']; ?></h2>
		<h2>FirstName: <?php echo $getEmployeeByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getEmployeeByID['last_name']; ?></h2>
		<h2>Departmet: <?php echo $getEmployeeByID['department']; ?></h2>
		<h2>Position: <?php echo $getEmployeeByID['position']; ?></h2>
		<h2>Date Added: <?php echo $getEmployeeByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
				<input type="submit" name="deleteEmployeeBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
