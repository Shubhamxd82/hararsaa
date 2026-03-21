<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($password === 'aniket') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username ?: 'User';
        header('Location: index.php');
        exit;
    } else {
        $error = '❌ Wrong password! Password is: aniket';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Phone Destroyer Pro</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px;
            width: 90%;
            max-width: 450px;
            border: 1px solid rgba(255,255,255,0.2);
            text-align: center;
        }
        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff0066, #ff6600);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 30px;
        }
        input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 15px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            font-size: 1rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        input:focus { outline: none; border-color: #ff6600; }
        input::placeholder { color: rgba(255,255,255,0.5); }
        button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(45deg, #ff0066, #ff6600);
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover { transform: scale(1.02); opacity: 0.9; }
        .error { color: #ff4757; margin-top: 15px; }
        .info { margin-top: 20px; color: rgba(255,255,255,0.6); font-size: 0.9rem; }
        .password { color: #2ecc71; font-weight: bold; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">💀 PHONE DESTROYER</div>
        <form method="POST">
            <input type="text" name="username" placeholder="Your Name (any)" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">🔓 ACCESS SYSTEM</button>
        </form>
        <?php if($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="info">
            🔐 <strong>Password: <span class="password">aniket</span></strong><br>
            (Authorized access only)
        </div>
    </div>
</body>
</html>
