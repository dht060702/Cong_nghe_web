<?php
class Database {
    public static function connect() {
        $dsn = 'mysql:host=localhost;dbname=tintuc;charset=utf8';
        $username = 'root';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO($dsn, $username, $password, $options);
    }
}
?>
