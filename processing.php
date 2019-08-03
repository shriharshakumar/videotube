<?php 
require_once("includes/header.php");
require_once("includes/classes/videoUploadData.php");
require_once("includes/classes/videoProcessor.php");

// if(!isset($_POST["uploadButton"])){
//     echo "No file has been sent to the page. Please ensure that the video file is proper.";
//     exit();
// }

$videoUploadData = new VideoUploadData(
    $_FILES["fileInput"], 
    $_POST["titleInput"],
    $_POST["descriptionInput"],
    $_POST["privacyInput"],
    $_POST["categoriesInput"]
);

$videoProcessor = new VideoProcessor($con);
$wasSuccessful = $videoProcessor->upload($videoUploadData);

?>