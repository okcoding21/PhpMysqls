<?php
//these are the server details
//the username is root by default in case of xampp
//password is nothing by default
//and lastly we have the database named android. if your database name is different you have to change it

//Define your host here.
$HostName = "fdb19.biz.nf";

//Define your database username here.
$HostUser = "3423862_tulsipaints";

//Define your database password here.
$HostPass = "Killer@007";

//Define your database name here.
$DatabaseName = "3423862_tulsipaints";

//creating a new connection object using mysqli
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//if everything is fine

//creating an array for storing the data
$heroes = array();

//this is our sql query
$sql = "SELECT title,desc FROM BrowseSeries;";

//creating an statment with the query
$stmt = $conn->prepare($sql);

//executing that statment
$stmt->execute();

//binding results for that statment
$stmt->bind_result($title, $desc);

//looping through all the records
while($stmt->fetch()){

	//pushing fetched data in an array
	$temp = [
		'title'=>$title,
		'desc'=>$desc
	];

	//pushing the array inside the hero array
	array_push($heroes, $temp);
}

//displaying the data in json format
echo json_encode($heroes);