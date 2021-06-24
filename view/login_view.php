<?php //error_reporting(0); 
if(isset($_SESSION['success']))
    {
    ?>
    <script type="text/javascript">
        alert("<?php echo $_SESSION['success']; ?>");
    </script>
    
    <?php
    
    }
    unset($_SESSION['success']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <style>
table{
  border-color: black;
  margin-left: auto;
  margin-right: auto;
  margin-top: 200px;

}
#title{
    background-color: darkmagenta;
    color: aliceblue;
}
#center{
    text-align: center;
    margin-left: 100px;
}
</style>
</head>
<body>
    <form name="f1" action="" method="POST">
     <table border="2">
            <thead>
                <tr>
                    <th colspan="2" id="title">User LOGIN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Email Address:</b></td>
                    <td><input type="text" name="username" maxlength="100"></td>
                </tr>   
                <tr>
                    <td><b>Password:</b></td>
                    <td><input type="password" name="password" maxlength="100"></td>
                </tr> 
                <tr>
                    <td colspan="2"><input type="checkbox" name="remember" id=""> Remember Me<br><br>
                    <input id="center" type="submit" name="submit" value="Login Now..."></td>
                   
                </tr> 
            </tbody>

        </table>
</form>
</body>
</html>    <script>  
            function validation()  
            {  
                var id=document.f1.username.value;  
                var ps=document.f1.password.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  
</body>
</html>