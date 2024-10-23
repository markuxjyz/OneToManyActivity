<?php  

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertEmployeeBtn'])) {

	if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['department'])  && !empty($_POST['position'])) {

		$query = insertEmployee($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['department'], $_POST['position']);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Insertion failed";
		}

	}
	else {
		echo "Make sure that no input fields are empty!";
	}

}

if (isset($_POST['editEmployeeBtn'])) {

	if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['department']) && !empty($_POST['position']) && !empty($_GET['staff_id'])) {

		$query = updateEmployee($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['department'], $_POST['position'], $_GET['staff_id']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";
		}
	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}

}


if (isset($_POST['deleteEmployeeBtn'])) {
	$query = deleteEmployee($pdo, $_GET['staff_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewProductBtn'])) {
	
	if (!empty($_POST['itemType']) && !empty($_POST['itemName']) && !empty($_GET['staff_id'])) {

		$query = insertProduct($pdo, $_POST['itemType'], $_POST['itemName'], $_GET['staff_id']);

		if ($query) {
			header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
		}
		else {
			echo "Insertion failed";
		}
	}
	else {
		echo "Please make sure all input fields are not empty before inserting a new project.";
	}

}


if (isset($_POST['editProductBtn'])) {

	if (!empty($_POST['itemType']) && !empty($_POST['itemName']) && !empty($_GET['stock_id'])) {

		$query = updateProduct($pdo, $_POST['itemType'], $_POST['itemName'], $_GET['stock_id']);

		if ($query) {
			header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
		}
		
		else {
			echo "Update failed";
		}

	}


}


if (isset($_POST['deleteProductBtn'])) {
	$query = deleteProduct($pdo, $_GET['stock_id']);

	if ($query) {
		header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
	}
	else {
		echo "Deletion failed";
	}
}


?>