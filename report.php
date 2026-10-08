<?php
// 1. Connect to your database configuration
include('config.php');

$message = "";

// 2. Check if the user clicked the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 3. Get text inputs and sanitize them 
    $incident_type = mysqli_real_escape_string($conn, $_POST['incident_type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $evidence_path = NULL; // Default if no file is uploaded

    // 4. Handle file upload (Optional Evidence)
    if (isset($_FILES['evidence']) && $_FILES['evidence']['error'] == 0) {
        $target_dir = "uploads/";
        
        // Create the uploads folder automatically if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_name = time() . "_" . basename($_FILES["evidence"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["evidence"]["tmp_name"], $target_file)) {
            $evidence_path = $target_file; // Save path string for the database
        }
    }

    // 5. Insert data using your EXACT phpMyAdmin column names: incidenttype, location, description, evidencepath
    $query = "INSERT INTO reports (incidenttype, location, description, evidencepath) 
              VALUES ('$incident_type', '$location', '$description', " . ($evidence_path ? "'$evidence_path'" : "NULL") . ")";
    
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Incident Reported Anonymously and Securely!'); window.location.href='dashboard.php';</script>";
        exit();
    } else {
        $message = "Database Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Report Incident - SafeHer</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header>
    <h1>Incident Reporting</h1>
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
    <h2>📝 Report Unsafe Incident</h2>
    <p>
        You can anonymously report harassment, unsafe situations, or any emergency-related incident.
        Your identity will remain protected.
    </p>
    <?php if(!empty($message)): ?>
        <p style="color: red; font-weight: bold;"><?php echo $message; ?></p>
    <?php endif; ?>
</div>

<div class="container">
    <h2>📩 Incident Form</h2>

    <form action="report.php" method="POST" enctype="multipart/form-data">

        <label>Incident Type</label>
        <select name="incident_type" required>
            <option value="Harassment">Harassment</option>
            <option value="Stalking">Stalking</option>
            <option value="Violence">Violence</option>
            <option value="Other">Other</option>
        </select>

        <label>Location</label>
        <input type="text" name="location" placeholder="Enter incident location" required>

        <label>Describe Incident</label>
        <textarea name="description" rows="5" placeholder="Write details of what happened..." required></textarea>

        <label>Optional Evidence</label>
        <input type="file" name="evidence">

        <button type="submit">Submit Report</button>

    </form>
</div>

<div class="container">
    <h2>🔐 Why Anonymous Reporting?</h2>
    <div class="cards">
        <div class="card">
            <h3>🛡️ Privacy Protected</h3>
            <p>Your identity is never shared.</p>
        </div>
        <div class="card">
            <h3>⚡ Fast Action</h3>
            <p>Reports are sent instantly for review.</p>
        </div>
        <div class="card">
            <h3>🚨 Safety First</h3>
            <p>Helps improve women's safety response.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 SafeHer | Women Safety Platform
</footer>

</body>
</html>