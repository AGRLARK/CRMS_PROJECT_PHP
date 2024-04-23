<?php
include '../header.php';

$hostname = "localhost";
$username = "root";
$password = "";
$database = "crms_naac";

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' is set in the query string
$research_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($research_id !== null) {
    // Query to fetch the research lab record by ID
    $sql = "SELECT * FROM research_lab WHERE id = $research_id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<h3>No Research Lab Record Found for ID: $research_id</h3>";
    }
} else {
    echo "<h3>No Research Lab ID specified for update.</h3>";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Research Lab Record</title>
    <link rel="stylesheet" href="../components/style.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Update Research Lab Record</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="research_home.php">Home</a>
                </li>
                <li>
                    <a href="research_update.php">Update</a>
                </li>
                <li>
                    <a href="research_delete.php">Delete</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="main-content">
        <?php if ($research_id !== null && mysqli_num_rows($result) > 0) { ?>
            <form class="post-form" action="research_update_process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <div class="form-group">
                    <label>Lab Name</label>
                    <input type="text" name="labName" value="<?php echo $row['labName']; ?>" />
                </div>
                <div class="form-group">
                    <label>Lab Location</label>
                    <input type="text" name="labLocation" value="<?php echo $row['labLocation']; ?>" />
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="department" value="<?php echo $row['department']; ?>" />
                </div>
                <div class="form-group">
                    <label>Total Cost</label>
                    <input type="text" name="totalCost" value="<?php echo $row['totalCost']; ?>" />
                </div>
                <div class="form-group">
                    <label>Lab Description</label>
                    <textarea name="labDescription"><?php echo $row['labDescription']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Lab Sponsors</label>
                    <input type="text" name="labSponsors" value="<?php echo $row['labSponsors']; ?>" />
                </div>
                <div class="form-group">
                    <label>Lab Photo</label>
                    <input type="text" name="labPhoto" value="<?php echo $row['labPhoto']; ?>" />
                </div>
                <div class="form-group">
                    <label>Lab Date</label>
                    <input type="date" name="labDate" value="<?php echo $row['labDate']; ?>" />
                </div>
                <!-- Add more input fields for other research lab properties -->
                <input class="submit" type="submit" value="Update" />
            </form>
        <?php } ?>
    </div>
</body>

</html>
