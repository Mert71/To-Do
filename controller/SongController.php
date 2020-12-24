<?php

require(ROOT . "model/ListModel.php");

function index()
{
	$lists = getAllSongs();

	render("song/index", array(
		'lists' => $lists)
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
