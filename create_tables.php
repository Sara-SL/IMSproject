<?php
include("connectDB.php");
//debug the table creation correlations' foreign key is error

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
mysqli_query($link, $sql);

/*
// create the table of Users
$sql = "DROP TABLE if exists Users;";
if(mysqli_query($link, $sql)) {
  echo "<br>Table Users is deleted successfully";
} else {
  echo "<br>Table Users is not deleted successfully";
}

// sql to create table
$sql = "CREATE TABLE Users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
email VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
activated TINYINT(4) NOT NULL,
token VARCHAR(20) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($link->query($sql) === TRUE) {
    echo "<br>Table Users created successfully";
} else {
    echo "<br>Error creating table Users: " . $link->error;
}
*/
// ----------------------------------------------------------------------------
// create the table of Traits
$sql = "DROP TABLE if exists Traits;";

         if(mysqli_query($link, $sql)) {
            echo "<br>Table Traits is deleted successfully";
         } else {
            echo "<br>Table Traits is not deleted successfully";
         }

// sql to create table
$sql = "CREATE TABLE Traits (
id INT AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(233) NOT NULL UNIQUE
)";

if ($link->query($sql) === TRUE) {
    echo "<br>Table Traits created successfully";
} else {
    echo "<br>Error creating table Traits: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Diseases
$sql = "DROP TABLE if exists Diseases;";

         if(mysqli_query($link, $sql)) {
            echo "<br>Table Diseases is deleted successfully";
         } else {
            echo "<br>Table Diseases is not deleted successfully";
         }

// sql to create table
$sql = "CREATE TABLE Diseases (
  id INT(32) AUTO_INCREMENT PRIMARY KEY,
  disease_name VARCHAR(128) NOT NULL UNIQUE,
  description TEXT
)";

if ($link->query($sql) === TRUE) {
    echo "<br>Table Diseases created successfully";
} else {
    echo "<br>Error creating table Diseases: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Correlations
$sql = "DROP TABLE if exists Correlations;";

         if(mysqli_query($link, $sql)) {
            echo "<br>Table Correlations is deleted successfully";
         } else {
            echo "<br>Table Correlations is not deleted successfully";
         }

// sql to create table
$sql = "CREATE TABLE Correlations (
trait_id INT(32) NOT NULL,
disease_id INT(32) NOT NULL,
rg FLOAT(32,5) NOT NULL,
FOREIGN KEY (trait_id) REFERENCES Traits(id),
FOREIGN KEY (disease_id) REFERENCES Diseases(id)
)";

if ($link->query($sql) === TRUE) {
    echo "<br>Table Correlations created successfully";
} else {
    echo "<br>Error creating table Correlations: " . $link->error;
}



/*
// ----------------------------------------------------------------------------
// create the table of Results
$sql = "DROP TABLE if exists Results;";

         if(mysqli_query($link, $sql)) {
            echo "<br>Table Results is deleted successfully";
         } else {
            echo "<br>Table Results is not deleted successfully";
         }

// sql to create table
$sql = "CREATE TABLE Results (
  user_id INT(32) NOT NULL,
  disease_id INT(32) NOT NULL,
  result FLOAT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Traits(id),
  FOREIGN KEY (disease_id) REFERENCES Diseases(id)
)";

if ($link->query($sql) === TRUE) {
    echo "<br>Table Results created successfully";
} else {
    echo "<br>Error creating table Results: " . $link->error;
}
*/
include("disconnectDB.php");
?>
