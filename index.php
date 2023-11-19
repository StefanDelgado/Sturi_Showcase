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

$query = "SELECT filename FROM image";
$result = mysqli_query($db, $query);

$imageUrls = array();
while ($row = mysqli_fetch_assoc($result)) {
    $imageUrls[] ='http://localhost//WebDesign_BSITA-2/Github/Sturi_Showcase/image/' . $row['filename'];
}
$imageUrlsJson = json_encode($imageUrls);
echo '<script>console.log(' . json_encode($imageUrls) . ')</script>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Sturi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script defer src="script.js"></script>

    <script>
        // Include the encoded JSON in a JavaScript variable
        let imgObject = <?php echo $imageUrlsJson; ?>;
    </script>
</head>

<body>
<a href="uploadPage.php"> Upload</a>
    <div id="container">
      <div id="toggleContainer">
         <label>Carousel</label>
         <div id="toggle">
           <div id="outer3">
              <div id="slider3"></div>
           </div>
           <label>Tiles</label>
        </div>
      </div>
      <div id="galleryView">
        <div id="galleryContainer">
           <div id="leftView"></div>
           <button id="navLeft" class="navBtns"><i class="fas fa-arrow-left fa-3x"></i></button>
           <a id="linkTag">
              <div id="mainView"></div>
           </a>
           <div id="rightView"></div>
           <button id="navRight" class="navBtns"><i class="fas fa-arrow-right fa-3x"></i></button>
        </div>
      </div>
      <div id="tilesView">
        <div id="tilesContainer"></div>
      </div>
    </div>
  </body>
</html>