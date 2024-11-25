<?php
include 'functions.php';

$flowers = readFlowers();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý các loài hoa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .action-icons a {
            margin: 0 5px;
            text-decoration: none;
            color: #333;
        }
        .action-icons a:hover {
            color: #007bff;
        }
        .add-button {
            margin-bottom: 15px;
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Quản lý các loài hoa</h1>
    <a href="create.php" class="add-button"><i class="fas fa-plus-circle"></i> Thêm hoa mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $id => $flower): ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo htmlspecialchars($flower['name']); ?></td>
                    <td><?php echo htmlspecialchars($flower['description']); ?></td>
                    <td>
                        <img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>" style="width: 100px; height: auto;">
                    </td>
                    <td class="action-icons">
                        <a href="read.php?id=<?php echo $id; ?>"><i class="fas fa-eye" title="Xem"></i></a>
                        <a href="update.php?id=<?php echo $id; ?>"><i class="fas fa-edit" title="Chỉnh sửa"></i></a>
                        <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?');"><i class="fas fa-trash-alt" title="Xóa"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
