<?php

$userPass = 'user';
$adminPass = 'admin';
$passwordEntered = 'user';
	if ($passwordEntered == $userPass) {
		echo "<a href='/src/Assignment/assignmentPage.php'";
	} elseif ($passwordEntered == $adminPass) {
		echo "<a href='/src/Teaching/teachingPage.php>Enter Teacher Portal</a>'";
	} else {
		echo "<h1>ACCESS DENIED</h1>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
<h1>This page will enter you into either the Assignment Page or the Teacher Page</h1>
<p>The form is right after this.</p>
<form>

</form>
</body>
</html>