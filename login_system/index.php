<?php
require_once 'config.php';

// Als gebruiker al ingelogd is, doorsturen naar dashboard
if (isLoggedIn()) {
    redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlogsysteem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Welkom</h1>
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <p style="color: #6c757d; margin-bottom: 2rem;">
                inloggen
            </p>
            
            <a href="login.php" class="btn">Inloggen</a>
        </div>
        
        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e1e1;">
            <h3 style="color: #667eea; margin-bottom: 1rem; text-align: center;">Test Accounts</h3>
            <div style="text-align: left; color: #6c757d; font-size: 0.9rem;">
                <p><strong>Admin:</strong> admin@school.nl / password</p>
                <p><strong>Student:</strong> student@school.nl / password</p>
            </div>
        </div>
    </div>
</body>
</html>