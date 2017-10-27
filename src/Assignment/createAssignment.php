<?php 

namespace src\Assignment;

require_once 'Assignment.php';
require_once 'SQLiteAssignmentRepo.php';
date_default_timezone_set('America/Chicago');

$formIsValid = true;
$class = $_POST['classN'];
$assignmentName = $_POST['assignmentN'];
$dueDate = $_POST['dueDateN'];
$classError = '';
$assignmentError = '';
$dueDateError = '';
if (empty($class)) {
	$formIsValid = false;
	$classError = '<span>Class Name Is Required!</span>';
}
if (empty($assignmentName)) {
	$formIsValid = false;
	$assignmentError = '<span>Assignment Name Is Required!</span>';
}
if (empty($dueDate)) {
	$formIsValid = false;
	$dueDateError = '<span>Due Date Is Required!</span>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add a New Assignment</title>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') ?>
	<?php if ($formIsValid): ?>
		<?php
		$assignmentRepo = new \src\Assignment\SQLiteAssignmentRepo();
		$assignment = new \src\Assignment\Assignment();
		$assignment->setClass($class);
		$assignment->setAssignmentName($assignmentName);
		$assignment->setDueDate($dueDate);

		$assignmentRepo->saveAssignment($assignment);
		?>
		<h1>New Assignment Created</h1>
		<p>Class: <?php echo $class ?></p>
		<p>Assignment Name: <?php echo $assignmentName ?></p>
		<p>Date: <?php echo $dueDate ?></p>
		<p><a href="/src/Assignment/assignmentPage.php">Back to Assignment List</p>
	<?php else: ?>
		<h1>Create New Assignment</h1>
		<form method="POST" action="createAssignment.php">
			<label>Class Name: <input type="text" name="classN" value="<?php print $class; ?>"></label><?php print $classError; ?></br>
			<label>Assignment: <input type="text" name="assignmentN" value="<?php print $assignmentName; ?>"></label><?php print $assignmentError; ?></br>
			<label>Due Date: <input type="date" name="dueDateN" value="<?php print $dueDate; ?>"></label><?php print $dueDateError; ?></br>
			<input type="submit" value="Save Assignment">
		</form>
	<?php endif; ?>
</body>
</html>