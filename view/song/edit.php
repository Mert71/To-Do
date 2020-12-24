<form action="<?= URL ?>song/editSave" method="POST">
	<input type="text" name="lists_name" value="<?= $lists["lists_name"] ?>">
	<input type="hidden" name="id" value="<?= $lists["lists_id"] ?>">
	<input type="submit" class="btn btn-primary">
</form>
