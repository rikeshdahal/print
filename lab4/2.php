<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['cv'])) {
        $file = $_FILES['cv'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileTmp = $file['tmp_name'];

        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        $maxSize = 1024 * 1024;

        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxSize) {
            $destination = 'uploads/' . $fileName;
            if (move_uploaded_file($fileTmp, $destination)) {
                echo 'CV uploaded successfully.';
            } else {
                echo 'Failed to upload CV.';
            }
        } else {
            echo 'Invalid file. Only PDF and DOC/DOCX files less than 1 MB are allowed.';
        }
    } else {
        echo 'No file selected.';
    }
} ?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload CV</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="cv" accept=".pdf,.doc,.docx">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
