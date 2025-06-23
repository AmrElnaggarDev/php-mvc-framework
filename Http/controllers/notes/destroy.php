<?php


use Core\Database;
use Core\App;

$db = App::resolve (Database::class);


$currentUserId = 1;


// Handle note deletion
$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
'id' => $_POST['id']
]);

header('Location: /notes');
exit();
