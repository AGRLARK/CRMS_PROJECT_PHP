<?php
include 'header.php';
?>

<?php
// Database connection code 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "crms_naac";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$labName = "";
$labLocation = "";
$department = "";
$totalCost = "";
$labDescription = "";
$labSponsors = "";
$labPhoto = "";
$labDate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $labName = mysqli_real_escape_string($connection, $_POST["labName"]);
    $labLocation = mysqli_real_escape_string($connection, $_POST["labLocation"]);
    $department = mysqli_real_escape_string($connection, $_POST["department"]);
    $totalCost = mysqli_real_escape_string($connection, $_POST["totalCost"]);
    $labDescription = mysqli_real_escape_string($connection, $_POST["labDescription"]);
    $labSponsors = mysqli_real_escape_string($connection, $_POST["labSponsors"]);
    $labDate = mysqli_real_escape_string($connection, $_POST["labDate"]); // Added this line for date input

    // Handle lab photo upload
    $targetDirectory = __DIR__ . "/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["labPhoto"]["name"]);

    if (move_uploaded_file($_FILES["labPhoto"]["tmp_name"], $targetFile)) {
        $labPhoto = mysqli_real_escape_string($connection, $targetFile);
    }

    // Insert data into the database
    $query = "INSERT INTO research_lab (labName, labLocation, department, totalCost, labDescription, labSponsors, labPhoto, labDate) 
              VALUES ('$labName', '$labLocation', '$department', '$totalCost', '$labDescription', '$labSponsors', '$labPhoto', '$labDate')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Research lab data added successfully!");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Lab Organized</title>
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
    <form action="" method="POST" enctype="multipart/form-data">
        <h1 align="center">Research Lab Organized</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="labName">Lab Name:</label>
                        <input type="text" name="labName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labLocation">Lab Location:</label>
                        <input type="text" name="labLocation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department:</label>
                        <input type="text" name="department" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="totalCost">Total Cost/Expenses (in INR):</label>
                        <input type="number" name="totalCost" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labDate">Date:</label>
                        <input type="date" name="labDate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="labDescription">Lab Description:</label>
                        <textarea name="labDescription" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="labSponsors">Sponsors:</label>
                        <input type="text" name="labSponsors" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labPhoto">Upload Lab Photo:</label>
                        <input type="file" name="labPhoto" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
                </div>
            </div>
        </div>
    </form>
</body>
</html>
