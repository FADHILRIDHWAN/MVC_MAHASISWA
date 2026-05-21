<?php

require_once '../config/database.php';

$db = new Database();

try {

    $conn = $db->getConnection();

    echo "<h2>Koneksi berhasil</h2>";
} catch (Exception $e) {

    echo "Error : " . $e->getMessage();
}
