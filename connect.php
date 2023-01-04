<?php 
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "nhom14";

//Creat connection
$conn = new mysqli($severname,$username,$password,$dbname);

//Check connection
if($conn -> connect_error){
    die("connection failed:".$conn->connect_error);
}

function action($sql){
    $db = database();
    return $db->query($sql);
}

function count_query($sql)
{
    $result = connect($sql);
    $num = mysqli_num_rows($result);
    return $num;
}

function data($sql,$detail=null)
{
    $connect = connect($sql);
    $arrayReturn = array();
    while ($row = mysqli_fetch_assoc($connect))
    {
        $arrayReturn[] = $row;
    }
    if($detail){
        return $arrayReturn[0];
    }else{
        return $arrayReturn;
    }
}

?>