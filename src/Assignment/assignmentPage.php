<?php
namespace src\Assignment;

require_once 'SQLiteAssignmentRepo.php';
require_once 'Assignment.php';

$assignmentRepo = new SQLiteAssignmentRepo();

$assignmentList = $assignmentRepo->getAllAssignments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment List</title>
</head>
<body>
	<p><a href="createAssignment.php">Add an Assignment</a></p>
	<p><a href="/src/index.php">Log Out</a></p>
	<h1>Assignment List</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Class</th>
			<th>Assignment</th>
			<th>Due Date</th>
		</tr>
		<?php
		foreach ($assignmentList as $assignment) {
			echo '<tr>';
			echo '<td><a href="show.php?ID='. $assignment->getID().'">';
			echo '<td>' . $assignment->getClass() . '</td>';
			echo '<td>' . $assignment->getAssignmentName() . '</td>';
			echo '<td>' . $assignment->getDueDate() . '</td>';
			echo '</tr>';
		}
		?>
	</table>
</body>
</html>