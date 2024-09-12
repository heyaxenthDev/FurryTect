<?php 
session_start();
include 'includes/conn.php';

if (isset($_POST['AdminLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start the session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Redirect to the dashboard or any other page
            $_SESSION['admin_auth'] = true;
            $_SESSION['logged'] = "Logged in successfully";
            $_SESSION['logged_icon'] = "success";
            header("Location: admin/dashboard.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['username_input'] = $username;
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Invalid username or password.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    } else {
        // Invalid username
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Invalid username or password.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $stmt->close();
    // $conn->close();
}

if (isset($_POST['AdminReg'])) {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO admin (username, first_name, middle_name, last_name, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $first_name, $middle_name, $last_name, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Registration successful!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $stmt->close();
    // $conn->close();
}

// Sign in or Log in for the users
if (isset($_POST['signIn'])) {
    // Get form data
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; // No need to escape password since we are using password_verify later

    // Check if account is activated
    $checkQuery = $conn->prepare("SELECT * FROM owners WHERE email = ? AND admin_confirm = '1'");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows == 0) {
        // If account is not activated
        $_SESSION['status'] = "Account not Activated!";
        $_SESSION['status_text'] = "Your account has not been confirmed by the Admin.";
        $_SESSION['status_code'] = "warning";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        // If the account is activated, verify email and fetch hashed password from the database
        $stmt = $conn->prepare("SELECT * FROM owners WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, now verify password
            $user = $result->fetch_assoc();
            $hashed_password = $user['password']; // Fetch hashed password from database

            if (password_verify($password, $hashed_password)) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];

                // Successful login
                $_SESSION['logged'] = "Login Successful!";
                $_SESSION['logged_icon'] = "success";
                header("Location: dashboard.php"); // Redirect to dashboard or user page
                exit();
            } else {
                // Invalid password
                $_SESSION['status'] = "Invalid Password!";
                $_SESSION['status_text'] = "Incorrect password. Please try again.";
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
        } else {
            // Invalid email
            $_SESSION['status'] = "Invalid Email!";
            $_SESSION['status_text'] = "Incorrect email. Please try again.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }
}



// Sign Up for users
if (isset($_POST['signUp'])) {
    // Get form data
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; // No need to escape because we'll hash it
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $_SESSION['status'] = "Passwords do not match!";
        $_SESSION['status_text'] = "Please try again";
        $_SESSION['status_code'] = "warning";
        $_SESSION['status_btn'] = "Ok";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Check if email already exists
    $emailCheckQuery = $conn->prepare("SELECT email FROM owners WHERE email = ?");
    $emailCheckQuery->bind_param("s", $email);
    $emailCheckQuery->execute();
    $emailCheckQuery->store_result();

    if ($emailCheckQuery->num_rows > 0) {
        // Email already exists
        $_SESSION['status'] = "Duplicate Email!";
        $_SESSION['status_text'] = "Email already in use!";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO owners (firstname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Successful registration
        $_SESSION['status'] = "Registration Successful! Please wait for admin confirmation.";
        $_SESSION['status_code'] = "success";
        header("Location: login.php"); // Redirect to login page
    } else {
        // Registration failed
        $_SESSION['status'] = "Registration failed! Please try again.";
        $_SESSION['status_code'] = "error";
        header("Location: signup.php");
    }

    // Close connections
    $stmt->close();
    $emailCheckQuery->close();
    $conn->close();
}
?>