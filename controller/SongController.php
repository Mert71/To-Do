<?php

require(ROOT . "model/SongModel.php");

function index()
{
	$songs = getAllSongs();
	
	render("song/index", array(
		'songs' => $songs)
	);
}

function create()
{
	render("song/create");
}

function createSave()
{
	if (createSong()) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function read($id)
{
	$song = getSong($id);

	render("song/read", array(
		"song" => $song
	));
}

function edit($id)
{
	$song = getSong($id);

	render("song/edit", array(
		"song" => $song
	));
}

function editSave($id)
{
	if (editSong($id)) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function delete($id)
{
	if (deleteSong($id)) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}