<?php
if (isset($_GET['file'])) {
  $filename = $_GET['file'];
  $filepath = 'uploads/' . $filename;

  if (file_exists($filepath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($filepath));

    readfile($filepath);
    exit;
  } else {
    echo 'File not found.';
  }
}
