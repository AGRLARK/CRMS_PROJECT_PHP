<?php include 'header.php';?>

<?php
// Database connection
$hostname = "localhost"; // Replace with your database hostname
$username = "root"; // Your database username (in this case, "root")
$password = ""; // Leave this blank if there's no password set
$database = "crms_naac"; // Your database name

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$sname = "";
$semail = "";
$passwd = "";
$cpasswd = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $sname = mysqli_real_escape_string($connection, $_POST["sname"]);
    $semail = mysqli_real_escape_string($connection, $_POST["semail"]);
    $passwd = mysqli_real_escape_string($connection, $_POST["passwd"]);
    $cpasswd = mysqli_real_escape_string($connection, $_POST["cpasswd"]);

    // If any of the required fields are empty, display an alert message using JavaScript
    if (empty($sname) || empty($semail) || empty($passwd) || empty($cpasswd)) {
        echo '<script>alert("All fields are required.");</script>';
    } else {
        // If the passwords match, insert data into the database
        if ($passwd == $cpasswd) {
            $query = "INSERT INTO registeration (sname, semail, passwd,cpasswd) VALUES ('$sname', '$semail', '$passwd', '$cpasswd')";

            $result = mysqli_query($connection, $query);

            if ($result) {
                echo '<script>alert("Registration successful!");</script>';
                echo '<script>window.location.href = "/crms/index.php";</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
            }
        } else {
            echo '<script>alert("Passwords do not match.");</script>';
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------>

    <form method="POST" onsubmit="return validateForm();" action="" >
        <section class="vh-100" style="margin-bottom: 100px;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">STAFF REGISTRATION</p>

                                        <form class="mx-1 mx-md-4">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="form3Example1c" name="sname"
                                                        class="form-control"/>
                                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" id="form3Example3c" name="semail" class="form-control"/>
                                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="form3Example4c" name="passwd" class="form-control" />
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="form3Example4cd" name="cpasswd" class="form-control"/>
                                                    <label class="form-label" for="form3Example4cd">Confirm password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" style="align-items-center ; text-align: center; background-color: ; border-radius: 30px; border:1px solid blue;width: 500px;height:50px">Register</button>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type='submit' onclick="window.location.href = 'index.php';" style="align-items-center ; text-align: center;color:white; background-color:#fa002a ; border-radius: 30px; border:1px solid blue;width: 500px;height:50px">Login</button>
                                            </div>
                                            
                                        </form>

                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="./assets/img-registration.png" class="img-fluid" alt="">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script>
    // Function to validate the form
    function validateForm() {
        var sname = document.getElementById("form3Example1c").value;
        var semail = document.getElementById("form3Example3c").value;
        var passwd = document.getElementById("form3Example4c").value;
        var cpasswd = document.getElementById("form3Example4cd").value;

        // Check if any of the required fields are empty
        if (sname === "" || semail === "" || passwd === "" || cpasswd === "") {
            alert("All fields are required.");
            return false;
        }

        // Check if passwords match
        if (passwd !== cpasswd) {
            alert("Passwords do not match.");
            return false;
        }

        // Form is valid, submit it
        return true;
    }
</script>
</body>

</html>