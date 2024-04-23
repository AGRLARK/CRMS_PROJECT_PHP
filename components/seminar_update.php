<?php
include '../header.php';
?>
<?php
// Include your database connection code or config here
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $seminar_id = $_POST['id'];
    $stitle = $_POST['stitle'];
    $speaker = $_POST['speaker'];
    $seminarOrganizedBy = $_POST['seminarOrganizedBy'];
    $seminarDate = $_POST['seminarDate'];

    // Perform SQL UPDATE query
    $sql = "UPDATE seminar_organized SET
        stitle = '$stitle',
        speaker = '$speaker',
        seminarOrganizedBy = '$seminarOrganizedBy',
        seminarDate = '$seminarDate'
        WHERE id = $seminar_id";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        echo "Seminar record updated successfully.";
    } else {
        // Update failed
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seminar Update</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div id="wrapper">
            <div id="header">
                <h1>Seminar Update</h1>
            </div>
            <div id="menu">
                <ul>
                    <li>
                        <a href="seminar_home.php">Home</a>
                    </li>
                    <li>
                        <a href="seminar_update.php">Update</a>
                    </li>
                    <li>
                        <a href="seminar_delete.php">Delete</a>
                    </li>
                </ul>
            </div>
            <div id="main-content">
                <h2>Update Seminar Record</h2>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "crms_naac") or die("Connection Failed!");

                // Check if 'id' is set in the query string
                $seminar_id = isset($_GET['id']) ? $_GET['id'] : null;

                if ($seminar_id !== null) {
                    // Query to fetch the seminar record by ID
                    $sql = "SELECT * FROM seminar_organized WHERE id = $seminar_id";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form class="post-form" action="" method="post">
                            <div class="form-group">
                                <label>Seminar Title</label>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <input type="text" name="stitle" value="<?php echo $row['stitle']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Speaker</label>
                                <input type="text" name="speaker" value="<?php echo $row['speaker']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Organized By</label>
                                <input type="text" name="seminarOrganizedBy"
                                    value="<?php echo $row['seminarOrganizedBy']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="seminarDate" value="<?php echo $row['seminarDate']; ?>" />
                            </div>
                            <!-- Add more input fields for other seminar properties -->
                            <input class="submit" type="submit" value="Update" />
                        </form>
                        <?php
                    } else {
                        echo "<h3>No Seminar Record Found for ID: $seminar_id</h3>";
                    }
                } else {
                    echo "<h3>No Seminar ID specified for update.</h3>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>

</html>