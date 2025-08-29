<?php
include 'db_connect.php';

header('Content-Type: application/json'); // Set the response type to JSON

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        // Check if email exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Email already exists!'
            ]);
            exit;
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $insert->bindParam(':name', $name);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':password', $hashed_password);

        if ($insert->execute()) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Account created successfully!'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Something went wrong during account creation!'
            ]);
        }
    } catch (PDOException $e) {
        // Check if the error is due to a duplicate email
        if ($e->getCode() == 23000) { // 23000 is the SQLSTATE code for integrity constraint violation
            echo json_encode([
                'status' => 'error',
                'message' => 'Email already exists!'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }
}
?>