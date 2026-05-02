<?php

require_once 'BaseController.php';

class HomeController extends BaseController {
    public function index() {
        if (isset($_GET['search']) && $_GET['search'] != '') {
            $request = htmlspecialchars($_GET['search']);
            $books = models\Book::search($request);
        } else {
            $books = models\Book::getAll();
        }

        if (isset($_SESSION['success_message'])) {
            $success_message = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        } else {
            $success_message = '';
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/views/index.php';
    }
}
