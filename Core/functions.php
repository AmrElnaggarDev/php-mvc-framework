<?php 

use Core\Response;

function dd ($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($value) {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $value;  
    // to get the url at all and the 2nd parameter is to get the url path in speciif
    // ex : https://www.example.com/folder/page.php?id=123#section1
    // will return the speciif path => /folder/page
}

function abort($code = 404) {
    http_response_code($code);
    require base_path ("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN){

    if (! $condition){
        abort($status);
    }
}


function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function login ($user) {

    $_SESSION['user'] = [
        'email' => $user['email']
  ];

  session_regenerate_id();
}


function logout () {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params ();
    setcookie ('PHPSESSID', '', time()-3600, $params['path'], $params['domain']);
    
}


function redirect ($path) {
    header ("Location: {$path}");
    exit();
}

function old ($key, $default = '') 
{
    return Core\Session::get ('old')[$key] ?? $default ;
}


