<div class="container">
    <h1>Quản lý tin tức</h1>
    <a href="index.php?controller=admin&action=add">Thêm tin tức</a>
    <ul>
        <?php foreach ($news as $item): ?>
            <li>
                <?= $item['title'] ?>
                <a href="index.php?controller=admin&action=edit&id=<?= $item['id'] ?>">Sửa</a>
                <a href="index.php?controller=admin&action=delete&id=<?= $item['id'] ?>">Xóa</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
