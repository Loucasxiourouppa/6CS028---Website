<h1>This is a login page<h1>











<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // process the form submission
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // connect to the database
        $db_host = 'localhost';
        $db_user = '2007307';
        $db_pass = '3sc3r7';
        $db_name = 'db2007307';
        
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        
        if(!$conn) {
            die('Could not connect to database: ' . mysqli_connect_error());
        }
        
        // check if the email and password match a record in the database
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 1) {
            // login successful
            header('Location: home.php'); // redirect to home page
            exit();
        } else {
            // login failed
            echo '<p>Invalid email or password. Please try again.</p>';
        }
    }
?>

<form method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
