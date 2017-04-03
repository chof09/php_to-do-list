<?php

	require_once 'init.php';

// SORT ITEMS
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

	$isDone = array(
			0 => array('done', 'Done!'),
			1 => array('notdone', 'Undone!')
		);

?>

<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>PHP To-Do list</title>

		<link rel="stylesheet" type="text/css"  href="style.css" media="all" />

		<script src="script.js"></script>

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

				<?php foreach ($items as $counter=>$item): ?>

					<?php $itemDone = $item['done']; ?>

					<div class="to-do-item<?php echo $item['done'] ? ' done' : ''; ?>" onmouseover="show_edit_btn('<?php echo $counter; ?>')" onmouseout="hide_edit_btn('<?php echo $counter; ?>')">

						<div class="to-do-text" id="item-text">
							<p> <span id="<?php echo $counter; ?>"><?php echo $item['value']; ?></span> <span id="edit-btn<?php echo $counter; ?>"><a href="javascript:void(0);" onclick="edit('<?php echo $counter; ?>', '<?php echo $item['id']; ?>')" class="edit-btn">Edit</a></span></p>
						</div>

						<div class="to-do-controls">

							<div class="to-do-completed">
								<a href="mark.php?as=<?php echo $isDone[$itemDone][0]; ?>&item=<?php echo $item['id']; ?>" class="btn done"><?php echo $isDone[$itemDone][1]; ?></a>
							</div>

							<div class="to-do-remove">
								<a href="remove.php?item=<?php echo $item['id']; ?>" class="btn remove" onclick="return confirm('Are you sure you want to delete this item?')">X</a> 
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