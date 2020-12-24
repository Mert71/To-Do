<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Artiest</th>
			<th>Titel</th>
			<th>Url</th>
			<th colspan="2">Actie</th>
		</tr>
		
		<?php foreach ($songs as $song) {
			echo "<tr>";
			echo "<td>" . $song['song_id'] . "</td>";
			echo "<td>" . $song['song_artist'] . "</td>";
			echo "<td>" . $song['song_name'] . "</td>";
			echo "<td><a href=\"" . $song['song_url'] .  "\">" . $song['song_url'] . "</a></td>";
			echo "<td><a href=\"" . URL . "song/edit/" . $song['song_id'] . "\">Wijzigen</a></td>";
			echo "<td><a href=\"" . URL . "song/delete/" . $song['song_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>song/create">Nieuw lied toevoegen</a>
</div>