<?php  

function insertEmployee($pdo, $username, $first_name, $last_name, 
	$department, $position) {

	$sql = "INSERT INTO employee (username, first_name, last_name, 
		department, position) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$department, $position]);

	if ($executeQuery) {
		return true;
	}
}

function getAllEmployee($pdo) {
	$sql = "SELECT * FROM employee";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getEmployeeByID($pdo, $staff_id) {
	$sql = "SELECT * FROM employee WHERE staff_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateEmployee($pdo, $first_name, $last_name, 
	$department, $position, $staff_id) {

	$sql = " UPDATE employee
				SET first_name = ?,
					last_name = ?,
					department = ?, 
					position = ?
				WHERE staff_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$department, $position, $staff_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteEmployee($pdo, $staff_id) {
	$deleteEmployProd = "DELETE FROM product WHERE staff_id = ?";
	$deleteStmt = $pdo->prepare($deleteEmployProd);
	$executeDeleteQuery = $deleteStmt->execute([$staff_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM employee WHERE staff_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$staff_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}


function insertProduct($pdo, $item_type, $item_name, $staff_id) {
	$sql = "INSERT INTO product (item_type, item_name, staff_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$item_type, $item_name, $staff_id]);
	if ($executeQuery) {
		return true;
	}

}

function getProductByEmployee($pdo, $staff_id) {
	
	$sql = "SELECT 
				product.stock_id AS stock_id,
				product.item_type AS item_type,
				product.item_name AS item_name,
				product.date_added AS date_added,
				CONCAT(employee.first_name,' ',employee.last_name) AS employee_name
				
			FROM product
			JOIN employee ON product.staff_id = employee.staff_id
			WHERE product.stock_id = ? 
			GROUP BY product.item_type;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllInfoByEmployeeID($pdo, $staff_id) {
	$sql = "SELECT * FROM employee WHERE staff_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getProductByID($pdo, $stock_id) {
	$sql = "SELECT 
				product.stock_id AS stock_id,
				product.item_type AS item_type,
				product.item_name AS item_name,
				product.date_added AS date_added,
				CONCAT(employee.first_name,' ',employee.last_name) AS employee_name
			FROM product
			JOIN employee ON product.staff_id = employee.staff_id
			WHERE product.stock_id  = ? 
			GROUP BY product.item_type";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$stock_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function updateProduct($pdo, $item_type, $item_name, $stock_id) {
	$sql = "UPDATE product
			SET item_type = ?,
				item_name = ?
			WHERE stock_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$item_type, $item_name, $stock_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProduct($pdo, $stock_id) {
	$sql = "DELETE FROM product WHERE stock_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$stock_id]);

	if ($executeQuery) {
		return true;
	}
}

?>