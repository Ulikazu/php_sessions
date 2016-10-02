<?php
	
	session_start();

	include "dbconst.php";

	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	} else {

		$sql_query = "SELECT user_id, email FROM users WHERE user_id = :userid";
		$records = $link->prepare($sql_query);
		$records->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
		$records->execute();

		$result = $records->fetch(PDO::FETCH_ASSOC);

		$user = NULL;

		if (count($result) > 0) {
			$user = $result;
		} else {
			header("Location: index.php");
		}
	}

?>			

<!DOCTYPE html>
<html>
<head>
	<title>Dashy - Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Welcome to your dashboard!</h1>
		<p>You're currently logged in with the email <?= $user['email'] ?></p>
		<p>Need an adult or wanna leave? <a href="logout.php">Log out here</a></p>
	</div>
</body>
</html>