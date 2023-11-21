<?php
$db = mysqli_connect("localhost", "root", "", "gallery");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM image WHERE ID = $id";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "Image deleted successfully.";
    } else {
        echo "Image deletion unsuccessful. Error: " . mysqli_error($db);
    }
} else {
    echo "Invalid request.";
}

// Redirect back to the main page after processing
header("Location: index.php");
exit();
?>