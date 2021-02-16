<form action="<?= URL ?>list/editSave" method="POST">
	<input type="text" name="list_name" value="<?= $lists["list_name"] ?>">
	<input type="hidden" name="id" value="<?= $lists["list_id"] ?>">
	<input type="submit" class="btn btn-primary">
</form>
