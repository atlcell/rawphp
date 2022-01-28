<?php
	error_reporting(0);
	require __DIR__ . '/vendor/autoload.php';

	$databaseDirectory = __DIR__ . "/DB";
	$DB = new \SleekDB\Store("posts", $databaseDirectory);

	$error = '';

	//Create
	if (isset($_POST['submit'])) {
		if (empty($_POST['text'])) {

			$errors = "You must fill in the task";

		} else {

			$text = ["text" => $_POST['text']];
			$res = $DB->insert($text);
			//print_r($res);
			//$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			//mysqli_query($db, $sql);
			//header('location: index.php');

		}
	}

	//Delete
	if (isset($_GET['del'])) {
		if (empty($_GET['del'])) {

			$errors = "You must fill in the task";

		} else {
			//use SleekDB/Query;
			$del = $DB->deleteById($_GET['del']);

		}
	}

	//Read
	$allText = $DB->findAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Marcell MoveHQ PHP App</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">MoveHQ ToDo List</h2>
	</div>
	<form method="post" action="/" class="input_form">
		<input type="text" name="text" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>

	<table>
	<thead>
		<tr>
			<th>N</th>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($allText as $task) { ?>
			<tr>
				<td> <?php echo $task['_id']; ?> </td>
				<td class="task"> <?php echo $task['text']; ?> </td>
				<td class="delete">
					<a href="index.php?del=<?php echo $task['_id']; ?>">x</a> 
				</td>
			</tr>
		<?php } ?>	
	</tbody>
</table>

</body>
</html>