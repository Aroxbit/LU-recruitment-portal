<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser 
// It should be saved outside of the main web documents folder
// and imported when needed

// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'recruitment');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

function deleteRow($table_name, $uid){
  global $dbc;
  $sql = "DELETE FROM " . $table_name . " WHERE user='$uid'";
  if (!($dbc->query($sql) === TRUE)) {
    $err =  "Error: " . $sql . "<br>" . $dbc->error;
    return $err;
    die();
  }
  else return false;
}

function createRow($sql){
  global $dbc;
  if (!($dbc->query($sql) === TRUE)) {
    $err =  "Error: " . $sql . "<br>" . $dbc->error;
    return $err;
    die();
  }
  else return false;
}

function updateRow($table_name, $uid, $sql){
  global $dbc;

  // Delete if it exists
  $delete_err = deleteRow($table_name, $uid);
  if($delete_err) {echo $delete_err; return $delete_err;}

  // create new data
  $err = createRow($sql);
  if($err) {echo $err; return $err;}
  else return false;
}

function getRow($table_name, $uid, $single){
  global $dbc;
  $sql = "SELECT * FROM ". $table_name ." WHERE user='". $uid ."'";
  $result = mysqli_query($dbc, $sql);
  $count  = mysqli_num_rows($result);
  if($count == 0 && $single) return false;
  if($single) return mysqli_fetch_assoc($result);
  else return $result;
}

//File Upload Function
function upload($uid, $field_name){
  $target_dir = "uploads/";
  $file_name = $uid . "_" . time() . "_" . rand() . basename($_FILES["$field_name"]["name"]);
  $file_location = $target_dir . $file_name;

  if (move_uploaded_file($_FILES["$field_name"]["tmp_name"], $file_location)) {
    return $file_name;
  } else {
    echo "Sorry, there was an error uploading your file.";
    return null;
  }
}
?>