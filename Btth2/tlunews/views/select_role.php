<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Vai Trò</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Chọn Vai Trò</h1>
        <form method="post" action="index.php">
            <button type="submit" name="role" value="guest" class="btn btn-primary">Khách</button>
            <button type="submit" name="role" value="admin" class="btn btn-danger">Quản trị viên</button>
        </form>
    </div>
</body>
</html>
