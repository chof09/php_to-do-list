<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">
		<title>Test</title>

	</head>

	<body>

		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

			Name: <input type="text" name="name"><br /><br />
			E-mail: <input type="text" name="email"><br /><br />
			Website: <input type="text" name="website"><br /><br />
			Comment: <textarea name="comment" rows="5" cols="40"></textarea>

			<input type="submit">

		</form>

	</body>


</html>