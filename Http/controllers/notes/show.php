<?php

use database\Response;

$db = \core\App::resolve(\database\Database::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", [
    'id'=>$_GET['id']
])->findOrFail(Response::NOT_FOUND);

authorize($note['FK_user_id'] === $currentUserId);


view('notes/show.view.php', [
    'note' => $note,
    'header' => 'Note',
]);

