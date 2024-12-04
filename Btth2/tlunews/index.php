<?php
session_start();

// Lưu vai trò vào session nếu được chọn
if (isset($_POST['role'])) {
    $_SESSION['role'] = $_POST['role'];
}

// Nếu chưa chọn vai trò, hiển thị trang chọn vai trò
if (!isset($_SESSION['role'])) {
    include 'views/select_role.php';
    exit;
}

// Điều hướng dựa trên vai trò
$role = $_SESSION['role'];
$controller = $_GET['controller'] ?? ($role === 'guest' ? 'home' : 'admin');
$action = $_GET['action'] ?? 'index';

require_once "controllers/" . ucfirst($controller) . "Controller.php";
$className = ucfirst($controller) . "Controller";
$controllerInstance = new $className();
if (method_exists($controllerInstance, $action)) {
    $controllerInstance->$action($_GET['id'] ?? null);
} else {
    echo "Action không tồn tại.";
}
?>
