<html>
<head>
<link href="../css/login_instructor.css"  rel="stylesheet"/>
</head>
<body>

<script src="../js/jquery-2.1.4.js"></script>
<div class="header">
    <div class="logo">
         <p><img src="../img/LOGO_IIITV.png"  width="90" 
height="80" align="left"  />
        </div>
<div class="title_name">
    <h1>Result Management System</h1>
        <h2>IIITV</h2></p>
<div class="home">
    <a href="../index.html">Home</a>
       <a href="../html/student_login.html">Logout</a>
 </div>
</div>
</div>
 
    
<div class="login_opt">
    <h2 class="ab">Get your result</h2>
<form class="login1"> 
<!--<p>Acadyear
<select name="acadyear">
<option value="none"></option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></p>-->
<p>Semester 
<select name="semester">
<option value="none"></option>
<option value="1">sem 1</option>
<option value="2">sem 2</option>
<option value="3">sem 3</option>
</select></p>
    
  
<input type="submit" value="submit" />
</form>


<div class="data-wrapper1">

</div>
    
    <script>
        $('input:text,input:password').click(
            function () {
                $(this).val('');
            });

        $('.login1').submit(function (e) {
            var $this = $(this);
            e.preventDefault();
            var input = $this.serialize();
            console.log("Input" + input);

            $.post('result_table.php', input + '&stdselect=1', function (data) {
                console.log("Res" + data);
                $('.data-wrapper1').html(data);
                
            })
        })
    </script>

</div>  


</body>
</html>