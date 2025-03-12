<?php

namespace App\Controllers;

use Core\App;
use Core\Validation;

class AuthController
{
    public function showLoginForm()
    {
        include_once __DIR__ . '/../../views/auth/login.php';
    }

    public function showRegisterForm()
    {
        include_once __DIR__ . '/../../views/auth/register.php';
    }

    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role']; // 'admin' or 'customer'

        $db = App::get('db');
        
        $db->query("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)", [$name, $email, $password, $role]);
        
        header('Location: /login');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = App::get('db');
        $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;

            if ($user['role'] === 'admin') {
                header('Location: /admin/dashboard');
            } else {
                header('Location: /customer/dashboard');
            }
        } else {
            echo "Invalid credentials";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}

?>
