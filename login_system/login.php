<?php
require_once 'config.php';

// Als gebruiker al ingelogd is, doorsturen
if (isLoggedIn()) {
    redirect('dashboard.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        $error = 'Vul alle velden in.';
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id, first_name, last_name, user_type, password FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['user_type'] = $user['user_type'];
                $_SESSION['email'] = $email;
                
                redirect('dashboard.php');
            } else {
                $error = 'Onjuiste inloggegevens.';
            }
        } catch (PDOException $e) {
            $error = 'Er is een fout opgetreden. Probeer het opnieuw.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Inloggen</h1>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo sanitize($error); ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" class="form-control" required 
                       value="<?php echo isset($_POST['email']) ? sanitize($_POST['email']) : ''; ?>"
                       placeholder="jouw.naam@school.nl">
            </div>
            
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn">Inloggen</button>
        </form>
        
        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e1e1; text-align: center; color: #6c757d;">
            <p><strong>Test accounts:</strong></p>
            <p>Admin: admin@school.nl / password</p>
            <p>Student: student@school.nl / password</p>
        </div>
        
        <div style="text-align: center; margin-top: 1rem;">
            <a href="index.php" style="color: #667eea; text-decoration: none;">&larr; Terug naar home</a>
        </div>
    </div>
</body>
</html>