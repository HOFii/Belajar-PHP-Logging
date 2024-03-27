<?php

namespace hofi\Belajar\PHP\MVC\Middleware;

class AuthMiddleware extends AuthMiddleware
{
    function before(): void
    {
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /Login');
            exit();
        }
    }
}

