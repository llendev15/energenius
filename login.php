<?php
include 'db_connect.php';
session_start();
header('Content-Type: application/json'); // Return JSON always

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // No account found with that email
            echo json_encode([
                "status" => "error",
                "message" => "Account does not exist. Please sign up first."
            ]);
        } elseif (password_verify($password, $user['password'])) {
            // Correct login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo json_encode([
                "status" => "success",
                "message" => "Welcome back, " . $user['name'] . "!"
            ]);
        } else {
            // Wrong password
            echo json_encode([
                "status" => "error",
                "message" => "Incorrect password. Please try again."
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Database error: " . $e->getMessage()
        ]);
    }
}
