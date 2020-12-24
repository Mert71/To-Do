<form action="<?= URL ?>song/editSave/<?= $song["song_id"] ?>" method="POST">
	<input type="text" name="artist" value="<?= $song["song_artist"] ?>">
	<input type="text" name="title" value="<?= $song["song_name"] ?>">
	<input type="text" name="url" value="<?= $song["song_url"] ?>">
	<input type="hidden" name="id" value="<?= $song["song_id"] ?>">

	<input type="submit" value="Opslaan">
</form>