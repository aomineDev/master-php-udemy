<?php 
//Model
require_once 'models/note.php';

class NoteController{
	private $note;

	public function __construct(){
		$this->note = new Note();
	}

	public function getAllNotes(){
		$notes = $this->note->getAll('notas'); 
		require_once 'views/notes/getAll.php';
	}

	public function list(){
		require_once 'views/notes/list.php';
	}

	public function create(){
		$this->note->setIdusuarios(1); 
		$this->note->setTitulo('Nota desde PHP'); 
		$this->note->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolores provident, velit nisi officiis suscipit reiciendis magni voluptatibus nemo maxime dolore! Iste cum laboriosam asperiores excepturi, nemo fugiat debitis, rerum.'); 
		$this->note->createNote();

		header('Location: index.php?controller=Note&action=getAllNotes'); 

	}

	public function delete(){
	}

}

?>