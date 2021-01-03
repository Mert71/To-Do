<form action="<?= URL ?>task/editSaveTasks" method="POST">
	<input type="text" name="tasks_name" value="<?= $tasks["tasks_name"] ?>">
	<input type="text" name="description" value="<?= $tasks["description"] ?>">
	<select name="status">
		<option value="0">Busy</option>
		<option value="1">Done</option>
	</select>
	<input type="hidden" name="tasks_id" value="<?= $tasks["tasks_id"] ?>">
	<input type="hidden" name="lists_id" value="<?= $lists["lists_id"] ?>">
	<input class="btn btn-primary" type="submit" value="Opslaan">
</form>
