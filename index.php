<?php
$msg = "";
$db = mysqli_connect("localhost", "root", "", "gallery");

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    // Get all the submitted data from the form
    $sql = 'INSERT INTO image (filename) VALUES (\'' . $filename . '\')';

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Food Sturi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<a href="uploadPage.php"> Upload</a>
    <div id="display-image">
        <?php
        $query = "SELECT * FROM image";
        $result = mysqli_query($db, $query);
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./image/<?php echo $data['filename']; ?>">
        <?php
        }
        ?>
    </div>
</body>

</html>