<form action="<?= URL ?>task/editSaveTasks" method="POST">
	<input type="text" name="task_name" value="<?= $tasks["task_name"] ?>">
	<input type="text" name="description" value="<?= $tasks["description"] ?>">
	<select name="status">
		<option value="0">Busy</option>
		<option value="1">Done</option>
	</select>
	<input type="hidden" name="task_id" value="<?= $tasks["task_id"] ?>">
	<input type="hidden" name="list_id" value="<?= $lists["list_id"] ?>">
	<input class="btn btn-primary" type="submit" value="Opslaan">
</form>
