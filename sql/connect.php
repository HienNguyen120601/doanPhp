<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=khago", "root", "");
} catch (PDOException $e) {
}
