<?php
$connection = mysqli_connect("localhost", "potiro", "pcXZb(kL", "poti");
// $connection = mysqli_connect("rerun", "potiro", "pcXZb(kL", "poti");

if (!$connection) {
    die("Die database connection");
    echo ("ERROR:" . mysqli_error($connection));
}
