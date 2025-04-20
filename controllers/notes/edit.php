<?php

$id=$_GET['id'];

dd($id);

//You stopped here, your next steps are to edit the edit.vierw.php for the accepting the id, if thre is an id, then you load this view and display the header of the note,

view('/notes/edit.view.php');