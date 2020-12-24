<div class="container">
	<table border="1">
		<tr>
			<th style="display: none;">#</th>
			<th style="display: none;">Naam lijst</th>
			<th colspan="2" style="display: none;">Actie</th>
		</tr>
		<?php foreach ($lists as $list) {
			echo "<tr>";
			echo "<td>" . $list['lists_id'] . "</td>";
			echo "<td><a href=\"" . URL . "task/indexTasks/" . $list['lists_id'] . "\">" . $list['lists_name'] . "</a></td>";
			echo "<td><a href=\"" . URL . "song/edit/" . $list['lists_id'] . "\">Edit</a></td>";
			echo "<td><a href=\"" . URL . "song/delete/" . $list['lists_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>song/create">Nieuw lijst toevoegen</a>
</div>
