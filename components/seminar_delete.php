<?php
if (isset($_POST['id'])) {
    $stu_id = $_POST['id'];

    $conn = mysqli_connect("localhost", "root", "", "crms_naac") or die("Connection Failed!");

    // Check if the record exists
    $check_sql = "SELECT * FROM seminar_organized WHERE id={$stu_id}";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $sql = "DELETE FROM seminar_organized WHERE id={$stu_id}";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Record deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Record not found"; // Custom error message
    }

    mysqli_close($conn);
}
?>
