<?php
include 'header.php';
?>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = ""; 
$database = "crms_naac"; 

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$stitle = "";
$speaker = "";
$seminarOrganizedBy = "";
$seminarDate = "";
$profileSpeaker = "";
$ac_year = "";
$seminarOrganizedAt = "";
$totParticipants = "";
$dept = "";
$seminarLevel = "";
$seminarStartTime = "";
$seminarEndTime = "";
$seminarPhoto = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $stitle = mysqli_real_escape_string($connection, $_POST["stitle"]);
    $speaker = mysqli_real_escape_string($connection, $_POST["speaker"]);
    $seminarOrganizedBy = mysqli_real_escape_string($connection, $_POST["seminarOrganizedBy"]);
    $seminarDate = mysqli_real_escape_string($connection, $_POST["seminarDate"]);
    $profileSpeaker = mysqli_real_escape_string($connection, $_POST["profileSpeaker"]);
    $ac_year = mysqli_real_escape_string($connection, $_POST["ac_year"]);
    $seminarOrganizedAt = mysqli_real_escape_string($connection, $_POST["seminarOrganizedAt"]);
    $totParticipants = mysqli_real_escape_string($connection, $_POST["totParticipants"]);
    $dept = mysqli_real_escape_string($connection, $_POST["dept"]);
    $seminarLevel = mysqli_real_escape_string($connection, $_POST["seminarLevel"]);
    $seminarStartTime = mysqli_real_escape_string($connection, $_POST["seminarStartTime"]);
    $seminarEndTime = mysqli_real_escape_string($connection, $_POST["seminarEndTime"]);
    
    // Handle file upload (Seminar Photo)
    if (isset($_FILES["seminarPhoto"]) && $_FILES["seminarPhoto"]["error"] == 0) {
        $targetDirectory = __DIR__ . "/uploads/";
        $targetFile = $targetDirectory . basename($_FILES["seminarPhoto"]["name"]);
        
        // Check if file is uploaded successfully
        if (move_uploaded_file($_FILES["seminarPhoto"]["tmp_name"], $targetFile)) {
            $seminarPhoto = mysqli_real_escape_string($connection, $targetFile);
        } else {
            echo "Error uploading file.";
        }
    }

    // Query to insert data into the seminar_organized table
    $query = "INSERT INTO seminar_organized(stitle, speaker, seminarOrganizedBy, seminarDate, profileSpeaker, ac_year, seminarOrganizedAt, totParticipants, dept, seminarLevel, seminarStartTime, seminarEndTime, seminarPhoto) VALUES ('$stitle', '$speaker', '$seminarOrganizedBy', '$seminarDate', '$profileSpeaker', '$ac_year', '$seminarOrganizedAt', '$totParticipants', '$dept', '$seminarLevel', '$seminarStartTime', '$seminarEndTime', '$seminarPhoto')";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the data was inserted successfully
    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . mysqli_error($connection);
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
    <title>NAAC CRMS</title>
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
            <h1 align="center">Seminar Organized</h1>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stitle"><b>Title of Seminar:</b></label>
                        <input type="text" name="stitle" class="form-control" placeholder="Seminar Title">
                    </div>
                    <div class="form-group">
                        <label for="speaker"><b>Speaker:</b></label>
                        <input type="text" name="speaker" class="form-control" placeholder="Speaker">
                    </div>
                    <div class="form-group">
                        <label for="seminarOrganizedBy"><b>Seminar Organized by:</b></label>
                        <input type="text" name="seminarOrganizedBy" class="form-control"
                            placeholder="Seminar Organized by">
                    </div>
                    <div class="form-group">
                        <label for="seminarDate"><b>Date Of Seminar Organized:</b></label>
                        <input type="date" name="seminarDate" class="form-control"
                            placeholder="Date Of Seminar Organized">
                    </div>
                    <div class="form-group">
                        <label for="profileSpeaker"><b>Profile of Speaker:</b></label>
                        <input type="text" name="profileSpeaker" class="form-control" placeholder="Speaker Profile">
                    </div>
                    <div class="form-group">
                        <label for="ac_year"><b>Academic Year:</b></label>
                        <select name="ac_year" id="ac_year" class="form-control">
                            <option value="">--Select--</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="seminarOrganizedAt"><b>Seminar Organized At:</b></label>
                        <input type="text" name="seminarOrganizedAt" class="form-control"
                            placeholder="Seminar Organized At">
                    </div>
                    <div class="form-group">
                        <label for="totParticipants"><b>Total Number of Participants:</b></label>
                        <input type="text" name="totParticipants" class="form-control"
                            placeholder="Total No. of Participants">
                    </div>
                    <div class="form-group">
                        <label for="dept"><b>Department:</b></label>
                        <input type="text" name="dept" class="form-control" placeholder="Department Name">
                    </div>
                    <div class="form-group">
                        <label for="seminarLevel"><b>Seminar Organized Level:</b></label>
                        <br>
                        <input type="radio" name="seminarLevel" value="college"> College
                        <input type="radio" name="seminarLevel" value="University"> University
                        <input type="radio" name="seminarLevel" value="Statelevel"> State Level
                        <input type="radio" name="seminarLevel" value="National"> National
                        <input type="radio" name="seminarLevel" value="International"> International
                    </div>
                    <div class="form-group">
                        <label for="seminarStartTime"><b>Seminar Time:</b></label>
                        <br>
                        <h6>from</h6>
                        <input type="time" name="seminarStartTime" class="form-control" placeholder="Start Time">
                        <h6>to</h6>
                        <input type="time" name="seminarEndTime" class="form-control" placeholder="End Time">
                    </div>
                    <div class="form-group">
                        <label for="seminarPhoto"><b>Upload Seminar Photo:</b></label>
                        <input type="file" name="seminarPhoto" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Seminar Organized" class="btn btn-primary btn-block">
                </div>
            </div>
        </div>
    </form>
</body>

</html>