<?php
include_once("./Crud.php");

$crud = new Crud("animal");


$crud->obtieneTodos();

$crud->obtieneDeID("1");

$crud->borrar(15);

?>