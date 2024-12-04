<form action="index.php?controller=admin&action=addNews" method="post">
    <label>Tiêu đề:</label>
    <input type="text" name="title" required>
    <label>Nội dung:</label>
    <textarea name="content" required></textarea>
    <label>Ảnh:</label>
    <input type="text" name="image" required>
    <label>Danh mục:</label>
    <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Thêm tin tức</button>
</form>
