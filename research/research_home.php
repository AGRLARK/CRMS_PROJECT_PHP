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

// Query to retrieve all research lab records
$sql = "SELECT * FROM research_lab";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAAC CRMS - Research Lab Records</title>
    <link rel="stylesheet" href="../components/style.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Research Lab Records</h1>
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
        <h2>All Research Lab Records</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table cellpadding="7px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lab Name</th>
                        <th>Lab Location</th>
                        <th>Department</th>
                        <th>Total Cost</th>
                        <th>Lab Description</th>
                        <th>Lab Sponsors</th>
                        <th>Lab Photo</th>
                        <th>Lab Date</th>
                        <th>Action</th> <!-- Added Action column -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['labName']; ?>
                            </td>
                            <td>
                                <?php echo $row['labLocation']; ?>
                            </td>
                            <td>
                                <?php echo $row['department']; ?>
                            </td>
                            <td>
                                <?php echo $row['totalCost']; ?>
                            </td>
                            <td>
                                <?php echo $row['labDescription']; ?>
                            </td>
                            <td>
                                <?php echo $row['labSponsors']; ?>
                            </td>
                            <td>
                                <?php echo $row['labPhoto']; ?>
                            </td>
                            <td>
                                <?php echo $row['labDate']; ?>
                            </td>
                            <td class="actions flex space-x-2">
                                <a href='research_update.php?id=<?php echo $row['id']; ?>'
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="research_delete.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No Research Lab Records Found</h2>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>