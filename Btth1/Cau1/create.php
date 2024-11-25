<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFlower = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'image' => $_POST['image']
    ];

    $flowers = readFlowers();
    $flowers[] = $newFlower;
    writeFlowers($flowers);

    header('Location: admin.php');
    exit;
}
?>
<form method="post">
    <label>Tên hoa:</label>
    <input type="text" name="name" required><br>
    <label>Mô tả:</label>
    <textarea name="description" required></textarea><br>
    <label>Link ảnh:</label>
    <input type="url" name="image" required><br>
    <button type="submit">Thêm</button>
</form>
