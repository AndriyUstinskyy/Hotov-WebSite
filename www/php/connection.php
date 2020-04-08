$host = 'localhost';
$database = 'apartments_schema';
$user = 'root';
$password = ''; 

$connection = mysqli_connect($host, $user, $password, $database);

if($connection == false){
    echo 'Connection error!';
    echo mysqli_connect_error();
    die();
}

