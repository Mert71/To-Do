<?php

require(ROOT . "model/ListModel.php");
// alle lists worden opgehaald
function index()
{
	$lists = getAllLists();

	render("list/index", array(
		'lists' => $lists)
	);
}
//de create pagina wordt aangeroepen
function create()
{
	render("list/create");
}

//instructies doorgegeven wat er gedaan moet worden na het aanmaken van een lijst
function createSave()
{
	if (createList($list_name = $_POST["list_name"])) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function read($id)
{
	$lists = getList($id);

	render("list/read", array(
		"lists" => $lists
	));
}

//Go to the edit.php with the desired 'list'
function edit($id)
{
	$lists = getList($id);

	render("list/edit", array(
		"lists" => $lists
	));
}

//What to do after pressing save
function editSave()
{
	if (editList($list_name = $_POST["list_name"] , $id = $_POST["id"])) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		header("location:" . URL . "error/error_DB");
		exit();
	}
}

function delete($id)
{
	if (deleteList($id)) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();
	}
}
