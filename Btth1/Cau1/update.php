<?php
include 'functions.php';

$id = $_GET['id'] ?? null;
$flower = getFlower($id);

if (!$flower) {
    echo "Không tìm thấy hoa!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flower['name'] = $_POST['name'];
    $flower['description'] = $_POST['description'];
    $flower['image'] = $_POST['image'];

    $flowers = readFlowers();
    $flowers[$id] = $flower;
    writeFlowers($flowers);

    header('Location: admin.php');
    exit;
}
?>
<form method="post">
    <label>Tên hoa:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($flower['name']); ?>" required><br>
    <label>Mô tả:</label>
    <textarea name="description" required><?php echo htmlspecialchars($flower['description']); ?></textarea><br>
    <label>Link ảnh:</label>
    <input type="url" name="image" value="<?php echo htmlspecialchars($flower['image']); ?>" required><br>
    <button type="submit">Lưu</button>
</form>
