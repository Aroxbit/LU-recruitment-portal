<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//File Upload Function
function upload($uid, $field_name){
  print_r($_FILES);
  $target_dir = "uploads/";
  $file_name = $uid . "_" . time() . "_doc_" . basename($_FILES["$field_name"]["name"]);
  $file_location = $target_dir . $file_name;

  if (move_uploaded_file($_FILES["$field_name"]["tmp_name"], $file_location)) {
    return $file_name;
  } else {
    echo "Sorry, there was an error uploading your file.";
    return null;
  }
}
?>