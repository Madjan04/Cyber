<?php
session_start();
include '../../server.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_POST['cart'])) {
    $gameid = $_POST['game-id'];
    $userid = $_SESSION['id'];

    // Fetch the game details based on the game ID
    $gameDetailsQuery = "SELECT * FROM add_game WHERE `game-id` = '$gameid'";
    $gameDetailsResult = mysqli_query($conn, $gameDetailsQuery);

    if ($gameDetailsResult && mysqli_num_rows($gameDetailsResult) > 0) {
        $row = mysqli_fetch_assoc($gameDetailsResult);
        $gametitle = $row['game-title'];
        $price = $row['price'];

        // Insert the order into the user_orders table
        $insertOrderQuery = "INSERT INTO user_orders (`order-id`, `id`, `game-title`, `price`, `quantity`) VALUES ('', '$userid', '$gametitle', '$price', 1)";

        $insertOrderResult = mysqli_query($conn, $insertOrderQuery);

        if ($insertOrderResult) {
            echo "<script>alert('Order placed successfully!'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error placing the order: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Game details not found.'); window.history.back();</script>";
    }
}

$conn->close();
?>
