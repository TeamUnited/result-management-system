<?php
/*Access-Control-Allow-Origin: login_instructor.php*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

function login_details($username,$password)
{
    global $conn;
    $res1='';
        $query="SELECT * FROM logininstruct WHERE username='$username' and password='$password' ";
        $res1=$conn->query($query);
        if(!$username || !$password || (!$username && !$password) ) {
            /*echo "<h6>**Username and password both must be filled</h6>";*/
            echo '<span style="color:#FF0000;"><h6>**Username and password both must be filled</h6></span>';
             return 0;
        }
        elseif (!$res1->num_rows) {
            echo '<span style="color:#FF0000;"><h6>**Incorrect username or password</h6></span>';
            return 0;
        }
        else {
            echo "<script>
               window.location='login_instructor.html'
          </script> ";
            return 1;
        }
    $conn->close;
}


function update_grades($id,$grade)
{
    global $conn;
    $update_grd = "UPDATE registers SET grade='$grade' WHERE studentid='$id' AND semester='3' AND courseno='CS201' ";
    echo $conn->query($update_grd);
       
    if ($conn->query($update_grd))   
            return $id; 
        else 
            return 0;
    
    $conn->close;
}

function login_student($username,$password)
{
    global $conn;
    $res1='';
    
        $query="SELECT * FROM loginuser WHERE username='$username' and password='$password'";
        $res1=$conn->query($query);
        
        if(!$username || !$password || (!$username && !$password)) {
            /*echo "<h6>**Username and password both must be filled</h6>";*/
            echo '<span style="color:#FF0000;"><h6>**Username and password both must be filled</h6></span>';
             return 0;
        }
        elseif (!$res1->num_rows) {
            echo '<span style="color:#FF0000;"><h6>**Incorrect username or password</h6></span>';
            return 0;
        }
        else {
            session_start();
            $_SESSION["username"] = $_POST['username'];
            echo "<script>
               window.location='../php/student_select.php'
          </script> ";
            return 1;
        }
        
    $conn->close;
}



if(isset($_POST['login']))
{
        login_details($_POST['username'],$_POST['password']);
}

elseif(isset($_POST['std']))
{
    login_student($_POST['username'],$_POST['password']);
}


     else   
     {
     update_grades($_POST['id'],$_POST['grade']);
     }
 
  
 ?>