<?php
include 'header.php';
?>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "crms_naac";
$table = "collaboration_info"; // You can adjust the table name as needed

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$activityType = "";
$collaborationDescription = "";
$benefits = "";
$moUs = "";
$events = "";
$linkages = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $activityType = mysqli_real_escape_string($connection, $_POST["activityType"]);
    $collaborationDescription = mysqli_real_escape_string($connection, $_POST["collaborationDescription"]);
    $benefits = mysqli_real_escape_string($connection, $_POST["benefits"]);
    $moUs = mysqli_real_escape_string($connection, $_POST["moUs"]);
    $events = mysqli_real_escape_string($connection, $_POST["events"]);
    $linkages = mysqli_real_escape_string($connection, $_POST["linkages"]);
    $activityDate = mysqli_real_escape_string($connection, $_POST["activityDate"]); // Added this line for date input

    // Prepare the SQL query
    $query = "INSERT INTO $table (activityType, collaborationDescription, benefits, moUs, events, linkages, activityDate) VALUES ('$activityType', '$collaborationDescription', '$benefits', '$moUs', '$events', '$linkages', '$activityDate')";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Collaboration data added successfully!");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaboration Information</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="POST">
        <h1 align="center">Collaboration Information</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="activityType">Activity Type:</label>
                        <input type="text" name="activityType" class="form-control" placeholder="e.g., Collaborative Research" required>
                    </div>
                    <div class="form-group">
                        <label for="activityDate">Activity Date:</label>
                        <input type="date" name="activityDate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="collaborationDescription">Collaboration Description:</label>
                        <textarea name="collaborationDescription" class="form-control" rows="4" placeholder="Provide a brief description of the collaboration" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="benefits">Benefits:</label>
                        <textarea name="benefits" class="form-control" rows="4" placeholder="List the benefits of this collaboration" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="moUs">MoUs/Collaborative Arrangements:</label>
                        <textarea name="moUs" class="form-control" rows="4" placeholder="Faculty Exchange Programs,Shared Research Facilities,Collaborative Workshops,etc." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="events">Events:</label>
                        <textarea name="events" class="form-control" rows="4" placeholder="Highlight any events related to this collaboration" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="linkages">Linkages and Activities:</label>
                        <textarea name="linkages" class="form-control" rows="4" placeholder="Explain the linkages and activities involved" required></textarea>
                    </div>
                </div>
            </div><br><br>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Collaboration Data" class="btn btn-primary btn-block">
                </div>
            </div>
        </div>
    </form>
</body>
</html>
