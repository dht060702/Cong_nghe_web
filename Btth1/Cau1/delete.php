<?php
include 'functions.php';

$id = $_GET['id'] ?? null;

if ($id !== null) {
    $flowers = readFlowers();
    unset($flowers[$id]);
    writeFlowers(array_values($flowers)); // Reset lại index
}

header('Location: admin.php');
exit;
?>
