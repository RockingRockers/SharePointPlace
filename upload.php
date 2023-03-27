<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $file = $_FILES['file'];
  $filename = $file['name'];
  $tmp_name = $file['tmp_name'];
  $target_dir = 'uploads/';
  $target_file = $target_dir . $filename;

  if (move_uploaded_file($tmp_name, $target_file)) {
    $response = array('filename' => $filename);
    header('Content-Type: application/json');
    echo json_encode($response);
  } else {
    echo 'Error uploading file.';
  }
}
