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
	<a href="viewproduct.php?staff_id=<?php echo $_GET['staff_id']; ?>"> 
	View The Products</a>
	<h1>Edit the stocks!</h1>
	<?php $getProductByID = getProductByID($pdo, $_GET['stock_id']); ?>
	
	<form action="core/handleForms.php?stock_id=<?php echo $_GET['stock_id']; ?>
	&staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
		<p>
			<label for="firstName">Product Type</label> 
			<input type="text" name="itemType" 
			value="<?php echo $getProductByID['item_type']; ?>">
		</p>
		<p>
			<label for="firstName">Product Name</label> 
			<input type="text" name="itemName" 
			value="<?php echo $getProductByID['item_name']; ?>">
			<input type="submit" name="editProductBtn">
		</p>
	</form>
</body>
</html>

