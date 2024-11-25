<?php
define('DATA_FILE', 'flowers.json');

// Đọc dữ liệu từ file JSON
function readFlowers() {
    if (!file_exists(DATA_FILE)) {
        return [];
    }
    return json_decode(file_get_contents(DATA_FILE), true);
}

// Ghi dữ liệu vào file JSON
function writeFlowers($flowers) {
    file_put_contents(DATA_FILE, json_encode($flowers, JSON_PRETTY_PRINT));
}

// Lấy chi tiết một hoa theo ID
function getFlower($id) {
    $flowers = readFlowers();
    return $flowers[$id] ?? null;
}
?>
