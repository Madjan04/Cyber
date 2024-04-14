<?php
session_start();
include '../../server.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $userId = $_SESSION['id'];

    // Get the order ID to remove from the form submission
    $orderId = $_POST['order_id'];

    // Prepare the delete statement
    $deleteQuery = "DELETE FROM user_orders WHERE id = ? AND `order-id` = ?";
    $stmt = $conn->prepare($deleteQuery);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ii", $userId, $orderId);
    
    // Print the generated query for debugging purposes
    echo "Generated Query: " . $stmt->debugDumpParams() . "<br>";

    $stmt->execute();

    if ($stmt->error) {
        // Error occurred during execution
        die("Error executing statement: " . $stmt->error);
    }

    // Check the affected rows
    $affectedRows = $stmt->affected_rows;
    if ($affectedRows > 0) {
        // Row successfully deleted
        echo "Row deleted successfully.";
    } else {
        // No rows affected, deletion failed
        echo "Failed to delete row.";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the cart page
    header("Location: ../../mycart.php");
    exit;
} else {
    // User is not logged in
    header("Location: ../../login.php");
    exit;
}
?>
