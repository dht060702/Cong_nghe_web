<?php
class News {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM news");
        return $stmt->fetchAll();
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function search($keyword) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE title LIKE ?");
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll();
    }

    public static function add($title, $content, $image, $category_id) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $image, $category_id]);
    }
}
?>
