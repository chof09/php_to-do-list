<?php

	require_once 'init.php';

	if (isset($_POST['sort-items'])) {
		$sort = $_POST['sort-items'];
	} else {
		$sort = '';
	}

	switch ($sort) {

		case 'default':
			$itemsQuery = $connection->query("SELECT id, value, done FROM items");
			break;
		case 'done':
			$itemsQuery = $connection->query("SELECT id, value, done FROM items WHERE done='1'");
			break;
		case 'not-done':
			$itemsQuery = $connection->query("SELECT id, value, done FROM items WHERE done='0'");
			break;
		default:
			$itemsQuery = $connection->query("SELECT id, value, done FROM items");

	}

		$items = $itemsQuery->num_rows ? $itemsQuery : [];

	

?>

<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>PHP Playground</title>

		<link rel="stylesheet" type="text/css"  href="style.css" media="all" />

	</head>

	<body>

		<div id="main">

			<div class="section">

				<form class="sort-item" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

					<select name="sort-items" onchange="this.form.submit()">
						<option value="default" <?php echo ($sort === 'default') ? 'selected' : ''; ?>>Show all</option>
						<option value="done" <?php echo ($sort === 'done') ? 'selected' : ''; ?>>Show done tasks</option>
						<option value="not-done" <?php echo ($sort === 'not-done') ? 'selected' : ''; ?>>Show undone tasks</option>
					</select>

				</form>


			<?php if (!empty($items)): ?>

				<?php foreach ($items as $item): ?>

					<div class="to-do-item<?php echo $item['done'] ? ' done' : ''; ?>">

					<?php
						switch($item['done']) {
							case 0:
								$done = 'done';
								$markAs = 'Done!';
								break;
							case 1:
								$done = 'notdone';
								$markAs = 'Undone!';
								break;
						}
					?>

						<div class="to-do-text">
							<p><?php echo $item['value']; ?></p>
						</div>

						<div class="to-do-controls">

							<div class="to-do-completed">
								<a href="mark.php?as=<?php echo $done; ?>&item=<?php echo $item['id']; ?>" class="btn done"><?php echo $markAs; ?></a>
							</div>

							<div class="to-do-remove">
								<a href="mark.php?as=remove&item=<?php echo $item['id']; ?>" class="btn remove" onclick="return confirm('Are you sure you want to delete this item?')">X</a> 
							</div>

						</div>

					</div>

				<?php endforeach; ?>

			<?php else: ?>

				<p>Nema unesenih zadataka.</p>

			<?php endif; ?>


				<form class="item-add" action="add.php" method="post">
					<input type="text" name="new-item" placeholder="Add new task..." class="input" autocomplete="off" required />
					<input type="submit" value="Add" class="add-btn" />
				</form>

			</div>

		</div>

	</body>

</html>