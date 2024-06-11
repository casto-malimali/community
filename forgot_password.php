<?php
session_start();

// Include the database connection file
include 'botho.php';

// Define variables and initialize with empty values
$email = $password = $confirm_password = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate email format
    if (empty($email_err)) {
        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your new password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm your password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        // If all inputs are valid
        if (empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE email = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                // Set parameters
                $param_email = $email;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if email exists
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Update user's password in the database
                        $sql = "UPDATE users SET password = ? WHERE email = ?";
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $param_email);
                            mysqli_stmt_execute($stmt);
                        }

                        // Redirect to login page
                        header("location: us_login.php");
                        exit();
                    } else {
                        // Email does not exist
                        $email_err = "No account found with that email.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: grey; /* Light grey background color */
            font-family: Arial, sans-serif; /* Choose your preferred font */
        }
        .container {
            background-color: #ffffff; /* White background for the form container */
            width: 300px; /* Adjust width as needed */
            margin: 50px auto; /* Center the container horizontally */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow for depth */
        }
        .container h2 {
            text-align: center;
        }
        .container p {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .help-block {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>FORGOT PASSWORD</h2>
    <p>Please enter your email address and set a new password.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="password" placeholder="New Password" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Reset Password">
        </div>
    </form>
</div>
</body>
</html>
