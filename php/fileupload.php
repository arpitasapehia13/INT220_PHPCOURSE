<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        // Define the upload directory
        $uploadDir = 'uploads/';
        // Ensure the uploads directory exists, if not create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        // Get file details
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        // Define allowed file types
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        // Check if the file type is allowed
        if (in_array($fileExt, $allowed)) {
            // Set a new name for the uploaded file (optional)
            $newFileName = uniqid('', true) . "." . $fileExt;
            // Define the upload path
            $fileDestination = $uploadDir . $newFileName;
            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "<p style='color: green;'>File uploaded successfully!</p>";
            } else {
                echo "<p style='color: red;'>There was an error moving the uploaded file.</p>";
            }
        } else {
            echo "<p style='color: red;'>Invalid file type. Allowed types: jpg, jpeg, png, gif, pdf, txt.</p>";
        }
    } else {
        echo "<p style='color: red;'>No file uploaded or there was an error uploading the file.</p>";
    }
}
?>

<!-- File Upload Form -->
<form action="" method="POST" enctype="multipart/form-data">
    <label for="file">Choose file:</label>
    <input type="file" name="file" id="file" required>
    <button type="submit" name="submit">Upload</button>
</form>
</body>
</html>