<div class="container mt-5">
    <h1>Quản lý tin tức</h1>
    <a href="index.php?controller=admin&action=addNews" class="btn btn-success">Thêm mới</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['created_at'] ?></td>
                    <td>
                        <a href="index.php?controller=admin&action=editNews&id=<?= $item['id'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="index.php?controller=admin&action=deleteNews&id=<?= $item['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
