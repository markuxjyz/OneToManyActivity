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
	<?php $getProductByID = getProductByID($pdo, $_GET['stock_id']); ?>
	<h1>Are you sure you want to delete this product?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Product Type: <?php echo $getProductByID['item_type'] ?></h2>
		<h2>Product Name: <?php echo $getProductByID['item_name'] ?></h2>
		<h2>Encoded By: <?php echo $getProductByID['employee_name'] ?></h2>
		<h2>Date Added: <?php echo $getProductByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?stock_id=<?php echo $_GET['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
				<input type="submit" name="deleteProductBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>

