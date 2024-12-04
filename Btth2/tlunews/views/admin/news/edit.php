<!-- views/admin/news/edit.php -->
<form method="POST" action="index.php?controller=admin&action=editNews&id=<?= $news['id'] ?>">
    <input type="text" name="title" value="<?= $news['title'] ?>" required>
    <textarea name="content" required><?= $news['content'] ?></textarea>
    <input type="text" name="image" value="<?= $news['image'] ?>" required>
    <input type="number" name="category_id" value="<?= $news['category_id'] ?>" required>
    <button type="submit">Cập nhật</button>
</form>
