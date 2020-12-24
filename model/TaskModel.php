<?php

//all tasks are being pulled from DB.
function getAllTasks($lists_id, $sort)
{
	$db = openDatabaseConnection();

	$sql = null;
	if ($sort == 0) {
		$sql = "SELECT * FROM tasks WHERE lists_id = :id ORDER BY status ASC";
	}

	if ($sort == 1) {
		$sql = "SELECT * FROM tasks WHERE lists_id = :id ORDER BY status DESC";
	}

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $lists_id
	));

	$db = null;

	return $query->fetchAll();
}

//Get a single task
function getTask($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE tasks_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}
