<?php
include("connection.php");

if (isset($_POST['del_multiple_data'])) {

    $all_id = $_POST['del_check'];
    $seperate_all_id = implode(",", $all_id);


    $query = "DELETE FROM form WHERE id IN ($seperate_all_id)";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Deleted id`s are $seperate_all_id Successfully')</script>";

?>
        <meta http-equiv="refresh" content="0; url = http://localhost/crud/display.php" />
<?php
    } else {
        echo "Something went wrong";
    }
}
