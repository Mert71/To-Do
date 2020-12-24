<?php

function getAllSongs()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM song";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getSong($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM song WHERE song_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createSong()
{
	$artist = isset($_POST["artist"]) ? $_POST["artist"] : null;
	$title = isset($_POST["title"]) ? $_POST["title"] : null;
	$url = isset($_POST["url"]) ? $_POST["url"] : null;
	
	if ($artist === null || $title === null || $url === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO song (song_artist, song_name, song_url) VALUES (:artist, :title, :url)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":artist" => $artist,
		":title" => $title,
		":url" => $url 
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteSong($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM song WHERE song_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editSong($id=null)
{
	$artist = isset($_POST["artist"]) ? $_POST["artist"] : null;
	$title = isset($_POST["title"]) ? $_POST["title"] : null;
	$url = isset($_POST["url"]) ? $_POST["url"] : null;
	
	if ($id === null || $artist === null || $title === null || $url === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE song 
			SET song_artist = :artist, song_name = :title, song_url = :url 
			WHERE song_id = :id";

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