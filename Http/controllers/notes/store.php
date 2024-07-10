<?php

use core\Validator;

require base_path('core/Validator.php');

$db = \core\App::resolve(\database\Database::class);

$errors = [];

if(Validator::stringMinMax($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

if(!empty($errors)){
    view('notes/create.view.php', [
        'errors' => $errors,
        'header' => 'Create Note',
    ]);
}

$db->query("INSERT INTO `notes` (`body`, `FK_user_id`) VALUES (:body, :FK_user_id);", ['body' => $_POST['body'], 'FK_user_id'=>1]);
header('location: /notes');
die();




//exit();