<?php
include 'header.php';
?>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "crms_naac"; 
$table = "workshop_organized";

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$wtitle = "";
$res_person = "";
$worganized = "";
$wdate = "";
$profile_person = "";
$ac_year = "";
$tech = "";
$OrganizedAt = "";
$totparticipant = "";
$dept = "";
$level = "";
$stime = "";
$etime = "";
$photo = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $wtitle = mysqli_real_escape_string($connection, $_POST["wtitle"]);
    $res_person = mysqli_real_escape_string($connection, $_POST["res_person"]);
    $worganized = mysqli_real_escape_string($connection, $_POST["worganized"]);
    $wdate = mysqli_real_escape_string($connection, $_POST["wdate"]);
    $profile_person = mysqli_real_escape_string($connection, $_POST["profile_person"]);
    $ac_year = mysqli_real_escape_string($connection, $_POST["ac_year"]);
    $tech = mysqli_real_escape_string($connection, $_POST["tech"]);
    $OrganizedAt = mysqli_real_escape_string($connection, $_POST["OrganizedAt"]);
    $totparticipant = mysqli_real_escape_string($connection, $_POST["totparticipant"]);
    $dept = mysqli_real_escape_string($connection, $_POST["dept"]);
    $level = mysqli_real_escape_string($connection, $_POST["level"]);
    $stime = mysqli_real_escape_string($connection, $_POST["stime"]);
    $etime = mysqli_real_escape_string($connection, $_POST["etime"]);

    // Upload photo
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $photo = mysqli_real_escape_string($connection, file_get_contents($_FILES["photo"]["tmp_name"]));
    }

    // Prepare the SQL query
    $query = "INSERT INTO $table (wtitle, res_person, worganized, wdate, profile_person, ac_year, tech, OrganizedAt, totparticipant, dept, level, stime, etime, photo) VALUES ('$wtitle', '$res_person', '$worganized', '$wdate', '$profile_person', '$ac_year', '$tech', '$OrganizedAt', '$totparticipant', '$dept', '$level', '$stime', '$etime', ?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($connection);

    // Check if the prepared statement could be initialized
    if (mysqli_stmt_prepare($stmt, $query)) {
        // Bind the photo as a binary parameter
        mysqli_stmt_bind_param($stmt, "b", $photo);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Workshop data added successfully!");</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Prepared statement initialization failed.");</script>';
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>

<head>
	<title>WORKSHOP ORGANIZED</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
	<style>

	</style>
</head>

<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="containers" style="margin-left: 2px; margin-right: 2px;">
			<div class="container-fluid p-0">
				<div class="col-md-12">
					<h1 align="center">Workshop Organized</h1>
					<hr>
					<div class="col-lg-12">
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label for="dayname"><b>Title of Workshop:</b></label>
											<input type="text" name="wtitle" class="form-control"
												placeholder="Workshop Title">
										</div><br>
										<div class="form-group">
											<label for="dayname"><b>Resource Person:</b></label>
											<input type="text" name="res_person" class="form-control"
												placeholder="Resource Person">
										</div><br>
										<div class="form-group">
											<label for="dayname"><b>Workshop Organized by:</b></label>
											<input type="text" name="worganized" class="form-control"
												placeholder="Workshop Organized by">
										</div><br>
										<div class="form-group">
											<label for="dayname"><b>Date Of Workshop Organized:</b></label>
											<input type="date" name="wdate" class="form-control"
												placeholder="Date Of workshop Organized">
										</div><br>
										<div class="form-group">
											<label for="dayname"><b>Profile of Resource Person:</b></label>
											<input type="text" name="profile_person" class="form-control"
												placeholder="Resource Person Profile">
										</div><br>
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
									</div><br>
									<div class="form-group">
										<label for="tech"><b>Technology Used:</b></label>
										<input name="tech" id="tech" class="form-control"
											placeholder='Python,Java,MERN..'>
										</input>
									</div><br>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<label for="dayname"><b>Workshop Organized At:</b></label>
										<input type="text" name="OrganizedAt" class="form-control"
											placeholder="Workshop Organized At">
									</div><br>
									<div class="form-group">
										<label for="dayname"><b>Total Number of Participants: </b></label>
										<input type="text" name="totparticipant" class="form-control"
											placeholder="Total No. of Participants">
									</div><br>
									<div class="form-group">
										<label for="dayname"><b>Department:</b></label>
										<input type="text" name="dept" class="form-control"
											placeholder="Department Name:">
									</div><br>
									<div class="form-group">
										<label for="dayname"><b>Workshop Organized level:</b></label> <br>
										<input type="radio" name="level" value="college"> College
										<input type="radio" name="level" value="University"> University
										<input type="radio" name="level" value="Statelevel"> State Level
										<input type="radio" name="level" value="National"> National
										<input type="radio" name="level" value="International"> International
									</div><br>
									<div class="form-group">
										<label for="dayname"><b>Workshop Time:</b></label><br>
										<h6>from</h6>
										<input type="time" name="stime" class="form-control" placeholder="Start Time">
										<h6>to</h6>
										<input type="time" name="etime" class="form-control" placeholder="End Time">
									</div><br>

									<div class="form-group">
										<label for="dayname"><b>Upload Photo:</b></label>
										<input type="file" name="photo" class="form-control">
									</div><br>
									<br><br>
									<div class="col-md-6 col-md-offset-3">
										<div class="form-group">
											<input type="submit" name="submit" value="Add Workshop Organized"
												class="btn btn-primary btn-block">
										</div>
									</div><br>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>