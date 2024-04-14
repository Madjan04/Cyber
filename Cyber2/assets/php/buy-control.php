<?php
session_start();
include 'server.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];

    if (isset($_POST["game-submit"])) {
        $gametitle = $_POST['game-title'];
        $genre = $_POST['genre'];
        $price = $_POST['price'];
        $gamedesc = $_POST['game-desc'];
        $coverPhoto = $_FILES['cover-photo']['name'];
        $coverPhotoTmp = $_FILES['cover-photo']['tmp_name'];
        $coverPhotoPath = 'assets/images/cards-img/' . $coverPhoto;

        if (move_uploaded_file($coverPhotoTmp, $coverPhotoPath)) {
            // File uploaded successfully, proceed with database insert

            // Your database insert code here
            $newgame =  "INSERT INTO add_game (`game-title`, `game-desc`, `genre`, `price`, `cover-photo`, `id`) 
            VALUES ('$gametitle', '$gamedesc', '$genre', '$price', '$coverPhoto', '$userid')";
            mysqli_query($conn, $newgame);

            echo 'Card added successfully!';
        } else {
            echo 'Error uploading cover photo.' . mysqli_error($conn);
        }
    }

    // Rest of the code for game purchase
    // ...
} else {
    // User not logged in
    $response = array('success' => false, 'message' => 'User not logged in');
    echo json_encode($response);
}

$conn->close();
?>