function validateForm() {
    var x = document.forms["myForm"] ["username"].value;
    var y = document.forms["myForm"] ["password"].value;
     if (y == null && x==null || y == "" && x=="") {
        alert("password and username  must be filled out");
        return false;
    }
     else if (x == null  || x == "") {
        alert("userame  must be filled out");
        return false;
    }
     else if (y == null  || y == "") {
        alert("password  must be filled out");
        return false;}
/*    var s=typeof x;
    document.writeln("s");
else if(s ==='string')
    {alert("user name must your studentid" );
     return false;
}
    else{return true;}
else
    {
      //alert("userame must be your studentid" );
           return false;
                 }*/
}
