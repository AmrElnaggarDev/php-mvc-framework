<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];


// validate the form input 

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'please provide a password of at least 7 characters';
}

if (!empty ($errors)) {
    return view ('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// check if the account already exists

$db = App::resolve (Database::class);
$user = $db->query ('select * from users where email = :email', [
      'email' => $email
])->find();



if ($user) {
    // that means that someone alreay exists and has an account 
    // if yes, redirect to the login page

    header ('Location: /');
    exit();

} else {
     // if no, save on to the database, and then log the user in and redirect it

     $db->query ('INSERT INTO users (email, password) VALUES (:email, :password)', [
           'email' => $email,
           'password' => password_hash ($password, PASSWORD_BCRYPT)
     ]);


     // mark the user has logged in 
    login ($user);
     

     header ('Location: /');
     exit();
}

      
        