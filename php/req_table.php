<?php

function request_table($acadyear,$semester,$courseno)
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


$sql = "SELECT student.studentid,name,grade from student join registers on student.studentid=registers.studentid where semester='$semester' and courseno='$courseno' and acadyear='$acadyear' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Name</th><th>Grade</th><th class='hide_update'>Update grade</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td class='student_id'>" . $row["studentid"]. "</td><td>" . $row["name"]. "</td><td class='student_grade'>".$row["grade"]. "</td><td class='hide_update'>
         <form class='update_grade'><input type='text' name='grade' id='textfield'></input><input type='submit' value='submit'></input></form>
         </td></tr>";
     }
     echo  "</table>";
    echo "<div class='update_button'>
    <input type='submit' value='Update Grade'>
    </div>";
    echo "<script src='jquery-2.1.4.js'></script><script>
    $('document').ready(function(){
       $('.hide_update').hide();
       $('.update_button').click(function () {
           $('.hide_update').show(); 
           })
       $('input:text').click(
        function(){
        $(this).val('');
        });       
        $('.update_grade').submit(function(e){
            var tthis = $(this);
            e.preventDefault();
            var input = tthis.serialize();
            console.log('Input'+input);
            var id = tthis.closest('tr').find('.student_id').text().trim();
            var grade =  tthis.find('input').val();
            tthis.closest('tr').find('.student_grade').text(grade);
            console.log(id);
            input+='&id='+id;
            $.post('functions.php',input,function(data){
                console.log('Res'+data);
            })
        })
    })</script>";
     
}
 else {
     $out+= "0 results";
}

$conn->close();
}

request_table($_POST['acadyear'],$_POST['semester'],$_POST['courseno']);
?>