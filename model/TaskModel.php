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

function createNewTask()
{
	$tasks_name = isset($_POST["tasks_name"]) ? $_POST["tasks_name"] : null;
	$description = isset($_POST["description"]) ? $_POST["description"] : null;
	$lists_id = isset($_POST["lists_id"]) ? $_POST["lists_id"] : null;
	$status = isset($_POST["status"]) ? $_POST["status"] : null;


	if ($tasks_name === null || $description === null || $lists_id === null || $status === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks (tasks_name, lists_id,  description, status ) VALUES (:tasks_name, :lists_id, :description, :status )";

	$query = $db->prepare($sql);
	$query->execute(array(
		":tasks_name" => $tasks_name,
		":lists_id" => $lists_id,
		":description" => $description,
		":status" => $status
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteTask($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE tasks_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}
function editTask()
{
	$task_name = isset($_POST["tasks_name"]) ? $_POST["tasks_name"] : null;
	$description = isset($_POST["description"]) ? $_POST["description"] : null;
	$tasks_id = isset($_POST["tasks_id"]) ? $_POST["tasks_id"] : null;
	$status = isset($_POST["status"]) ? $_POST["status"] : null;

	$db = openDatabaseConnection();

	$sql = "UPDATE task SET tasks_name = '$tasks_name', description = '$description', status = '$status' WHERE tasks_id = $tasks_id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":tasks_id" => $tasks_id,
		":tasks_name" => $tasks_name,
		":description" => $description,
		":status" => $status
	));

	$db = null;

	return true;
}
