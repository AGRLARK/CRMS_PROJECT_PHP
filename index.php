<?php include "header.php" ?>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = ""; 
$database = "crms_naac"; 

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables for form data
$semail = "";
$passwd = "";

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $semail = mysqli_real_escape_string($connection, $_POST["semail"]);
    $passwd = mysqli_real_escape_string($connection, $_POST["passwd"]);

    // Query to check if the email and password match a record in the registration table
    $query = "SELECT * FROM registeration WHERE semail = '$semail' AND passwd = '$passwd'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
        // Login successful
        echo '<script>alert("You are logged in!");</script>';
        echo '<script>window.location.href = "/crms/home.php";</script>';    //Redirect to the home.php
    } else {
        // Login failed
        echo '<script>alert("Login failed. Please check your email and password.");</script>';
    }
}

// Close the database connection
mysqli_close($connection);
?>


<form action="" method="POST">
<section class="h-screen">
  <div class="container h-full px-6 py-24">
    <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
      <!-- Left column container with background-->
      <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
        <img src="https://media.mktg.workday.com/is/image/workday/illustration-people-login?fmt=png-alpha&wid=1000"
          class="w-full" alt="Phone image" />
      </div>

      <!-- Right column container with form -->
      <div class="md:w-8/12 lg:ml-6 lg:w-5/12"
        style="border:2px solid black; border-radius:20% solid black; background-color:white;padding: 50px 50px 10px 50px;">
        <form style="    margin-bottom: 10%;">
          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">STAFF REGISTRATION</p> <br> <br>
          
          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="email" id="form3Example3c" name="semail" class="form-control" required />
              <label class="form-label" for="form3Example3c">Your Email</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <input type="password" id="form3Example4c" name="passwd" class="form-control" required />
              <label class="form-label" for="form3Example4c">Password</label>
            </div>
          </div>


          <!-- Remember me checkbox -->
          <div class="mb-6 flex items-center justify-between">

            <!-- Forgot password link -->
            <a href="signup.php"
              class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Forgot
              password?</a>
          </div>

          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <button type="submit"
              style="align-items-center ; text-align: center; background-color: ; border-radius: 30px; border:1px solid blue;width: 500px;height:50px">Login</button>
          </div>

          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
    <button type="button" onclick="window.location.href = 'signup.php';"
        style="align-items-center ; text-align: center; background-color:#fa002a ; border-radius: 30px; border:1px solid blue;width: 500px;height:50px ;color:white">
        Register
    </button>
</div>

        </form>
      </div>
    </div>
  </div>
</section>
</form>
<script>
  // Initialization for ES Users
  import {
    Input,
    Ripple,
    initTE,
  } from "tw-elements";

  initTE({ Input, Ripple });
</script>