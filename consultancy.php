<?php
include 'header.php';
?>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "crms_naac";
$table = "consultancy_organized";

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$consultancyName = "";
$clientName = "";
$clientIndustry = "";
$projectDescription = "";
$projectCost = "";
$projectDate = "";
$consultancyPhoto = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $consultancyName = mysqli_real_escape_string($connection, $_POST["consultancyName"]);
    $clientName = mysqli_real_escape_string($connection, $_POST["clientName"]);
    $clientIndustry = mysqli_real_escape_string($connection, $_POST["clientIndustry"]);
    $projectDescription = mysqli_real_escape_string($connection, $_POST["projectDescription"]);
    $projectCost = mysqli_real_escape_string($connection, $_POST["projectCost"]);
    $projectDate = mysqli_real_escape_string($connection, $_POST["projectDate"]); 

    // Handle consultancy photo upload
    $targetDirectory = __DIR__ . "/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["consultancyPhoto"]["name"]);

    if (move_uploaded_file($_FILES["consultancyPhoto"]["tmp_name"], $targetFile)) {
        $consultancyPhoto = mysqli_real_escape_string($connection, $targetFile);
    }

    // Prepare the SQL query
    $query = "INSERT INTO $table (consultancyName, clientName, clientIndustry, projectDescription, projectCost, projectDate, consultancyPhoto) VALUES ('$consultancyName', '$clientName', '$clientIndustry', '$projectDescription', '$projectCost', '$projectDate', '$consultancyPhoto')";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Consultancy data added successfully!");</script>';
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
    <title>Consultancy Organized</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
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
    <div class="container">
        <h1 class="text-center">Consultancy Organized</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="consultancyName">Consultancy Name:</label>
                    <input type="text" name="consultancyName" class="form-control" placeholder="Management consulting,technical consulting,financial,etc." required>
                </div>
                <div class="form-group">
                    <label for="clientName">Client Name:</label>
                    <input type="text" name="clientName" class="form-control" placeholder="client Name" required>
                </div>
                <div class="form-group">
                    <label for="clientIndustry">Client Industry:</label>
                    <input type="text" name="clientIndustry" class="form-control" placeholder="Client Industry Name" required>
                </div>
                <div class="form-group">
                    <label for="projectDescription">Project Description:</label>
                    <textarea name="projectDescription" class="form-control" rows="4" placeholder="Description" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="projectCost">Project Cost (in INR):</label>
                    <input type="number" name="projectCost" class="form-control" placeholder="Project Cost (in Rs.)" required>
                </div>
                <div class="form-group">
                    <label for="projectDate">Project Date:</label>
                    <input type="date" name="projectDate" class="form-control" placeholder="Project Date" required>
                </div>
                <div class="form-group">
                    <label for="consultancyPhoto">Upload Photo:</label>
                    <input type="file" name="consultancyPhoto" class="form-control" placeholder="Upload Photo" required>
                </div>
            </div>
        </div><br><br>
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Add Consultancy Data" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>
</body>
</html>
