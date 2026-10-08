<?php
// Start a temporary native system session
session_start();

// 1. Establish MySQL Database Connection
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "safeher_db"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$error_message = "";

// 2. Process Login Actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_password = $_POST['password'];

    // Verify if user registration profile exists
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);

        // Verify secret login credentials matching account
        if ($user_password === $user_data['password'] || password_verify($user_password, $user_data['password'])) {
            
            // Set session variables in temporary server memory
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['name'];
            $_SESSION['user_email'] = $user_data['email'];
            
            $session_key = session_id(); // Unique session token identifier string
            $user_id = $user_data['id'];
            $user_name = $user_data['name'];
            $ip_address = $_SERVER['REMOTE_ADDR']; // Captures user's network connection IP
            $browser_agent = mysqli_real_escape_string($conn, $_SERVER['HTTP_USER_AGENT']); // Captures browser version details

            // Optional: Remove any previous lingering active session entries for this user to avoid duplicates
            mysqli_query($conn, "DELETE FROM active_sessions WHERE user_id = '$user_id'");

            // Insert fresh tracking dataset string row directly into your active_sessions dashboard table
            $session_sql = "INSERT INTO active_sessions (session_key, user_id, user_name, ip_address, browser_agent) 
                            VALUES ('$session_key', '$user_id', '$user_name', '$ip_address', '$browser_agent')";
            
            mysqli_query($conn, $session_sql);

            // Redirect smoothly to your home/dashboard presentation viewport
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "No account found with that email address.";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SafeHer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header>
    <h1>SafeHer Login</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="report.php">Report</a>
        <a href="sos.php">SOS</a>
        <a href="helplines.php">Helplines</a>
        <a href="selfdefense.php">Self Defence</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<div class="container">
    <h2>🔐 Welcome Back</h2>
    <p>Login to access your dashboard, SOS alerts, and safety tools.</p>

    <?php if (!empty($error_message)): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 15px; border-radius: 5px; font-weight: bold; text-align: center;">
            ❌ <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
    </form>
</div>

<div class="container">
    <h2>✨ What You Can Do</h2>
    <div class="cards">
        <div class="card">
            <h3>🚨 Emergency SOS</h3>
            <p>Send instant alert with live location.</p>
        </div>
        <div class="card">
            <h3>📍 Live Tracking</h3>
            <p>Share your location with trusted contacts.</p>
        </div>
        <div class="card">
            <h3>📝 Reports</h3>
            <p>View and submit incident reports.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 SafeHer | Women Safety Platform
</footer>

</body>
</html>