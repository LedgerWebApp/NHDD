<?php
define('server','localhost:3307');// defining hostname
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
public function insertionvalue($username,$name,$type,$useremail,$userpassword)
{
$adding=mysqli_query($this->dbhost,"insert into expenses(user,name,type,date,cost) values('$username','$name','$type','$useremail','$userpassword')");
return $adding;
}
public function viewing($username,$how)
{
$viewing = mysqli_query($this->dbhost,"select * from expenses where user='$username' and type='$how'");
return $viewing;
}
public function updatevalue($fname,$lname,$email,$pass,$income,$sum,$user)
{
$update = mysqli_query($this->dbhost,"UPDATE signupid SET firstname='$fname', lastname='$lname',income='$income' ,Email='$email',expenses = '$sum' WHERE Name='$user' AND Password='$pass' ");
return $update;
}
        public function take($username)
        {
                $view = mysqli_query($this->dbhost,"SELECT * From signupid where Name ='$username' ");
                return $view;
        }
public function viewing1($username)
{
$viewing = mysqli_query($this->dbhost,"select image from images where username='$username'");
return $viewing;
}
public function dataviewing($fdate,$tdate,$username)
{
$dateviewing = mysqli_query($this->dbhost,"SELECT *  From expenses  where (date BETWEEN '$fdate' and '$tdate') and (user='$username')");
return $dateviewing;
}

public function dateviewing($type,$fdate,$tdate,$username)
{

$dateviewing = mysqli_query($this->dbhost,"SELECT *  From expenses  where (date BETWEEN '$fdate' and '$tdate') and (user='$username') and(type='$type')");
return $dateviewing;
}
}
class Database_Connection1 extends Database_Connection
{
function __construct() {
        parent::__construct();

    }
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
class Database_Connection2 extends Database_Connection
{
function __construct() {
        parent::__construct();

    }
public function imagesaving($Name,$image,$Userdate,$user)
{
$saving=mysqli_query($this->dbhost,"INSERT into images (image,name,time,uploaded,username) VALUES ('$image','$Name','$Userdate', NOW(),'$user')");
return $saving;
}
public function downloading($date,$user)
{
$viewing = mysqli_query($this->dbhost,"select image from images where time ='$date' and username='$user' ");
return $viewing;
}
}
?>
