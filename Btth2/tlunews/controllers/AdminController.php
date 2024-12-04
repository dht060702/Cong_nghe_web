<?php
require_once 'models/News.php';

class AdminController {
    public function index() {
        $news = News::getAll();
        include 'views/admin/dashboard.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            News::add($title, $content, $image, $category_id);
            header("Location: index.php?controller=admin");
            exit;
        }
        include 'views/admin/add.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            News::update($id, $title, $content, $image, $category_id);
            header("Location: index.php?controller=admin");
            exit;
        }
        $news = News::getById($id);
        include 'views/admin/edit.php';
    }

    public function delete($id) {
        News::delete($id);
        header("Location: index.php?controller=admin");
        exit;
    }
}
?>
