<?php

use models\Book;
require_once 'BaseController.php';

class BookController extends BaseController {
    public function addBook() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /');
            die();
        }
        $action = 'Add';
        $formAction = '/add_book';
        $title = '';
        $author = '';
        $release_year = 2025;

        $errorMsg = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlspecialchars(trim($_POST['title']));
            $author = htmlspecialchars(trim($_POST['author']));
            $release_year = htmlspecialchars($_POST['releaseYear']);
            $genre = htmlspecialchars(trim($_POST['genre']));

            $errorMsg = Book::add($title, $author, $release_year, $genre) ? '' : 'Error in adding the book';

            if ($errorMsg === '') {
                $_SESSION['success_message'] = "Book added!";
                header('Location: /');
                die();
            }
        }

        $genres = Book::getAllGenres();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/add_book.php';
    }

    public function updateBook() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /');
            die();
        }

        $action = 'Update';
        $formAction = '/update_book';
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['book_id'])) {
            $errorMsg = '';

            $id = htmlspecialchars($_GET['book_id']);
            $book = Book::getBook($id);
            if (isset($book)) {
                $title = $book['title'];
                $author = $book['author'];
                $release_year = $book['release_year'];
                $genre = $book['genre'];
            } else {
                //error msg
                header('Location: /');
                die;
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = htmlspecialchars($_POST['book_id']);
            $title = htmlspecialchars(trim($_POST['title']));
            $author = htmlspecialchars(trim($_POST['author']));
            $release_year = htmlspecialchars($_POST['releaseYear']);
            $genre = htmlspecialchars(trim($_POST['genre']));

            $errorMsg = Book::update($id, $title, $author, $release_year, $genre) ? '' : 'Error in updating the book';

            if ($errorMsg === '') {
                $_SESSION['success_message'] = "Book updated!";
                header('Location: /');
                die();
            }
        } else {
            header('Location: /');
            die();
        }   

        $genres = Book::getAllGenres();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/add_book.php';
    }

    public function deleteBook() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /');
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['book_id'])) {
            $id = htmlspecialchars($_GET['book_id']);
            if (Book::delete($id)) {
                $_SESSION['success_message'] = "Book deleted!";
                header('Location: /');
                die;
            } else {
                //error msg
                header('Location: /');
                die;
            }
        }
    }
}