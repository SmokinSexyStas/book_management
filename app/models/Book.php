<?php

namespace models;

use core\Db;

class Book{
    public static function getAll() {
        $db = Db::getInstance();
        $query = $db->query("SELECT * FROM `books`");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public static function search(string $search) {
        $db = Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM `books`
            WHERE `title` LIKE :search OR `author` LIKE :search
            ORDER BY
                CASE 
                    WHEN `title` LIKE :exact THEN 1
                    WHEN `author` LIKE :exact THEN 2
                    WHEN `title` LIKE :search THEN 3
                    ELSE 4
                END
            ");
        $exact = $search;
        $stmt->execute(['search' => '%'.$search.'%', 'exact' => $exact]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function add($title, $author, $year, $genre) {
        $db = Db::getInstance();
        $stmt = $db->prepare("INSERT INTO `books` (`title`, `author`, `release_year`, `genre`) 
        VALUES (:title, :author, :release_year, :genre);");
        return $stmt->execute(['title' => $title, 'author' => $author, 'release_year' => $year, 'genre' => $genre]);
    }

    public static function update($id, $title, $author, $year, $genre) {
        $db = Db::getInstance();
        $stmt = $db->prepare("UPDATE `books` SET `title` = :title, `author` = :author, `release_year` = :release_year, `genre` = :genre WHERE `id` = :id");
        return $stmt->execute(['title' => $title, 'author' => $author, 'release_year' => $year, 'genre' => $genre, 'id' => $id]);
    }

    public static function delete($id) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM `books` WHERE `id` = :id");
        return $stmt->execute(['id' => $id]);
    }

    public static function getAllGenres() {
        $db = Db::getInstance();
        $query = $db->query("SELECT DISTINCT `genre` FROM `books`");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getBook($id) {
        $db = Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM `books` WHERE `id` = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}