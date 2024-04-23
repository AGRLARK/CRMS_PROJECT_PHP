<?php
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NAAC CRMS</title>
    <link rel="stylesheet" href="../components/style.css">
    <style>
        .container {
            margin-left: 10%;
        }
    </style>
</head>

<body>
    <?php include '../header.php'; ?>
    <div id="wrapper">
        <div id="header">
            <h1>Workshop Organized Data</h1>
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
    </div>
    <div id="main-content" style="margin-left: 0%; margin-right: 20%;">
        <h2>All Workshop Records</h2>
        <?php
        $sql = "SELECT * FROM workshop_organized";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

        if (mysqli_num_rows($result) > 0) {
            ?>
            <table cellpadding="7px">
                <thead>
                    <th>ID</th>
                    <th>Workshop Title</th>
                    <th>Responsible Person</th>
                    <th>Organized By</th>
                    <th>Date</th>
                    <th>Profile Person</th>
                    <th>Academic Year</th>
                    <th>Technology</th>
                    <th>Total Participants</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Photo</th>
                    <th>Action</th>
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
                                <?php echo $row['wtitle']; ?>
                            </td>
                            <td>
                                <?php echo $row['res_person']; ?>
                            </td>
                            <td>
                                <?php echo $row['worganized']; ?>
                            </td>
                            <td>
                                <?php echo $row['wdate']; ?>
                            </td>
                            <td>
                                <?php echo $row['profile_person']; ?>
                            </td>
                            <td>
                                <?php echo $row['ac_year']; ?>
                            </td>
                            <td>
                                <?php echo $row['tech']; ?>
                            </td>
                            <td>
                                <?php echo $row['totparticipant']; ?>
                            </td>
                            <td>
                                <?php echo $row['dept']; ?>
                            </td>
                            <td>
                                <?php echo $row['level']; ?>
                            </td>
                            <td>
                                <?php echo $row['stime']; ?>
                            </td>
                            <td>
                                <?php echo $row['etime']; ?>
                            </td>
                            <td>
                                <?php echo $row['photo']; ?>
                            </td>
                            <td class="flex space-x-2">
                                <a href='workshop_update.php?id=<?php echo $row['id']; ?>'
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="workshop_delete.php" method="post" style="display: inline;">
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
            echo "<h2>No Workshop Records Found</h2>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>