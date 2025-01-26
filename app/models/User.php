<?php

namespace models;

use core\Db;

class User {
    public static function auth(string $login, string $password) {
        $db = Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = :login");
        $stmt->execute(['login' => $login]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result && password_verify($password, $result['password'])) {
            return $result['id'];
        } else {
            return null;
        }
    }
}