<?php
define('server','localhost');// defining hostname
define('username','root'); // defining username
define('password' ,''); // defining Password
define('databasename', 'NHDD');// defining database name
class Database_Connection
{
function __construct()
{
$connection = mysqli_connect(server,username,password,databasename);
$this->dbhost=$connection;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}



// Here is the function for signup which we will callout when we do signup
public function signup($name,$username,$useremail,$userpassword)
{
$adding=mysqli_query($this->dbhost,"insert into signupid(Name,Username,Email,Password) values('$name','$username','$useremail','$userpassword')");
return $adding;
}

// here is the function for signin which we will callout when we do login
public function signin($username,$userpassword)
{
$seeing=mysqli_query($this->dbhost,"select Name from signupid where Username='$username' and Password='$userpassword'");
return $seeing;
}

}
?>