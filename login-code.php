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
?>