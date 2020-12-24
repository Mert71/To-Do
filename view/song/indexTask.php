<div class="container">
	<table border="1">
		<tr>
			<th style="padding: 10px;">Taak</th>
			<th style="padding: 10px;">Beschrijving</th>
			<th style="padding: 10px;">Status <a href="<?= URL . "task/indexTasks/" . $lists_id . '/0' ?>">Up</a> <a href="<?= URL . "task/indexTasks/" . $lists_id . '/1' ?>">Down</a></th>
			<th style="padding: 10px;">List id</th>
			<th colspan="2" style="padding: 10px;">Acties</th>
		</tr>

		<?php foreach ($tasks as $task) {

			echo "<tr>";
			echo "<td style='display: none;'>" . $task['tasks_id'] . "</td>";
			echo "<td>" . $task['tasks_name'] . "</td>";
			echo "<td>" . $task['description'] . "</td>";

			if ($task['status'] == null || $task['status'] == 0) {
				echo "<td>" . "Not done" . "</td>";
			} else {
				echo "<td>" . "Done" . "</td>";
			}

			echo "<td>" . $task['lists_id'] . "</td>";
			echo "<td><a href=\"" . URL . "task/editTasks/" . $task['tasks_id'] . "\">Edit</a></td>";
			echo "<td><a href=\"" . URL . "task/deleteTasks/" . $task['tasks_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a class="btn btn-primary" href="<?= URL . "task/createTasks/" . $lists_id ?>">Nieuwe taak toevoegen</a>
</div>
