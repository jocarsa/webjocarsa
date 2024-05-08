<?php
$file_path = '../formularios/'.$_GET['xml'];

if (file_exists($file_path)) {
    // Attempt to delete the file
    if (unlink($file_path)) {
        echo "File deleted successfully.";
    } else {
        echo "Unable to delete the file.";
    }
} else {
    echo "File does not exist.";
}

?>