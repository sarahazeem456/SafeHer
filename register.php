<?php
// 1. Connect to the database
include('config.php');

$message = "";

// 2. Check if the user clicked the button
if (isset($_POST['register_btn'])) {
    
    // 3. Get the data from the input fields
    $full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $emergency = mysqli_real_escape_string($conn, $_POST['emergency']);

    // 4. Secure the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // 5. Check if the email already exists
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $run_check = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($run_check) > 0) {
        $message = "Email already exists!";
    } else {
        // 6. Insert the data using the EXACT column names from your phpMyAdmin screenshot
        $query = "INSERT INTO users (fullname, email, phone, password, emergencycontact) 
                  VALUES ('$full_name', '$email', '$phone', '$hashed_password', '$emergency')";
        
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo "<script>alert('Registration Successful!'); window.location.href='login.php';</script>";
            exit();
        } else {
            $message = "Database Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SafeHer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header>
    <h1>SafeHer Registration</h1>
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
    <h2>📝 Create Your Account</h2>
    <p>Join SafeHer to access emergency SOS, live tracking, and safety tools.</p>

    <?php if(!empty($message)): ?>
        <p style="color: red; font-weight: bold;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="register.php" method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" placeholder="Enter your full name" required>

        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Phone Number</label>
        <input type="tel" name="phone" placeholder="03XXXXXXXXX" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create password" required>

        <label>Emergency Contact</label>
        <input type="tel" name="emergency" placeholder="Emergency contact number" required>

        <button type="submit" name="register_btn">Register</button>

    </form>
</div>

<footer>
    © 2026 SafeHer | Women Safety Platform
</footer>

</body>
</html>