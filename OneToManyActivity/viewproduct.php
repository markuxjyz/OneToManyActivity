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
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByEmployeeID = getAllInfoByEmployeeID($pdo, $_GET['staff_id']); ?>
	<h1>Username: <?php echo $getAllInfoByEmployeeID['username']; ?></h1>
	<h1>Add a New Product in this Inventory.</h1>
	<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
		<p>
			<label for="firstName">Product type</label> 
			<input type="text" name="itemType">
		</p>
		<p>
			<label for="firstName">Product Name</label> 
			<input type="text" name="itemName">
			<input type="submit" name="insertNewProductBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Product ID</th>
	    <th>Product Type</th>
	    <th>Product Name</th>
	    <th>Encoded By</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getProductByEmployee = getProductByEmployee($pdo, $_GET['staff_id']); ?>
	  <?php foreach ($getProductByEmployee as $row) { ?>
	  <tr>
	  	<td><?php echo $row['stock_id']; ?></td>	  	
	  	<td><?php echo $row['item_type']; ?></td>	  	
	  	<td><?php echo $row['item_name']; ?></td>	  	
	  	<td><?php echo $row['employee_name']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editproduct.php?stock_id=<?php echo $row['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>">Edit</a>

	  		<a href="deleteproduct.php?stock_id=<?php echo $row['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>