<?php 

session_start();

$mysqli = new mysqli('localhost','root','Summer1945.','newcrud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$location = '';

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("INSERT INTO data(name, location) VALUES('$name','$location')") or die ($mysqli->error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("Location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("Location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());   
    if(array($result->num_rows)){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has benn updated!";
    $_SESSION['msg_type'] = "warning";

    header('Location: index.php');
}


?>