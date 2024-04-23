<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seminar CRUD</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    include '../header.php';
    ?>
    <div id="wrapper">
        <div id="header">
            <h1>Seminar Organized DATA</h1>
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
    </div>
    <div id="main-content" style="margin-left: 20%; margin-right: 20%;">
        <h2>All Seminar Records</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "crms_naac") or die("Connection Failed!");
        $sql = "SELECT * FROM seminar_organized";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

        if (mysqli_num_rows($result) > 0) {
            ?>
            <table cellpadding="7px">
                <thead>
                    <th>ID</th>
                    <th>Seminar Title</th>
                    <th>Speaker</th>
                    <th>Organized By</th>
                    <th>Date</th>
                    <th>Profile Speaker</th>
                    <th>Academic Year</th>
                    <th>Total Participants</th>
                    <th>Department</th>
                    <th>Seminar Level</th>
                    <th>Start Time</th>
                    <th>End Time</th>
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
                                <?php echo $row['stitle']; ?>
                            </td>
                            <td>
                                <?php echo $row['speaker']; ?>
                            </td>
                            <td>
                                <?php echo $row['seminarOrganizedBy']; ?>
                            </td>
                            <td>
                                <?php echo $row['seminarDate']; ?>
                            </td>
                            <td>
                                <?php echo $row['profileSpeaker']; ?>
                            </td>
                            <td>
                                <?php echo $row['ac_year']; ?>
                            </td>
                            <td>
                                <?php echo $row['totParticipants']; ?>
                            </td>
                            <td>
                                <?php echo $row['dept']; ?>
                            </td>
                            <td>
                                <?php echo $row['seminarLevel']; ?>
                            </td>
                            <td>
                                <?php echo $row['seminarStartTime']; ?>
                            </td>
                            <td>
                                <?php echo $row['seminarEndTime']; ?>
                            </td>
                            <td class="flex space-x-2">
                                <a href='seminar_update.php?id=<?php echo $row['id']; ?>'
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="seminar_delete.php" method="post" style="display: inline;">
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
            echo "<h2>No Seminar Records Found</h2>";
        }

        mysqli_close($conn);
        ?>
    </div>

    <!-- <script>
        // JavaScript code to handle deleting records
        $(document).ready(function () {
            $(".delete-btn").click(function () {
                if (confirm("Are you sure you want to delete this record?")) {
                    var id = $(this).data("id");
                    console.log("Deleting record with ID: " + id); // Add this line
                    $.ajax({
                        url: "seminar_delete.php",
                        method: "POST",
                        data: { id: id },
                        success: function (response) {
                            if (response === "success") {
                                alert("Record deleted successfully.");
                                location.reload();
                            } else {
                                alert("Failed to delete record.");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                }
            });
        });

    </script> -->
</body>

</html>