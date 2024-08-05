<?php
include("connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conn, "select * from state where country_id='$id' ");
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $state = $row['state'];
        echo "<option value='$id'>$state</option>";
    }
}

if (isset($_POST['stateId'])) {
    $id = $_POST['stateId'];
    $query = mysqli_query($conn, "select * from city where state_id='$id' ");
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $city = $row['city'];
        echo "<option value='$id'>$city</option>";
    }
}
