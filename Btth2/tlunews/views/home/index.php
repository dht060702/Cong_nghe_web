<div class="container">
    <h1>Danh sách tin tức</h1>
    <form action="index.php?controller=home&action=search" method="get">
        <input type="text" name="keyword" placeholder="Tìm kiếm" />
        <button type="submit">Tìm</button>
    </form>
    <ul>
        <?php foreach ($news as $item): ?>
            <li>
                <a href="index.php?controller=home&action=detail&id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
