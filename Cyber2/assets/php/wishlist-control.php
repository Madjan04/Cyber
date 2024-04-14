<?php
session_start();
include 'server.php';

if (isset($_POST['add-to-wishlist'])) {
    // Check if user is logged in
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        $gameId = $_POST['game-id'];

        // Add the game to the user's wishlist in the database
        $sql = "INSERT INTO wishlist (user_id, game_id) VALUES ($userId, $gameId)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Game added to wishlist successfully
            echo '<script>alert("Game added to wishlist!");</script>';
        } else {
            // Error adding game to wishlist
            echo '<script>alert("Error adding game to wishlist.");</script>';
        }
    } else {
        // User is not logged in, redirect to login page
        header("Location: login.php");
        exit();
    }
}
?>
