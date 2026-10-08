<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - SafeHer</title>

<!-- CSS LINK -->
<link rel="stylesheet" href="style.css">

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<body>

<!-- HEADER -->
<header>
    <h1>SafeHer Dashboard</h1>

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

<!-- WELCOME SECTION -->
<div class="container">

    <h2>👋 Welcome Back</h2>

    <p>
        This is your safety dashboard. Access emergency tools, track alerts, and manage your safety settings.
    </p>

</div>

<!-- QUICK ACTIONS -->
<div class="container">

    <h2>⚡ Quick Actions</h2>

    <div class="cards">

        <div class="card">
            <h3>🚨 SOS Alert</h3>
            <p>Send emergency alert with location</p>
            <button onclick="triggerSOS()">Activate SOS</button>
        </div>

        <div class="card">
            <h3>📍 Live Location</h3>
            <p>Share your current location instantly</p>
            <button onclick="triggerSOS()">Share Location</button>
        </div>

        <div class="card">
            <h3>📝 Report Incident</h3>
            <p>Report unsafe situations anonymously</p>
            <a href="report.php"><button>Open Report</button></a>
        </div>

        <div class="card">
            <h3>📞 Helplines</h3>
            <p>Emergency contact numbers</p>
            <a href="helplines.php"><button>View Numbers</button></a>
        </div>

    </div>

</div>

<!-- SAFETY STATUS -->
<div class="container">

    <h2>🛡 Safety Status</h2>

    <div class="cards">

        <div class="card">
            <h3>✔ Profile Secure</h3>
            <p>Your account is protected</p>
        </div>

        <div class="card">
            <h3>📡 Location Service</h3>
            <p>Ready for emergency tracking</p>
        </div>

        <div class="card">
            <h3>🔔 Alerts</h3>
            <p>No active emergency alerts</p>
        </div>

    </div>

</div>

<!-- FOOTER -->
<footer>
    © 2026 SafeHer | Women Safety Platform
</footer>

<!-- JS LINK -->
<script src="js/script.js"></script>

</body>

</html>