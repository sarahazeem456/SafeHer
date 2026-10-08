<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SOS Emergency - SafeHer</title>

<!-- CSS LINK -->
<link rel="stylesheet" href="style.css">

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<body>

<!-- HEADER -->
<header>
    <h1>🚨 Emergency SOS</h1>

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

<!-- WARNING SECTION -->
<div class="container">

    <h2>⚠ Emergency Alert System</h2>

    <p>
        This feature sends an instant emergency alert with your live location to your registered contacts.
        Use only in real danger situations.
    </p>

</div>

<!-- SOS MAIN BUTTON -->
<div class="container" style="text-align:center;">

    <h2>🔴 One Tap Emergency</h2>

    <p>
        Press the button below to immediately send SOS alert.
    </p>

    <button class="sos-btn" onclick="triggerSOS()">
        SEND SOS ALERT NOW
    </button>

</div>

<!-- FEATURES -->
<div class="container">

    <h2>📡 What Happens When SOS is Sent?</h2>

    <div class="cards">

        <div class="card">
            <h3>📍 Live Location</h3>
            <p>Your GPS location is shared instantly</p>
        </div>

        <div class="card">
            <h3>📩 Alerts Sent</h3>
            <p>Emergency contacts get notified</p>
        </div>

        <div class="card">
            <h3>🚓 Help Requested</h3>
            <p>Authorities can be informed (future feature)</p>
        </div>

    </div>

</div>

<!-- SAFETY TIP -->
<div class="container">

    <h2>🛡 Safety Tip</h2>

    <p>
        Always keep your location services ON for faster emergency response.  
        Stay in well-lit and populated areas whenever possible.
    </p>

</div>

<!-- FOOTER -->
<footer>
    © 2026 SafeHer | Women Safety Platform
</footer>

<!-- JS LINK -->
<script src="js/script.js"></script>

</body>

</html>