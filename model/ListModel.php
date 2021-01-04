<?php
// alle lists worden opgehaald van de database
function getAllSongs()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

//1 lijst wordt opgehaald met ID
function getSong($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE lists_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

// je kan een lijst aanmaken
function createSong()
{
	$lists_name = isset($_POST["lists_name"]) ? $_POST["lists_name"] : null;

	if ($lists_name === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO lists (lists_name) VALUES (:lists_name)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":lists_name" => $lists_name
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

//Je kan een lijst deleten waarbij de listid overeenkomt met de id van de gekozen lijst
function deleteSong($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE lists_id = :id;
	DELETE FROM lists WHERE lists_id = :id;";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editSong($id=null)
{
	$lists_name = isset($_POST["lists_name"]) ? $_POST["lists_name"] : null;
	$id = isset($_POST["id"]) ? $_POST["id"] : null;

	if ($id === null || $lists_name === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE lists SET lists_name = '$lists_name' WHERE lists_id = $id";

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
