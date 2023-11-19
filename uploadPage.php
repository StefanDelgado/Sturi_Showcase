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
        // Redirect to a new page to avoid form data resubmission
        header("Location: index.php");
        exit();
    } else {
        echo "<h3> Failed to upload!!! Please try again!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Uploading File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <br>
                <h2>File to upload</h2>
                Insert Image:
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
</body>

</html>