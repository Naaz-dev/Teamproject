<?php
// Docker database configuratie voor inlogsysteem
define('DB_HOST', 'db'); // Docker service naam
define('DB_NAME', 'login_system');
define('DB_USER', 'root');
define('DB_PASS', 'rootpassword'); // Docker password

// Database connectie
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connectie mislukt: " . $e->getMessage());
}

// Session starten
session_start();

// Helper functies
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
?>