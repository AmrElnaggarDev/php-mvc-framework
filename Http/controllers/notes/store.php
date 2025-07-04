<?php 


use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve (Database::class);


require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];


    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if (!empty ($errors)){
        return view("notes/create.view.php", [
            'heading' => 'Create Note',
            'errors' => $errors
        ]);
    }

    
    // Save the note to the database
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1 // Replace with the actual user ID
    ]);

    // Redirect to the notes page
    header('Location: /notes');
    exit();
    
