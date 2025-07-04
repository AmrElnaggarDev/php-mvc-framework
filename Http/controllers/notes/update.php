<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve (Database::class);

$currentUserId = 1;


// find the corresponding note
$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST['id']
    ])->findOrFail();




// authorize that the current user can edit teh note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if there is no validation errors, update teh record in the notes database table 

if (count ($errors)) {

    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query ('update notes set body = :body where id = :id', [
    'id' => $_POST['id'], 
    'body' => $_POST['body']
]);

header ('Location: /notes');
die();