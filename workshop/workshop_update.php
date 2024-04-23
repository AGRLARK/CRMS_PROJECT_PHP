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
    $workshop_id = $_POST['id'];
    $wtitle = $_POST['wtitle'];
    $res_person = $_POST['res_person'];
    $worganized = $_POST['worganized'];
    $wdate = $_POST['wdate'];

    // Perform SQL UPDATE query
    $sql = "UPDATE workshop_organized SET
        wtitle = '$wtitle',
        res_person = '$res_person',
        worganized = '$worganized',
        wdate = '$wdate'
        WHERE id = $workshop_id";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        header("Location: workshop_home.php"); // Redirect to the view page
        exit();
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
    <title>Workshop Update</title>
    <link rel="stylesheet" href="../components/style.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <div id="wrapper">
            <div id="header">
                <h1>Workshop Update</h1>
            </div>
            <div id="menu">
                <ul>
                    <li>
                        <a href="workshop_home.php">Home</a>
                    </li>
                    <li>
                        <a href="workshop_update.php">Update</a>
                    </li>
                    <li>
                        <a href="workshop_delete.php">Delete</a>
                    </li>
                </ul>
            </div>
            <div id="main-content">
                <h2>Update Workshop Record</h2>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "crms_naac") or die("Connection Failed!");

                // Check if 'id' is set in the query string
                $workshop_id = isset($_GET['id']) ? $_GET['id'] : null;

                if ($workshop_id !== null) {
                    // Query to fetch the workshop record by ID
                    $sql = "SELECT * FROM workshop_organized WHERE id = $workshop_id";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form class="post-form" action="" method="post">
                            <div class="form-group">
                                <label>Workshop Title</label>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <input type="text" name="wtitle" value="<?php echo $row['wtitle']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Responsible Person</label>
                                <input type="text" name="res_person" value="<?php echo $row['res_person']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Organized By</label>
                                <input type="text" name="worganized" value="<?php echo $row['worganized']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="wdate" value="<?php echo $row['wdate']; ?>" />
                            </div>
                            <!-- Add more input fields for other workshop properties -->
                            <input class="submit" type="submit" value="Update" />
                        </form>
                        <?php
                    } else {
                        echo "<h3>No Workshop Record Found for ID: $workshop_id</h3>";
                    }
                } else {
                    echo "<h3>No Workshop ID specified for update.</h3>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
