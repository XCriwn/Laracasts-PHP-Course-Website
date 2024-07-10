<?php

$email = $_POST['email'];
$password = $_POST['password'];


$form = \Http\forms\Login::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new \core\Authenticator())->attempt(
    $attributes['email'], $attributes['password']
);

if(! $signedIn){
    $form->setErrorMessage(
        'email', 'Incorrect email address or password.'
    )->throw();
}

redirect("/");

//viewAndExit('sessions/create.view.php', [
//    'header' => '',
//    'errors' => $form->getErrors(),
//]);


