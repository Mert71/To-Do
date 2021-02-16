<?php
// alle lists worden opgehaald van de database
function getAllLists()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
}

//1 lijst wordt opgehaald met ID
function getList($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE list_id = :id LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;
	return $query->fetch();
}

// je kan een lijst aanmaken
function createList($list_name)
{

	if ($list_name === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO lists (list_name) VALUES (:list_name)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":list_name" => $list_name
	));

	//Database verbinding sluiten
	$db = null;
	return true;
}

//Je kan een lijst deleten waarbij de listid overeenkomt met de id van de gekozen lijst
function deleteList($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE list_id = :id;
	DELETE FROM lists WHERE list_id = :id;";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;
	return true;
}

function editList($list_name , $id)
{
	if ($id === null || $list_name === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE lists SET list_name = '$list_name' WHERE list_id = $id";
	$query = $db->prepare($sql);

	$query->execute(array(
		":id" => $id,
		":artist" => $artist,
		":title" => $title,
		":url" => $url
	));

	$db = null;
	return true;
}
