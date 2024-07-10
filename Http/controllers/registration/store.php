<?php

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form
$errors = [];
if(\core\Validator::email($email)){
    $errors['email'] = "Please provide a valid email address.";
}
if(\core\Validator::stringMinMax($password, 7,255)){
    $errors['password'] = "Password should be a minimum of 7 characters and maximum of 255.";
}

if(!empty($errors)){
    view("registration/create.view.php",[
        'errors' => $errors,
        'header' => NULL,
    ]);
    exit();
}
// check is account already exists
$db = \core\App::resolve(\database\Database::class);
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){
    // if yes, redirect to a login page
    header('location: /');
    exit();
}
else {
    // if not, then save it to the database, log the user in and redirect him
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password) ', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);
}

//mark that the user has logged in

login([
    'email' => $email
]);

header('location: /');
exit();
