<?php

require(ROOT . "model/ListModel.php");
// alle lists worden opgehaald
function index()
{
	$lists = getAllSongs();

	render("song/index", array(
		'lists' => $lists)
	);
}
//de create pagina wordt aangeroepen
function create()
{
	render("song/create");
}

//instructies doorgegeven wat er gedaan moet worden na het aanmaken van een lijst
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
	$lists = getSong($id);

	render("song/read", array(
		"lists" => $lists
	));
}

function edit($id)
{
	$lists = getSong($id);

	render("song/edit", array(
		"lists" => $lists
	));
}

function editSave()
{
	if (editSong()) {
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
