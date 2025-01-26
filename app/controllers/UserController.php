<?php

use models\User;
require_once 'BaseController.php';

class UserController extends BaseController {
    public function login() {
        if (isset($_SESSION['admin_id'])) {
            header('Location: /');
            exit();
        }

        $login = '';
        $password = '';
        $errorMsg = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars($_POST['password']);

            $id = User::auth($login, $password);
            if($id != null) {
                $_SESSION['admin_id'] = $id;
                $_SESSION['success_message'] = 'Authorization success!';
                header('Location: /');
                exit();
            } else {
                $errorMsg = 'Wrong login or password';
            }
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/login.php';
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        header('Location: /');
        exit();
    }
}