<?php

//alle taken worden opgehaald van de Database
function getAllTasks($list_id, $sort)
{
	$db = openDatabaseConnection();

	$sql = null;
	if ($sort == 0) {
		$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY status ASC";
	}

	if ($sort == 1) {
		$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY status DESC";
	}
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $list_id
	));

	$db = null;
	return $query->fetchAll();
}

//1 taak wordt opgehaald
function getTask($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE task_id = :id LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;
	return $query->fetch();
}

function createNewTask($task_name , $description , $list_id , $status)
{
	if ($task_name === null || $description === null || $list_id === null || $status === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks (task_name, list_id,  description, status ) VALUES (:task_name, :list_id, :description, :status )";
	$query = $db->prepare($sql);
	$query->execute(array(
		":task_name" => $task_name,
		":list_id" => $list_id,
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

	$sql = "DELETE FROM tasks WHERE task_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;
	return true;
}

// je kan een taak bewerken
function editTask($task_name , $description , $task_id , $status)
{

	$db = openDatabaseConnection();

	$sql = "UPDATE tasks SET task_name = '$task_name', description = '$description', status = '$status' WHERE task_id = $task_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":task_id" => $task_id,
		":task_name" => $task_name,
		":description" => $description,
		":status" => $status
	));

	$db = null;
	return true;
}
