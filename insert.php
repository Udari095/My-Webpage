<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$Name = $Email = $comment ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Name"])) {
    $NameErr = "Name is required";
  } else {
    $Name = test_input($_POST["Name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Name)) {
      $NameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["Email"])) {
    $EmailErr = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $EmailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "<h2>Your Input:</h2>";
echo $Name;
echo "<br>";
echo $Email;
echo "<br>";
echo $comment;
echo "<br>";


$servername = "localhost";
$Name = "Name";
$Email = "Email";
$dbname = "ArtDB";

// Create connection
$conn = new mysqli($servername, $Name, $Email);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
	$SELECT = "SELECT Email From contact where Email=? Limit 1";
	$INSERT = "INSERT into contact (Name,Email) values (?,?)"
}

// Create database
$sql = "CREATE DATABASE ArtDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();

// sql to delete a record
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

//sql to update data
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();




?>





