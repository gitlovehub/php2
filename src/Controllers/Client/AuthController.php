<?php

namespace MyNamespace\MyProject\Controllers\Client;

use MyNamespace\MyProject\Common\Controller;
use MyNamespace\MyProject\Common\Helper;
use MyNamespace\MyProject\Models\User;

class AuthController extends Controller
{
    private User $user;

    public function __construct() {
        $this->user = new User();
    }

    public function loginPage() {
        avoid_login();
        $this->renderViewClient('login');
    }

    public function login() {
        avoid_login();
        
        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Email không tồn tại !');
            }
            
            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {

                $_SESSION['user'] = $user;

                unset($_SESSION["cart"]);

                if ($user['role'] == 'admin') {
                    header('Location: ' . url('admin/') );
                    exit;
                }
                
                header('Location: ' . url() );
                exit;
            }
            throw new \Exception('Password không đúng !');

        } catch (\Throwable $th) {
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . url('auth/login') );
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['cart-'.$_SESSION['user']['id']]);
        unset($_SESSION['user']);
        header('Location: ' . url());
        exit;
    }

    public function account() {$this->renderViewClient('account', []);}
}