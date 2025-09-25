<?php
require_once 'config.php';

// Controleer of gebruiker ingelogd is
if (!isLoggedIn()) {
    redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard">
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="nav-title">Inlogsysteem</h1>
            <div class="nav-links">
                <span style="margin-right: 1rem;">Welkom, <?php echo sanitize($_SESSION['first_name']); ?>!</span>
                <a href="logout.php">Uitloggen</a>
            </div>
        </div>
    </nav>
    
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="welcome-card">
            <h2 class="welcome-title">
                <?php if (isAdmin()): ?>
                    🛠️ Admin Dashboard
                <?php else: ?>
                    👤 Student Dashboard
                <?php endif; ?>
            </h2>
            
            <div class="welcome-text">
                <p><strong>Ingelogd als:</strong> <?php echo sanitize($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></p>
                <p><strong>E-mail:</strong> <?php echo sanitize($_SESSION['email']); ?></p>
                <p><strong>Type:</strong> <?php echo isAdmin() ? 'Administrator' : 'Student'; ?></p>
                <p><strong>Login tijd:</strong> <?php echo date('d-m-Y H:i:s'); ?></p>
            </div>
            
            <?php if (isAdmin()): ?>
                <div style="margin-top: 2rem;">
                    <p style="color: #28a745; font-weight: bold;">✅ Admin rechten actief</p>
                    <p>Je hebt toegang tot alle admin functies.</p>
                </div>
            <?php else: ?>
                <div style="margin-top: 2rem;">
                    <p style="color: #667eea; font-weight: bold;">👨‍🎓 Student account</p>
                    <p>Je bent ingelogd als student.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <p style="color: #6c757d;">
                🎉 <strong>Login succesvol!</strong> Het inlogsysteem werkt correct.
            </p>
        </div>
    </div>
</body>
</html>