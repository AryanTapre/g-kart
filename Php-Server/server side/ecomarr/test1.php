<?php

$connect = new mysqli("localhost","root","","mydb");
if(!$connect)
{
    die("failed to connect...");
}
else
{
    $sql = "select * from user";
    $res = $connect->query($sql);
    $no=$res->num_rows;

    echo $no;
}

?>