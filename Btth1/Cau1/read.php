<?php
include 'functions.php';

$id = $_GET['id'] ?? null;
$flower = getFlower($id);

if (!$flower) {
    echo "Không tìm thấy hoa!";
    exit;
}
?>
<h1><?php echo htmlspecialchars($flower['name']); ?></h1>
<p><?php echo htmlspecialchars($flower['description']); ?></p>
<img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>">
<a href="admin.php">Quay lại</a>
