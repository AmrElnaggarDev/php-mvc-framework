<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;



class Authenticator {

    public function attempt ($email, $password) {

        // match the credential
        $user = App::resolve (Database::class)
        ->query ('select * from users where email = :email', [
            'email' => $email
        ])->find();

        
        if ($user) {
            // we have a user, but we don't know if the password provided matches the password in the database 
            if (password_verify ($password, $user['password'])) 
                {
                    $this->login ([
                        'email' => $email
                    ]);

                    return true;
                }
        }
        return false;
    }

    public function login ($user) {

        $_SESSION['user'] = [
            'email' => $user['email']
      ];
    
      session_regenerate_id();
    }
    
    
    public function logout () {
        
        Session::destroy();
    }

}