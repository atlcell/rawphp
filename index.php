<!DOCTYPE html>
<html>
<head>
	<title>Marcell MoveHQ PHP App</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="text" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
</body>
</html>
<?php

require __DIR__ . '/vendor/autoload.php';

$databaseDirectory = __DIR__ . "/DB";
$DB = new \SleekDB\Store("posts", $databaseDirectory);

$text = ["text" => $_POST['text']];

$res = $DB->insert($text);

print_r($res);

$allText = $DB->findAll();

print_r($allText);

?>