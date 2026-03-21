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
    <title>🔐 Login - Phone Destroyer Pro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated Background */
        .bg-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: moveBg 20s linear infinite;
        }
        
        @keyframes moveBg {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            margin: 20px;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-box {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            padding: 50px 40px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.15);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        
        .logo {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ff0066, #ff6600, #ffcc00);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        
        .logo i {
            background: none;
            -webkit-background-clip: unset;
            color: #ff6600;
        }
        
        .subtitle {
            color: rgba(255,255,255,0.7);
            margin-bottom: 35px;
            font-size: 0.9rem;
        }
        
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .input-group i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.5);
            font-size: 1.1rem;
        }
        
        .input-group input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            font-size: 1rem;
            background: rgba(255,255,255,0.08);
            border: 2px solid rgba(255,255,255,0.15);
            border-radius: 25px;
            color: #fff;
            transition: all 0.3s;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #ff6600;
            background: rgba(255,255,255,0.12);
        }
        
        .input-group input::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        button {
            width: 100%;
            padding: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ff0066, #ff6600);
            border: none;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        button:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(255,102,0,0.3);
        }
        
        .error {
            color: #ff4757;
            margin-top: 20px;
            padding: 12px;
            background: rgba(255,71,87,0.1);
            border-radius: 15px;
            font-size: 0.9rem;
        }
        
        .info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
        }
        
        .password {
            background: rgba(46,204,113,0.2);
            padding: 8px 15px;
            border-radius: 30px;
            display: inline-block;
            margin-top: 10px;
            color: #2ecc71;
            font-weight: bold;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }
        
        .footer {
            margin-top: 20px;
            font-size: 0.7rem;
            opacity: 0.5;
            text-align: center;
        }
        
        @media (max-width: 480px) {
            .login-box { padding: 35px 25px; }
            .logo { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <i class="fas fa-skull"></i> PHONE DESTROYER
            </div>
            <div class="subtitle">
                <i class="fas fa-shield-alt"></i> Authorized Access Only
            </div>
            
            <form method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Your Name (any)" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">
                    <i class="fas fa-unlock-alt"></i> ACCESS SYSTEM
                </button>
            </form>
            
            <?php if($error): ?>
                <div class="error">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <div class="info">
                <i class="fas fa-key"></i> Master Password
                <div class="password">aniket</div>
                <p style="margin-top: 15px; font-size: 0.8rem;">
                    <i class="fas fa-info-circle"></i> Enter any username
                </p>
            </div>
        </div>
        
        <div class="footer">
            <i class="fas fa-bolt"></i> 200+ APIs Ready | 24/7 Access
        </div>
    </div>
</body>
</html>
