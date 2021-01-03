<form action="<?= URL ?>task/createSaveTask" method="POST">
	<input type="text" name="tasks_name" placeholder="Taak" autocomplete="off">
	<input type="text" name="description" placeholder="Beschrijving" autocomplete="off">
	<input type="hidden" name="lists_id" value="<?= $lists_id ?>">
	<select name="status">
		<option value="0">Busy</option>
		<option value="1">Done</option>
	</select>
	<input type="submit" class="btn btn-primary">
</form>
