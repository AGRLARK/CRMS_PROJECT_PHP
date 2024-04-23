<?php
if (isset($_POST['id'])) {
    $research_id = $_POST['id'];

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

    // Check if the record exists
    $check_sql = "SELECT * FROM research_lab WHERE id={$research_id}";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $sql = "DELETE FROM research_lab WHERE id={$research_id}";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Record deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Record not found"; // Custom error message
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
