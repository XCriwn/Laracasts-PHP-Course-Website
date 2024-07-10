<?php

$db = \core\App::resolve(\database\Database::class);

$currentUserId = 1;

$notes = $db->query("select * from notes where FK_user_id = :user_id", [
    'user_id' => $currentUserId
])->findAll();




view('notes/index.view.php', [
    'notes' => $notes,
    'header' => 'My Notes',
]);