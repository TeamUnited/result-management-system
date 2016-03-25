<?php
session_start();
function result_table($semester)
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rms";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    $out  = '';
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

/*echo "username is  " . $_SESSION["username"] . ".<br>";*/
    $username=$_SESSION["username"];
    echo "ID - " . $username . ".<br>";
$query="SELECT course.courseno,coursename,grade FROM registers join course on registers.courseno=course.courseno WHERE studentid=$username and semester='$semester' ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
     echo "<table><tr><th>CourseNO.</th><th>Course name</th><th>Grade</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td class='courseno'>" . $row["courseno"]. "</td><td>" . $row["coursename"]. "</td><td class='student_grade'>".$row["grade"]. "</td></tr>";
     }
     echo  "</table>";
     
}
 else {
     $out+= "0 results";
}

$conn->close();
}

result_table($_POST['semester']);
?>