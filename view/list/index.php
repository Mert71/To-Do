<div class="container">
	<table border="1">
		<tr>
			<th style="display: none;">#</th>
			<th style="display: none;">Naam lijst</th>
			<th colspan="2" style="display: none;">Actie</th>
		</tr>
		<?php foreach ($lists as $list) {
			echo "<tr>";
			echo "<td>" . $list['list_id'] . "</td>";
			echo "<td><a href=\"" . URL . "task/indexTasks/" . $list['list_id'] . "\">" . $list['list_name'] . "</a></td>";
			echo "<td><a href=\"" . URL . "list/edit/" . $list['list_id'] . "\">Edit</a></td>";
			echo "<td><a href=\"" . URL . "list/delete/" . $list['list_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>list/create">Add new list</a>
</div>
