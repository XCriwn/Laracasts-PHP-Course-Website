<?php

//find the corresponding note
use core\Validator;
use database\Response;

$db = \core\App::resolve(\database\Database::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", [
    'id'=>$_POST['id']
])->findOrFail(Response::NOT_FOUND);


//authorize the user
authorize($note['FK_user_id'] === $currentUserId);

//validate the form
if(Validator::stringMinMax($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

//if no errors, update the record in the notes database table
if(!empty($errors)){
    view('notes/edit.view.php', [
        'errors' => [],
        'header' => 'Edit Note',
        'note' => $note,
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);
header("location: /note?id={$note['id']}");
die();